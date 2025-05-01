<?php

namespace App\Models\Contact;
namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveContactRequest;
use App\Notifications\VerifyContactEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\EmailVerification;

class ContactController extends Controller
{
    protected $messages = [
        'name.required' => 'El campo nombre es obligatorio.',
        'name.string' => 'El campo nombre debe ser una cadena de texto.',
        'name.max' => 'El campo nombre no debe superar los 50 caracteres.',
        'name.regex' => 'El campo nombre solo puede contener letras y espacios.',

        'lastname.required' => 'El campo apellido es obligatorio.',
        'lastname.string' => 'El campo apellido debe ser una cadena de texto.',
        'lastname.max' => 'El campo apellido no debe superar los 50 caracteres.',
        'lastname.regex' => 'El campo apellido solo puede contener letras y espacios.',

        'email.required' => 'El campo correo es obligatorio.',
        'email.string' => 'El campo correo debe ser una cadena de texto.',
        'email.email' => 'El campo correo debe ser una dirección de correo electrónico válida.',
        'email.max' => 'El campo correo no debe superar los 255 caracteres.',
        'email.regex' => 'El campo correo debe tener un formato válido.',

        'affair.required' => 'El campo asunto es obligatorio.',
        'affair.string' => 'El campo asunto debe ser una cadena de texto.',
        'affair.max' => 'El campo asunto no debe superar los 100 caracteres.',
        'affair.regex' => 'El campo asunto solo puede contener letras y espacios.',

        'message.required' => 'El campo mensaje es obligatorio.',
        'message.string' => 'El campo mensaje debe ser una cadena de texto.',
        'message.max' => 'El campo mensaje no debe superar los 255 caracteres.',
    ];
    public function contact(){
        $contact = Contact::get();
        return view('contact',['contact'=> $contact]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:50', 'regex:/^[a-zA-Z ]+$/'],
            'lastname' => ['required', 'string', 'max:50', 'regex:/^[a-zA-Z ]+$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/','indisposable'],
            'affair' => ['required', 'string', 'max:100', 'regex:/^[a-zA-Z ]+$/'],
            'message' => ['required', 'string', 'max:255'],
            'g-recaptcha-response' => 'required|captcha',
        ], $this->messages);
        // Validar el correo electrónico
        $email = $request->input('email');

        // Verificar si ya existe un registro pendiente de confirmación para este correo electrónico
        $existingVerification = EmailVerification::where('email', $email)->first();

        if ($existingVerification) {
            return redirect()->route('contact')->with('errorcontact', 'Ya hay un correo de confirmación pendiente para esta dirección de correo electrónico. Por favor, verifica tu correo electrónico antes de enviar otro formulario de contacto.');
        }

        $name = $request->input('name');
        // Generar el token de verificación
        $token = Str::random(60);
        EmailVerification::create([
            'email' => $email,
            'token' => $token,
            'name' => $request->name,
            'lastname' => $request->lastname,
            'affair' => $request->affair,
            'message' => $request->message,
        ]);

        // Enviar el correo de verificación
        Mail::send('emails.confirmation', ['name' => $name, 'token' => $token], function($message) use ($email, $name) {
            $message->to($email, $name)->subject('Por favor confirma tu correo');
        });

        return redirect()->route('contact')->with('status', 'Por favor verifica tu correo electrónico para completar el proceso.');
    }

    public function verifyEmail(Request $request){
        $token = $request->query('token');

        // Buscar el contacto con el token
        $contact = Contact::where('verification_token', $token)->first();

        if (!$contact) {
            return redirect()->route('contact')->with('error', 'Token de verificación no válido.');
        }

        // Limpiar el token y guardar el contacto verificado
        $contact->verification_token = null;
        $contact->save();

        return redirect()->route('contact')->with('status', 'Correo electrónico verificado correctamente.');
    }
}

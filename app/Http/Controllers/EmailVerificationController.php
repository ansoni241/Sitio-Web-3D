<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use App\Models\EmailVerification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;

class EmailVerificationController extends Controller
{
    public function verify($token)
    {
        $verification = EmailVerification::where('token', $token)->first();

        if (!$verification) {
            return redirect('/')->with('error', 'Token de verificación no válido.');
        }

        // Comprobar si el token ha expirado (24 horas)
        $tokenAge = now()->diffInHours($verification->created_at);

        if ($tokenAge > 24) {
            $verification->delete();
            return redirect('/')->with('error', 'El token de verificación ha expirado.');
        }

        // Guardar los datos en la tabla de contactos
        Contact::create([
            'nombre' => $verification->name,
            'apellido' => $verification->lastname,
            'correo' => $verification->email,
            'asunto' => $verification->affair,
            'mensaje' => $verification->message,
        ]);
        // Obtener el mensaje de la verificación
        $mensaje = $verification->message;

        // Enviar una copia del mensaje a tu bandeja de entrada de correo electrónico
        Mail::to('informacion@industriaspatzi.com')->send(new ContactFormMail(
            $verification->name,
            $verification->lastname,
            $verification->email,
            $verification->affair,
            $mensaje
        ));

        // Eliminar el registro de verificación después de su uso
        $verification->delete();

        return redirect('contact')->with('status', '¡Correo verificado exitosamente! Su mensaje ha sido enviado correctamente. Nos pondremos en contacto con usted lo antes posible.');
    }
}

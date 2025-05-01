<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\UserControl;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.user.index')->only('index');
        // $this->middleware('can:admin.user.create')->only('create','store');
        $this->middleware('can:admin.user.edit')->only('edit','update');
        $this->middleware('can:admin.user.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    protected $messages = [
        'email.required' => 'El campo email es obligatorio.',
        'email.unique' => 'El correo electrónico ya ha sido registrado.',
        'email.email' => 'El campo email debe ser una dirección de correo electrónico válida.',
        'email.max' => 'El campo email no debe superar los 255 caracteres.',

        'name.string' => 'El campo nombre debe ser una cadena de texto.',
        'name.regex' => 'El campo nombre solo puede contener letras y espacios.',
        'name.max' => 'El campo nombre no debe superar los 255 caracteres.',

        'celular.required' => 'El campo celular es obligatorio.',
        'celular.string' => 'El campo celular debe ser una cadena de texto.',
        'celular.regex' => 'El campo celular debe comenzar con 6, 7 u 4 y tener exactamente 8 dígitos.',
    ];
    public function index()
    {
        $usuarios = User::all()->reverse();
        return view('admin.user.index',compact('usuarios'));
    }
    public function create()
    {
        return view('admin.user.create');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        // Validar los datos del formulario
        $request->validate([

            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'celular' => ['required', 'string', 'regex:/^(6|7|4)\d{7}$/'], // Número de celular con el primer dígito 6, 7 u 4 y exactamente 7 dígitos más
        ], $this->messages);

        $nombreCompleto = $request->name; // Captura el nombre completo del request
        $nombreSinEspacios = str_replace(' ', '', $nombreCompleto); // Elimina todos los espacios

        // Asignar el valor del campo 'celular' como la contraseña del campo 'password'
        $password = bcrypt($request->celular);

        try {
            User::create([
                'email' => $request->email,
                'name' => $request->name,
                'celular' => $request->celular,
                'password' => $password, // Guarda la contraseña cifrada en la base de datos
                'estado' => $request->estado,
                'login' => $nombreSinEspacios,
            ]);

            return redirect()->route('admin.user.index')->with('info', 'Usuario creado con éxito!');
        } catch (QueryException $e) {
            if ($e->errorInfo[1] === 1062) {
                return back()->withErrors(['email' => 'El correo electrónico ya ha sido registrado.'])->withInput();
            }
        }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.user.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {

        // Validar si el usuario es el admin principal (ID 1)
        if ($user->id == 1) {
            return redirect()->route('admin.user.edit', $user)->with('warning', 'No puedes modificar al administrador principal.');
        }

        // Validar si el usuario está intentando cambiar el rol de admin
        if ($user->id == 1 && $request->has('roles') && in_array('admin', $request->roles)) {
            return redirect()->route('admin.user.edit', $user)->with('warning', 'No puedes quitar el rol de administrador al administrador principal.');
        }

        // Validar si el usuario está intentando cambiar el estado
        if ($user->id == 1 && $request->has('estado') && $request->estado == 0) {
            return redirect()->route('admin.user.edit', $user)->with('warning', 'No puedes desactivar al administrador principal.');
        }

        // Actualizar roles
        $user->roles()->sync($request->roles);

        // Actualizar estado
        $user->update(['estado' => $request->estado]);

        return redirect()->route('admin.user.edit',$user)-> with('info', 'Se asignó los roles correctamente');
    }
}

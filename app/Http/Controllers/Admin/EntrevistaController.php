<?php

namespace App\Http\Controllers\Admin;

use App\Models\Entrevista;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EntrevistaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('can:admin.entrevista.index')->only('index');
        $this->middleware('can:admin.entrevista.create')->only('create','store');
        $this->middleware('can:admin.entrevista.edit')->only('edit','update');
        $this->middleware('can:admin.entrevista.destroy')->only('destroy');
    }
    protected $messages = [
        'title.required' => 'El título es obligatorio.',
        'title.string' => 'El título debe ser una cadena de caracteres.',
        'title.max' => 'El título no puede tener más de 50 caracteres.',
        'title.regex' => 'El título solo puede contener letras, números y espacios.',

        'url.required' => 'La URL es obligatoria.',
        'url.url' => 'La URL no es válida.',

        'fondo.required' => 'La imagen de fondo es obligatoria.',
        'fondo.mimetypes' => 'La imagen de fondo debe ser un archivo de tipo: jpeg, png, bmp, gif, svg o webp.',

        'descripcion.string' => 'La descripción debe ser una cadena de caracteres.',
        'descripcion.max' => 'La descripción no puede tener más de 300 caracteres.',
    ];
    public function index()
    {
        $entrevistas = Entrevista::all()->reverse();
        return view('admin.entrevista.index',compact('entrevistas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.entrevista.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd(request()->all());
        $request->validate([
            'title' => ['required', 'string', 'max:50', 'regex:/^[\pL\d\s]+$/u'],
            'url' => ['required', 'url'],
            'fondo' => ['required', 'mimetypes:image/jpeg,image/png,image/bmp,image/gif,image/svg+xml,image/webp'],
            'descripcion' => ['nullable','string','max:300'],
        ],$this->messages);
        // Subir el archivo y obtener el nombre almacenado
        $fondo = $request->file('fondo')->store('public/entrevista');
        $usuarioActual = Auth::user(); // Obtener el usuario autenticado
        Entrevista::create([
            'title' => $request->title,
            'url' => $request->url,
            'fondo' => basename($fondo),
            'descripcion' => $request->descripcion,
            'estado' => 1,
            'login' => $usuarioActual->login,
        ]);
        return to_route('admin.entrevista.index')->with('info', 'Entrevista creada con exito!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Entrevista $entrevistum)
    {
        return view('admin.entrevista.edit',compact('entrevistum'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Entrevista $entrevistum)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:50', 'regex:/^[\pL\d\s]+$/u'],
            'url' => ['required', 'url'],
            'fondo' => ['nullable', 'mimetypes:image/jpeg,image/png,image/bmp,image/gif,image/svg+xml,image/webp'],
            'descripcion' => ['nullable','string','max:300'],
        ],$this->messages);
        $usuarioActual = Auth::user(); // Obtener el usuario autenticado
        $data = [
            'title' => $request->title,
            'url' => $request->url,
            'descripcion' => $request->descripcion,
            'estado' => $request->estado,
            'login' => $usuarioActual->login,
        ];
        // Procesar el archivo solo si se proporciona uno nuevo
        if ($request->hasFile('fondo')) {
            // Eliminar la imagen antigua si existe
            if ($entrevistum->video_fondo) {
                Storage::delete('public/entrevista/' . $entrevistum->fondo);
            }

            // Subir el nuevo archivo y obtener el nombre almacenado
            $file = $request->file('fondo')->store('public/entrevista');

            // Asignar el nuevo nombre del archivo al array de datos
            $data['fondo'] = basename($file);
        }
        // Actualizar el producto con los datos procesados
        $entrevistum->update($data);

        return to_route('admin.entrevista.index')->with('info', 'Entrevista actualizada con exito!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

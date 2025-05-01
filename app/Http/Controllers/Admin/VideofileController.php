<?php

namespace App\Http\Controllers\Admin;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VideofileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('can:admin.videofile.index')->only('index');
        $this->middleware('can:admin.videofile.create')->only('create','store');
        $this->middleware('can:admin.videofile.edit')->only('edit','update');
        $this->middleware('can:admin.videofile.destroy')->only('destroy');
    }
    protected $messages = [
        'title.required' => 'El título es obligatorio.',
        'title.string' => 'El título debe ser una cadena de caracteres.',
        'title.max' => 'El título no puede tener más de :max caracteres.',
        'title.regex' => 'El título solo puede contener letras, números y espacios.',

        'video_fondo.required' => 'El archivo de imagen de fondo es obligatorio.',
        'video_fondo.mimes' => 'El archivo de imagen de fondo debe ser un archivo de imagen válido.',

        'video_file.required' => 'El archivo de video es obligatorio.',
        'video_file.mimetypes' => 'El archivo de video debe ser un archivo de video válido.',

        'descripcion.required' => 'La descripción es obligatoria.',
        'descripcion.string' => 'La descripción debe ser una cadena de caracteres.',
        'descripcion.max' => 'La descripción no puede tener más de :max caracteres.',
    ];

    public function index()
    {
        $videos = Video::all()->reverse();
        return view('admin.videofile.index',compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.videofile.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:50', 'regex:/^[\pL\d\s]+$/u'],
            'video_fondo' => ['required', 'mimetypes:image/jpeg,image/png,image/bmp,image/gif,image/svg+xml,image/webp'],
            'video_file' => ['required', 'mimetypes:video/*'],
            'descripcion' => ['nullable','string','max:300'],
        ],$this->messages);
        // Subir el archivo y obtener el nombre almacenado
        $video_fondo = $request->file('video_fondo')->store('public/video');
        $video_file = $request->file('video_file')->store('public/video');
        $usuarioActual = Auth::user(); // Obtener el usuario autenticado
        Video::create([
            'title' => $request->title,
            'video_fondo' => basename($video_fondo),
            'video_file' => basename($video_file),
            'descripcion' => $request->descripcion,
            'estado' => 1,
            'login' => $usuarioActual->login,

        ]);
        return to_route('admin.videofile.index')->with('info', 'Video creado con exito!');
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
    public function edit(Video $videofile)
    {
        return view('admin.videofile.edit',compact('videofile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Video $videofile)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:50', 'regex:/^[a-zA-Z0-9 ]+$/'],
            'video_fondo' => ['nullable', 'mimetypes:image/jpeg,image/png,image/bmp,image/gif,image/svg+xml,image/webp'],
            'video_file' => ['nullable', 'mimetypes:video/*'],
            'descripcion' => ['nullable','string','max:300'],
        ],$this->messages);
        $usuarioActual = Auth::user(); // Obtener el usuario autenticado
        $data = [
            'title' => $request->title,
            'descripcion' => $request->descripcion,
            'estado' => $request->estado,
            'login' => $usuarioActual->login,
        ];
        // Procesar el archivo solo si se proporciona uno nuevo
        if ($request->hasFile('video_fondo')) {
            // Eliminar la imagen antigua si existe
            if ($videofile->video_fondo) {
                Storage::delete('public/video/' . $videofile->video_fondo);
            }

            // Subir el nuevo archivo y obtener el nombre almacenado
            $file = $request->file('video_fondo')->store('public/video');

            // Asignar el nuevo nombre del archivo al array de datos
            $data['video_fondo'] = basename($file);
        }
        if ($request->hasFile('video_file')) {
            // Eliminar la imagen antigua si existe
            if ($videofile->video_file) {
                Storage::delete('public/video/' . $videofile->video_file);
            }

            // Subir el nuevo archivo y obtener el nombre almacenado
            $file = $request->file('video_file')->store('public/video');

            // Asignar el nuevo nombre del archivo al array de datos
            $data['video_file'] = basename($file);
        }


        // Actualizar el producto con los datos procesados
        $videofile->update($data);

        return to_route('admin.videofile.index')->with('info', 'Video actualizado con exito!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Redsocial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SocialController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.social.index')->only('index');
        $this->middleware('can:admin.social.create')->only('create','store');
        $this->middleware('can:admin.social.edit')->only('edit','update');
        $this->middleware('can:admin.social.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    protected $messages = [
        'url.required' => 'La URL es obligatoria.',
        'url.url' => 'Formato de URL no válido.',
        'url.max' => 'La URL no debe superar los 400 caracteres.',
    ];
    public function index()
    {
        $sociales = Redsocial::all();
        return view('admin.social.index',compact('sociales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Redsocial $social)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Redsocial $social)
    {
        return view('admin.social.edit',compact('social'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Redsocial $social)
    {
        $request->validate([
            'url' => ['required', 'url', 'max:400'],
            'pdf' => ['nullable', 'file', 'mimes:pdf'],
        ],$this->messages);
        $usuarioActual = Auth::user(); // Obtener el usuario autenticado
        $data = [
            'url' => $request->url,
            'login' => $usuarioActual->login,
        ];
        // Procesar el archivo solo si se proporciona uno nuevo
        if ($request->hasFile('pdf')) {
            // Eliminar la imagen antigua si existe
            if ($social->pdf) {
                Storage::delete('public/socialpdf/' . $social->pdf);
            }

            // Subir el nuevo archivo y obtener el nombre almacenado
            $pdffile = $request->file('pdf')->store('public/socialpdf');

            // Asignar el nuevo nombre del archivo al array de datos
            $data['pdf'] = basename($pdffile);
        }
        $social->update($data);
        return to_route('admin.social.index')->with('info', 'Red Social actualizada con exito!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Redsocial $social)
    {
        //
    }
}

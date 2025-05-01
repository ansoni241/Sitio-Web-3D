<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Reportage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ReportageController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.reportage.index')->only('index');
        $this->middleware('can:admin.reportage.create')->only('create','store');
        $this->middleware('can:admin.reportage.edit')->only('edit','update');
        $this->middleware('can:admin.reportage.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    protected $messages = [
        'fecha.required' => 'La fecha es obligatoria.',
        'fecha.date_format' => 'El formato de la fecha debe ser año-mes-día (YYYY-MM-DD).',
        // 'fecha.after' => 'La fecha debe ser igual o posterior a la fecha actual.',
        'fecha.after_or_equal' => 'La fecha debe ser igual o posterior a la fecha actual.',

        'descripcion.required' => 'La descripción es obligatoria.',
        'descripcion.string' => 'La descripción debe ser un texto.',
        'descripcion.max' => 'La descripción no debe superar los 300 caracteres.',

        'file.required' => 'El archivo es obligatorio.',
        'file.mimes' => 'El archivo debe ser una imagen en formato jpeg, png, bmp, gif o svg.',
    ];

    public function index()
    {
        $reportages = Reportage::where('online_sino', 1)->get()->reverse();
        return view('admin.reportage.index',compact('reportages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.reportage.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha' => ['required', 'date_format:Y-m-d','after_or_equal:' . Carbon::now()->startOfDay()->toDateString()],
            'descripcion' => ['required','string','max:300'],
            'file' => ['required','mimes:jpeg,png,bmp,gif,svg'],
        ],$this->messages);
        $usuarioActual = Auth::user(); // Obtener el usuario autenticado
        // Subir el archivo y obtener el nombre almacenado
        $file = $request->file('file')->store('public/news');
        Reportage::create([
            'fecha' => $request->fecha,
            'descripcion' => $request->descripcion,
            'file' => basename($file),
            'login' => $usuarioActual->login,
        ]);

        return to_route('admin.reportage.index')->with('info', 'Noticia creado con exito!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reportage $reportage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reportage $reportage)
    {
        return view('admin.reportage.edit',compact('reportage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reportage $reportage)
    {
        $request->validate([
            'fecha' => ['required', 'date_format:Y-m-d','after_or_equal:' . Carbon::now()->startOfDay()->toDateString()],
            'descripcion' => ['required','string','max:300'],
            'file' => ['nullable','image'],
        ],$this->messages);
        $usuarioActual = Auth::user(); // Obtener el usuario autenticado
        $data = [
            'fecha' => $request->fecha,
            'descripcion' => $request->descripcion,
            'login' => $usuarioActual->login,
        ];
        // Procesar el archivo solo si se proporciona uno nuevo
        if ($request->hasFile('file')) {
            // Eliminar la imagen antigua si existe
            if ($reportage->file) {
                Storage::delete('public/product/' . $reportage->file);
            }

            // Subir el nuevo archivo y obtener el nombre almacenado
            $file = $request->file('file')->store('public/news');

            // Asignar el nuevo nombre del archivo al array de datos
            $data['file'] = basename($file);
        }

        // Actualizar el producto con los datos procesados
        $reportage->update($data);

        return to_route('admin.reportage.index')->with('info', 'Noticia actualizada con exito!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reportage $reportage)
    {
        // $reportage->delete();
        $reportage->online_sino = 0;
        $reportage->save();
        return to_route('admin.reportage.index')->with('info', 'Noticia Eliminada!');
    }
}

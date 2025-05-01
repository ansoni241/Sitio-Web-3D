<?php

namespace App\Http\Controllers\Admin;

use App\Models\Chart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ChartController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.chart.index')->only('index');
        $this->middleware('can:admin.chart.create')->only('create','store');
        $this->middleware('can:admin.chart.edit')->only('edit','update');
        $this->middleware('can:admin.chart.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    protected $messages = [
        'nombre.required' => 'El campo nombre es obligatorio.',
        'nombre.string' => 'El campo nombre debe ser una cadena de texto.',
        'nombre.max' => 'El campo nombre no debe superar los 300 caracteres.',
        'nombre.regex' => 'El campo nombre solo puede contener letras y espacios.',

        'file.required' => 'El archivo es obligatorio.',
        'file.mimes' => 'El archivo debe ser una imagen en formato jpeg, png, bmp, gif o svg.',
    ];

    public function index()
    {
        $charts = Chart::where('online_sino', 1)->get()->reverse();
        return view('admin.chart.index',compact('charts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.chart.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required','string','max:300','regex:/^[a-zA-Z\s]+$/'],
            'file' => ['required','mimes:jpeg,png,bmp,gif,svg,webp'],
        ],$this->messages);
        // Subir el archivo y obtener el nombre almacenado
        $file = $request->file('file')->store('public/chart');
        Chart::create([
            'nombre' => $request->nombre,
            'file' => basename($file),
        ]);

        return to_route('admin.chart.index')->with('info', 'Cuadro creado con exito!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Chart $chart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chart $chart)
    {
        return view('admin.chart.edit',compact('chart'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chart $chart)
    {
        $request->validate([
            'nombre' => ['required','string','max:300','regex:/^[a-zA-Z\s]+$/'],
            'file' => ['nullable','image'],
        ],$this->messages);

        $data = [
            'nombre' => $request->nombre,
        ];
        // Procesar el archivo solo si se proporciona uno nuevo
        if ($request->hasFile('file')) {
            // Eliminar la imagen antigua si existe
            if ($chart->file) {
                Storage::delete('public/chart/' . $chart->file);
            }

            // Subir el nuevo archivo y obtener el nombre almacenado
            $file = $request->file('file')->store('public/chart');

            // Asignar el nuevo nombre del archivo al array de datos
            $data['file'] = basename($file);
        }

        // Actualizar el producto con los datos procesados
        $chart->update($data);

        return to_route('admin.chart.index')->with('info', 'Cuadro actualizada con exito!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chart $chart)
    {
        $chart->online_sino = 0;
        $chart->save();
        return to_route('admin.chart.index')->with('info', 'Cuadro Eliminado!');
    }
}

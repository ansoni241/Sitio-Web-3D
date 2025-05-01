<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('can:admin.product.index')->only('index');
        $this->middleware('can:admin.product.create')->only('create','store');
        $this->middleware('can:admin.product.edit')->only('edit','update');
        $this->middleware('can:admin.product.destroy')->only('destroy');
    }
    protected $messages = [
        'nombre.required' => 'El campo nombre es obligatorio.',
        'nombre.string' => 'El campo nombre debe ser una cadena de texto.',
        'nombre.max' => 'El campo nombre no debe superar los 50 caracteres.',
        'nombre.regex' => 'El campo nombre solo puede contener letras, números y espacios.',

        'descripcion.required' => 'El campo descripción es obligatorio.',
        'descripcion.string' => 'El campo descripción debe ser una cadena de texto.',
        'descripcion.max' => 'El campo descripción no debe superar los 300 caracteres.',

        'peso.required' => 'El campo peso es obligatorio.',
        'peso.string' => 'El campo peso debe ser una cadena de texto.',
        'peso.max' => 'El campo peso no debe superar los 10 caracteres.',

        'largo.required' => 'El campo largo es obligatorio.',
        'largo.string' => 'El campo largo debe ser una cadena de texto.',
        'largo.max' => 'El campo largo no debe superar los 30 caracteres.',

        'ancho.required' => 'El campo ancho es obligatorio.',
        'ancho.string' => 'El campo ancho debe ser una cadena de texto.',
        'ancho.max' => 'El campo ancho no debe superar los 30 caracteres.',

        'alto.required' => 'El campo alto es obligatorio.',
        'alto.string' => 'El campo alto debe ser una cadena de texto.',
        'alto.max' => 'El campo alto no debe superar los 30 caracteres.',

        'estado.required' => 'El campo estado es obligatorio.',
        'estado.numeric' => 'El campo estado debe ser un valor numérico.',
        'estado.in' => 'El campo estado debe ser 0 o 1.',

        'descuento.required' => 'El campo descuento es obligatorio.',
        'descuento.numeric' => 'El campo descuento debe ser un valor numérico.',
        'descuento.between' => 'El campo descuento debe estar entre 0 y 100.',
    ];
    public function index()
    {
        $products = Product::all()->reverse();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:50', 'regex:/^[a-zA-Z0-9 ]+$/'],
            'descripcion' => ['required','string','max:500'],
            'fisura' => ['required','string','max:500'],
            // **************************************************
            'alto_tolerancia' => ['nullable', 'numeric', 'max:9999'],
            'alto_dimensiones' => ['nullable', 'numeric', 'max:9999'],
            'alto_minimo' => ['nullable', 'numeric', 'max:9999'],
            'alto_maximo' => ['nullable', 'numeric', 'max:9999'],
            'ancho_tolerancia' => ['nullable', 'numeric', 'max:9999'],
            'ancho_dimensiones' => ['nullable', 'numeric', 'max:9999'],
            'ancho_minimo' => ['nullable', 'numeric', 'max:9999'],
            'ancho_maximo' => ['nullable', 'numeric', 'max:9999'],
            'largo_tolerancia' => ['nullable', 'numeric', 'max:9999'],
            'largo_dimensiones' => ['nullable', 'numeric', 'max:9999'],
            'largo_minimo' => ['nullable', 'numeric', 'max:9999'],
            'largo_maximo' => ['nullable', 'numeric', 'max:9999'],
            'peso_tolerancia' => ['nullable', 'numeric', 'max:9999'],
            'peso_dimensiones' => ['nullable', 'numeric', 'max:9999'],
            'peso_minimo' => ['nullable', 'numeric', 'max:9999'],
            'peso_maximo' => ['nullable', 'numeric', 'max:9999'],
            'fisica_compresion' => ['nullable', 'numeric', 'max:9999'],
            'fisica_minimo' => ['nullable', 'numeric', 'max:9999'],
            'fisica_maximo' => ['nullable', 'numeric', 'max:9999'],
            'rendimiento' => ['nullable', 'numeric', 'max:9999'],

            'descuento' => ['nullable', 'numeric', 'between:0,100'],
            'file' => ['required','mimes:jpeg,png,bmp,gif,svg'],
            'model' => ['nullable', 'file'],
            'pdf' => ['nullable', 'file', 'mimes:pdf'],
        ],$this->messages);
        // Subir el archivo y obtener el nombre almacenado
        $file = $request->file('file')->store('public/product');

        $pdf = null;
        // Inicializar el campo 'model' como nulo
        $modelFileName = null;

        // Verificar si se proporcionó un archivo para el campo 'model'
        if ($request->hasFile('model')) {
            // Subir el archivo del modelo .glb y obtener el nombre almacenado
            $modelFileName = $request->file('model')->store('public/models');
        }
        // Verificar si se proporcionó un archivo para el campo 'pdf'
        if ($request->hasFile('pdf')) {
            // Subir el archivo del modelo .glb y obtener el nombre almacenado
            $pdf = $request->file('pdf')->store('public/productpdf');
        }
        //redondeamos a solo 2 decimales
        $alto_tolerancia = round($request->alto_tolerancia, 2);
        $alto_dimensiones = round($request->alto_dimensiones, 2);
        $alto_minimo = round($request->alto_minimo, 2);
        $alto_maximo = round($request->alto_maximo, 2);
        $ancho_tolerancia = round($request->ancho_tolerancia, 2);
        $ancho_dimensiones = round($request->ancho_dimensiones, 2);
        $ancho_minimo = round($request->ancho_minimo, 2);
        $ancho_maximo = round($request->ancho_maximo, 2);
        $largo_tolerancia = round($request->largo_tolerancia, 2);
        $largo_dimensiones = round($request->largo_dimensiones, 2);
        $largo_minimo = round($request->largo_minimo, 2);
        $largo_maximo = round($request->largo_maximo, 2);
        $peso_tolerancia = round($request->peso_tolerancia, 2);
        $peso_dimensiones = round($request->peso_dimensiones, 2);
        $peso_minimo = round($request->peso_minimo, 2);
        $peso_maximo = round($request->peso_maximo, 2);
        $fisica_compresion = round($request->fisica_compresion, 2);
        $fisica_minimo = round($request->fisica_minimo, 2);
        $fisica_maximo = round($request->fisica_maximo, 2);
        $descuentos = round($request->descuento, 2);

        $usuarioActual = Auth::user(); // Obtener el usuario autenticado

        Product::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'fisura' => $request->fisura,
            //******************* */
            'alto_tolerancia' => $alto_tolerancia,
            'alto_dimensiones' => $alto_dimensiones,
            'alto_minimo' => $alto_minimo,
            'alto_maximo' => $alto_maximo,
            'ancho_tolerancia' => $ancho_tolerancia,
            'ancho_dimensiones' => $ancho_dimensiones,
            'ancho_minimo' => $ancho_minimo,
            'ancho_maximo' => $ancho_maximo,
            'largo_tolerancia' => $largo_tolerancia,
            'largo_dimensiones' => $largo_dimensiones,
            'largo_minimo' => $largo_minimo,
            'largo_maximo' => $largo_maximo,
            'peso_tolerancia' => $peso_tolerancia,
            'peso_dimensiones' => $peso_dimensiones,
            'peso_minimo' => $peso_minimo,
            'peso_maximo' => $peso_maximo,
            'fisica_compresion' => $fisica_compresion,
            'fisica_minimo' => $fisica_minimo,
            'fisica_maximo' => $fisica_maximo,
            'rendimiento' => $request->rendimiento,
            //********************************** */
            'descuento' => $descuentos,
            'file' => basename($file),
            'model' => basename($modelFileName),
            'pdf' => basename($pdf),
            'login' => $usuarioActual->login,
        ]);
        return to_route('admin.product.index')->with('info', 'Producto creado con exito!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:50', 'regex:/^[a-zA-Z0-9 ]+$/'],
            'descripcion' => ['required','string','max:300'],
            'fisura' => ['required','string','max:500'],
            // **************************************************
            'alto_tolerancia' => ['nullable', 'numeric', 'max:9999'],
            'alto_dimensiones' => ['nullable', 'numeric', 'max:9999'],
            'alto_minimo' => ['nullable', 'numeric', 'max:9999'],
            'alto_maximo' => ['nullable', 'numeric', 'max:9999'],
            'ancho_tolerancia' => ['nullable', 'numeric', 'max:9999'],
            'ancho_dimensiones' => ['nullable', 'numeric', 'max:9999'],
            'ancho_minimo' => ['nullable', 'numeric', 'max:9999'],
            'ancho_maximo' => ['nullable', 'numeric', 'max:9999'],
            'largo_tolerancia' => ['nullable', 'numeric', 'max:9999'],
            'largo_dimensiones' => ['nullable', 'numeric', 'max:9999'],
            'largo_minimo' => ['nullable', 'numeric', 'max:9999'],
            'largo_maximo' => ['nullable', 'numeric', 'max:9999'],
            'peso_tolerancia' => ['nullable', 'numeric', 'max:9999'],
            'peso_dimensiones' => ['nullable', 'numeric', 'max:9999'],
            'peso_minimo' => ['nullable', 'numeric', 'max:9999'],
            'peso_maximo' => ['nullable', 'numeric', 'max:9999'],
            'fisica_compresion' => ['nullable', 'numeric', 'max:9999'],
            'fisica_minimo' => ['nullable', 'numeric', 'max:9999'],
            'fisica_maximo' => ['nullable', 'numeric', 'max:9999'],
            'rendimiento' => ['nullable', 'numeric', 'max:9999'],

            'estado' => ['required', 'numeric', 'in:0,1'],
            'descuento' => ['nullable', 'numeric', 'between:0,100'],

            'file' => ['nullable','image'],
            'model' => ['nullable', 'file'],
            'pdf' => ['nullable', 'file', 'mimes:pdf'],
        ],$this->messages);

        $usuarioActual = Auth::user(); // Obtener el usuario autenticado

        //redondeamos a solo 2 decimales
        $alto_tolerancia = round($request->alto_tolerancia, 2);
        $alto_dimensiones = round($request->alto_dimensiones, 2);
        $alto_minimo = round($request->alto_minimo, 2);
        $alto_maximo = round($request->alto_maximo, 2);
        $ancho_tolerancia = round($request->ancho_tolerancia, 2);
        $ancho_dimensiones = round($request->ancho_dimensiones, 2);
        $ancho_minimo = round($request->ancho_minimo, 2);
        $ancho_maximo = round($request->ancho_maximo, 2);
        $largo_tolerancia = round($request->largo_tolerancia, 2);
        $largo_dimensiones = round($request->largo_dimensiones, 2);
        $largo_minimo = round($request->largo_minimo, 2);
        $largo_maximo = round($request->largo_maximo, 2);
        $peso_tolerancia = round($request->peso_tolerancia, 2);
        $peso_dimensiones = round($request->peso_dimensiones, 2);
        $peso_minimo = round($request->peso_minimo, 2);
        $peso_maximo = round($request->peso_maximo, 2);
        $fisica_compresion = round($request->fisica_compresion, 2);
        $fisica_minimo = round($request->fisica_minimo, 2);
        $fisica_maximo = round($request->fisica_maximo, 2);
        $descuentos = round($request->descuento, 2);
        $data = [
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'fisura' => $request->fisura,
            //******************* */
            'alto_tolerancia' => $alto_tolerancia,
            'alto_dimensiones' => $alto_dimensiones,
            'alto_minimo' => $alto_minimo,
            'alto_maximo' => $alto_maximo,
            'ancho_tolerancia' => $ancho_tolerancia,
            'ancho_dimensiones' => $ancho_dimensiones,
            'ancho_minimo' => $ancho_minimo,
            'ancho_maximo' => $ancho_maximo,
            'largo_tolerancia' => $largo_tolerancia,
            'largo_dimensiones' => $largo_dimensiones,
            'largo_minimo' => $largo_minimo,
            'largo_maximo' => $largo_maximo,
            'peso_tolerancia' => $peso_tolerancia,
            'peso_dimensiones' => $peso_dimensiones,
            'peso_minimo' => $peso_minimo,
            'peso_maximo' => $peso_maximo,
            'fisica_compresion' => $fisica_compresion,
            'fisica_minimo' => $fisica_minimo,
            'fisica_maximo' => $fisica_maximo,
            'rendimiento' => $request->rendimiento,

            'estado' => $request->estado,
            'descuento' => $descuentos,
            'login' => $usuarioActual->login,
        ];
        // Procesar el archivo solo si se proporciona uno nuevo
        if ($request->hasFile('file')) {
            // Eliminar la imagen antigua si existe
            if ($product->file) {
                Storage::delete('public/product/' . $product->file);
            }

            // Subir el nuevo archivo y obtener el nombre almacenado
            $file = $request->file('file')->store('public/product');

            // Asignar el nuevo nombre del archivo al array de datos
            $data['file'] = basename($file);
        }
        //Para el 3D
        // Procesar el archivo solo si se proporciona uno nuevo
        if ($request->hasFile('model')) {
            // Eliminar la imagen antigua si existe
            if ($product->model) {
                Storage::delete('public/models/' . $product->model);
            }

            // Subir el nuevo archivo y obtener el nombre almacenado
            $modelFile = $request->file('model')->store('public/models');

            // Asignar el nuevo nombre del archivo al array de datos
            $data['model'] = basename($modelFile);
        }
        // Procesar el archivo solo si se proporciona uno nuevo
        if ($request->hasFile('pdf')) {
            // Eliminar la imagen antigua si existe
            if ($product->pdf) {
                Storage::delete('public/productpdf/' . $product->pdf);
            }

            // Subir el nuevo archivo y obtener el nombre almacenado
            $pdffile = $request->file('pdf')->store('public/productpdf');

            // Asignar el nuevo nombre del archivo al array de datos
            $data['pdf'] = basename($pdffile);
        }

        // Actualizar el producto con los datos procesados
        $product->update($data);

        return to_route('admin.product.index')->with('info', 'Producto actualizado con exito!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {

    }
}

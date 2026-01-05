<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    public function index(){

        $stores = DB::table('store')->where('estado', 1)->get();
        return view('store',['stores'=>$stores, 'allStores' => $stores]);
    }
    public function show(Store $store){
        $allStores = DB::table('store')->where('estado', 1)->get();
        return view('stores.show',['store'=> $store, 'allStores' => $allStores]);
    }
    public function agregarAlCarrito(Request $request, Store $store)
    {
        //No implementado aún
        // Lógica para agregar el producto al carrito
        // Puedes usar el modelo $store para obtener la información del producto

        // Ejemplo:
        // $producto = $store;

        // Agrega el producto al carrito (puedes usar sesiones para mantener el carrito)
        // $request->session()->push('carrito', $producto);

        // Redirige a la página del producto o al carrito
        // return redirect()->route('stores.cart', ['store' => $store])->with('success', 'Producto agregado al carrito');

    }
}

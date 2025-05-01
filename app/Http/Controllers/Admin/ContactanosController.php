<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactanosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('can:admin.contactanos.index')->only('index');
        $this->middleware('can:admin.contactanos.create')->only('create','store');
        $this->middleware('can:admin.contactanos.edit')->only('edit','update');
        $this->middleware('can:admin.contactanos.destroy')->only('destroy');
    }
    public function index()
    {
        // $mensajes = Contact::all()->reverse();
        $mensajes = Contact::where('online_sino', 1)->get()->reverse();
        return view('admin.contactanos.index',compact('mensajes'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contactano)
    {
        // dd($contactano->id);
        // $contactano->delete();
        $contactano->online_sino = 0;
        $contactano->save();
        return to_route('admin.contactanos.index')->with('info', 'Mensaje Eliminado!');
    }
}

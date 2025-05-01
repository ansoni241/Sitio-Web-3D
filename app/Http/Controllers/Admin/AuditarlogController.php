<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Loggeneral;
use Illuminate\Http\Request;

class AuditarlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:view-admin-options')->only(['index']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loggeneral = Loggeneral::all()->reverse();
        return view('admin.auditarlog.index',compact('loggeneral'));
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
    public function destroy(string $id)
    {
        //
    }
}

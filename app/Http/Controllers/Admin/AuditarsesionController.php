<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Rappasoft\LaravelAuthenticationLog\Models\AuthenticationLog as Log;


class AuditarsesionController extends Controller
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
        $log = Log::with('user')
            ->where('authenticatable_type', User::class)
            ->get()
            ->reverse();

        return view('admin.auditarsesion.index',compact('log'));
    }
        /**
     * Obtiene el nombre del navegador a partir del user agent.
     *
     * @param string $userAgent
     * @return string
     */
    public static function getBrowser($userAgent)
    {
        if (strpos($userAgent, 'MSIE') !== false || strpos($userAgent, 'Trident') !== false) {
            return 'Internet Explorer';
        } elseif (strpos($userAgent, 'Firefox') !== false) {
            return 'Firefox';
        } elseif (strpos($userAgent, 'Chrome') !== false) {
            return 'Chrome';
        } elseif (strpos($userAgent, 'Safari') !== false) {
            return 'Safari';
        } elseif (strpos($userAgent, 'Opera') !== false || strpos($userAgent, 'OPR') !== false) {
            return 'Opera';
        } elseif (strpos($userAgent, 'Edge') !== false) {
            return 'Edge';
        } else {
            return 'Desconocido';
        }
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

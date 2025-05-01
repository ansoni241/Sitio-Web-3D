<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SetDatabaseSessionVariables
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $ipAddress = $this->request->ip();
            $userName = Auth::user()->name;

            DB::statement("SET @user_name = ?", [$userName]);
            DB::statement("SET @ip_address = ?", [$ipAddress]);
        }

        return $next($request);
    }
}

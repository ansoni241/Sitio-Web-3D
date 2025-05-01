<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Auth;
use Rappasoft\LaravelAuthenticationLog\Traits\AuthenticationLoggable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;
    use AuthenticationLoggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'celular',
        'password',
        'estado',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function adminlte_image() {
        return 'https://picsum.photos/300/300';
    }
    public function adminlte_desc() {
        // return "Administrador";
        // Verifica si el usuario está autenticado
        if (Auth::check()) {
            // Obtiene los roles del usuario actual
            $roles = Auth::user()->roles;

            // Verifica si el usuario tiene al menos un rol asignado
            if ($roles->isNotEmpty()) {
                // Devuelve el nombre del primer rol (puedes ajustar la lógica según tus necesidades)
                return $roles->first()->name;
            }
        }

        // Devuelve un valor predeterminado si el usuario no está autenticado o no tiene roles asignados
        return "Usuario sin rol";
    }
    public function adminlte_profile_url(){
        // Lógica para obtener la URL del perfil del usuario
        // Puedes personalizar esto según tus necesidades
        // return route('user.profile', $this->id);
        // return 'profile/username';
        return route('profile.edit');
    }
    public function notifyAuthenticationLogVia()
    {
        // return ['nexmo', 'mail', 'slack'];
        return ['mail'];
    }
}

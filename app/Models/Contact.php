<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Contact extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
    'verification_token',
    'nombre',
    'apellido',
    'correo' ,
    'asunto' ,
    'mensaje',
    'online_sino',
    'created_at',];
    protected $table = 'contact';
}

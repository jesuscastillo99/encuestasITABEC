<?php

namespace App\Models;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Usuario extends Model implements Authenticatable
{
    use AuthenticatableTrait;

    use HasApiTokens, HasFactory, Notifiable;

    use HasFactory;
    public $timestamps = false;
    protected $table = 'usuarios'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'idlog';
    protected $fillable = ['correo', 'contraseña', 'activo', 'act_token'];

}

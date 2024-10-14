<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    protected $primaryKey = 'idpublicacion';
    // Especificar el nombre de la tabla
    protected $table = 'publicacion';
    // Desactivar timestamps
    public $timestamps = false;
    protected $fillable = [
        'idtrimestre',
        'titulo',
        'cuerpo',
        'archivo',
        'enlace',
        'fechap',
        'año'
    ];

    use HasFactory;

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Equipo extends Model
{
    protected $primaryKey = 'idequipo';
    // Especificar el nombre de la tabla
    protected $table = 'equipos';
    // Desactivar timestamps
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'equipo',
        'modelo',
        'sistema',
        'procesador',
        'ram',
        'almacenamiento',
        // Asegúrate de incluir todos los campos de tu tabla "equipos"
    ];

    public static function obtenerEquiposPaginados($offset, $limit)
    {
        $results = DB::select('EXEC ObtenerRegistrosEquipos ?, ?', [$offset, $limit]);
        return $results;
    }

    public static function contarTotalRegistros()
    {
        return DB::table('bitacoras')->count();
    }

}

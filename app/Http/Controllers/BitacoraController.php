<?php

namespace App\Http\Controllers;
use App\Models\BitacoraModel;
use App\Models\Equipo;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BitacoraController extends Controller
{
    public function create()
    {
        // Obtener todos los equipos para el dropdown
        $equipos = Equipo::all();
        return view('layouts.crearbitacora', compact('equipos'));
    }

    public function create2()
    {
        return view('layouts.crearequipos');
    }

    public function store(Request $request)
    {
        $request->validate([
            'numero' => 'required|integer',
            'fechasolicitud' => 'required|date',
            'fechaentrega' => 'required|date',
            'idtecnico' => 'required|integer',
            'idequipo' => 'required|integer',
            'falla' => 'required|string|max:255',
            'causa' => 'required|string|max:255',
            'solucion' => 'required|string|max:255',
            'observaciones' => 'nullable|string|max:255',
            'responsable' => 'nullable|string|max:255',
            'archivo' => 'required|file|mimes:pdf|max:2048', // Validación del archivo
        ]);

        // Guardar el archivo
        if ($request->hasFile('archivo')) {
            $archivo = $request->file('archivo');
            $rutaArchivo = $archivo->store('bitacoras', 'public'); // Guardar en storage/app/public/bitacoras

            // Guardar la bitácora en la base de datos
            $bitacora = new BitacoraModel();
            $bitacora->numero = $request->input('numero');
            $bitacora->fechasolicitud = $request->input('fechasolicitud');
            $bitacora->fechaentrega = $request->input('fechaentrega');
            $bitacora->idtecnico = $request->input('idtecnico');
            $bitacora->idequipo = $request->input('idequipo');
            $bitacora->falla = $request->input('falla');
            $bitacora->causa = $request->input('causa');
            $bitacora->solucion = $request->input('solucion');
            $bitacora->observaciones = $request->input('observaciones');
            $bitacora->responsable = $request->input('responsable');
            $bitacora->archivo = $rutaArchivo;
            $bitacora->save();

            return redirect()->route('bitacoras')->with('success', 'Bitácora creada con éxito');
        }

        return redirect()->back()->with('error', 'Error al subir el archivo');
    }

    public function store2(Request $request)
    {
        $request->validate([
            'equipo' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'sistema' => 'required|string|max:255',
            'procesador' => 'nullable|string|max:255',
            'ram' => 'nullable|string|max:255',
            'almacenamiento' => 'nullable|string|max:255',
        ]);

    
            // Guardar el equipo en la base de datos
            $equipo = new Equipo();
            $equipo->equipo = $request->input('equipo');
            $equipo->modelo = $request->input('modelo');
            $equipo->sistema = $request->input('sistema');
            $equipo->procesador = $request->input('procesador');
            $equipo->ram = $request->input('ram');
            $equipo->almacenamiento = $request->input('almacenamiento');
            $equipo->save();

            return redirect()->route('equipos')->with('success', 'Equipo creado con éxito');
        

        return redirect()->back()->with('error', 'Error al subir el archivo');
    }

    public function index(Request $request)
    {
        
        /// Obtener el número de página de la solicitud
        $page = $request->input('page', 1);
        $limit = 20; // Número de registros por página
        $offset = ($page - 1) * $limit; // Cálculo de la posición inicial

        // Obtener el orden de la solicitud (ascendente o descendente)
        $order = $request->input('order', 'desc');

        // Obtener los registros paginados
        $bitacoras = BitacoraModel::obtenerRegistrosPaginados($offset, $limit, $order);

        // Contar el total de registros (necesario para calcular el total de páginas)
        $totalRegistros = BitacoraModel::contarTotalRegistros();
        $totalPages = ceil($totalRegistros / $limit);

        // Obtener todos los registros para el gráfico
        $allBitacoras = DB::table('bitacoras')
            ->select('fechasolicitud', 'idtecnico', 'responsable')
            ->get();

        // Agrupar los datos por técnico y contar las bitacoras por cada uno
        $bitacorasPorTecnico = $allBitacoras->groupBy('idtecnico')->mapWithKeys(function ($group, $idtecnico) {
            $tecnicoNombre = '';
            if ($idtecnico == 1) {
                $tecnicoNombre = 'Jesus';
            } elseif ($idtecnico == 2) {
                $tecnicoNombre = 'Leonardo';
            } else {
                $tecnicoNombre = 'Otro Técnico';
            }
            return [
                $tecnicoNombre => [
                    'total' => $group->count(),
                    'fechas' => $group->pluck('fechasolicitud')->toArray(),
                ]
            ];
        });

        // Retornar la vista con los datos
        return view('layouts.bitacoras', [
            'bitacoras' => $bitacoras,
            'currentPage' => $page,
            'totalPages' => $totalPages,
            'bitacorasPorTecnico' => $bitacorasPorTecnico,
            'order' => $order, // Pasar el orden a la vista
            'totalBitacoras' => $totalRegistros // Pasar el total de bitácoras a la vista
        ]);
    }

    public function index2(Request $request)
    {
        
        // Obtener el número de página de la solicitud
        $page = $request->input('page', 1);
        $limit = 20; // Número de registros por página
        $offset = ($page - 1) * $limit; // Cálculo de la posición inicial

        // Obtener los registros paginados
        $equipos = Equipo::obtenerEquiposPaginados($offset, $limit);

        // Contar el total de registros (necesario para calcular el total de páginas)
        $totalRegistros = Equipo::contarTotalRegistros();
        $totalPages = ceil($totalRegistros / $limit);

        // Retornar la vista con los datos
        return view('layouts.equipos', [
            'equipos' => $equipos,
            'currentPage' => $page,
            'totalPages' => $totalPages
        ]);
    }
}

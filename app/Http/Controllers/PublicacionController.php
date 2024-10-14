<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publicacion;

class PublicacionController extends Controller
{

    public function index(){
        return view('layouts.publicaciones');
    }


    public function mostrarPublicacionesRecientes()
    {
        
    }
}

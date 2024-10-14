<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ActivationController;
use App\Http\Controllers\DatosController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\UbicacionController;
use App\Http\Controllers\VistasController;
use Illuminate\Support\Facades\Auth;
//Rutas inicio
//Route::get('/admin/inicio', [InicioController::class, 'index'])->name('inicioadmin')->middleware('auth');

Route::get('/admin/inicio', [InicioController::class, 'mostrarPublicacionesRecientes'])->name('inicioadmin')->middleware('auth');

//Rutas para el login
Route::get('/admin/login', function() {
    return view('layouts.login');
})->name('login')->middleware('guest');

Route::post('/admin/login', [LoginController::class, 'registro']);

//Rutas logout
Route::get('/logout', function() {
    return view('layouts.login');
})->name('logout');

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/error', function() {
    return view('layouts.error');
})->name('error');


//Rutas para el registro
Route::get('/registro', function() {
    return view('layouts.registro');
})->name('registro');

Route::post('/registro', [RegistroController::class, 'registro']);

//Ruta exito
Route::get('/exito', function() {
    return view('layouts.exito');
})->name('exito');

//Ruta para validación de correo
Route::get('/activate/{token}', [ActivationController::class, 'activate'])->name('activate');

//Ruta para publicaciones
Route::get('/admin/publicaciones', [PublicacionController::class, 'index'])->name('publicacionesadmin')->middleware('auth');
















//Ruta de acerca de
Route::get('/acercade', function() {
    return view('layouts.acercade');
})->name('acercade');

//Ruta de noticias
Route::get('/noticias', function() {
    return view('layouts.noticias');
})->name('noticias');

//Ruta para crear noticias
Route::get('/noticias-admin', function() {
    return view('layouts.noticiasadmin');
})->name('noticiasadmin');

//Ruta para bitacoras
Route::get('/bitacoras', [BitacoraController::class, 'index'])->name('bitacoras');
Route::get('/bitacoras/create', [BitacoraController::class, 'create'])->name('bitacoras.create');
Route::post('/bitacoras/create/c', [BitacoraController::class, 'store'])->name('bitacoras.store');

//Rutas para equipos
Route::get('/equipos', [BitacoraController::class, 'index2'])->name('equipos');
Route::get('/equipos/create', [BitacoraController::class, 'create2'])->name('equipos.create');
Route::post('/equipos/create/c', [BitacoraController::class, 'store2'])->name('equipos.store');
?>
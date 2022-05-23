<?php

use App\Http\Controllers\ExamenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PanelController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
    //return view('');
//});

Route::controller(LoginController::class)->group(function(){
    Route::get('login', 'login')->name('login');
    Route::post('login', 'validar')->name('login.validar');
    Route::get('login/destroy', 'destroy')->name('login.destroy');
    Route::get('login/registro', 'registro')->name('registro');
    Route::post('login/registro', 'store')->name('registro.store');
});

Route::controller(PanelController::class)->group(function(){
    Route::get('panelEstudiante', 'panelE')->name('panel.estudiante');
    Route::get('panel/edit', 'edit')->name('panelE.edit');
    Route::put('panel/{id}/edit', 'update')->name('panelE.editar');
    Route::get('panelDocente', 'showD')->middleware('auth.docente')->name('panel.docente');
    

});

Route::controller(ExamenController::class)->group(function(){
    Route::get('PanelDocete/create/examen', 'create')->name('examen.create');
    Route::post('panelDocente/create/examen', 'store')->name('examen.store');
    // Route::get('pregunta/{id}', 'showP')->name('examen.gestionar');
    Route::get('pregunta/{id}/edit', 'editarP')->name('pregunta.editar');
    Route::put('pregunta/{id}', 'update')->name('pregunta.edit');
    Route::delete('pregunta/{id}', 'eliminar')->name('pregunta.eliminar');
    Route::get('PanelEstudiante/examen', 'show')->name('examenE.mostrar');
    Route::post('pregunta/respuestas/{usuario}', 'resp')->name('pregunta.respuesta');
    Route::post('pregunta/intento/{usuario}', 'intento')->name('examen.intento');
    Route::get('panel/reporte', 'verReporte')->name('panelE.reporte');
});

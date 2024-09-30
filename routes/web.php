<?php

use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('home');
})->name('home')->middleware('auth');

Auth::routes();

Route::controller(UsuarioController::class)->group(function (){
    Route::get('usuario/{option}','index')->name('usuario.index');
    Route::get('usuario/show/{user}','show')->name('usuario.show');
    Route::get('usuario/DatosServerSideActivo/{sw}','datos')->name('usuario.datos');
    Route::get('usuario/destroy/{user}','destroy')->name('usuario.destroy');
    Route::get('usuario/restore/{user}','restore')->name('usuario.restore');
   Route::post('usuario/store','store')->name('usuario.store');
   Route::post('usuario/update/{user}','update')->name('usuario.update'); 
   /* Route::post('usuario/update_perfil','update_perfil')->name('usuario.update_perfil');
    Route::post('usuario/update_password','update_password')->name('usuario.update_password');
    Route::get('usuario/DatosServerSideActivo','DatosServerSideActivo')->name('usuario.DatosServerSideActivo'); //activos
    Route::get('usuario/DatosServerSideInactivo','DatosServerSideInactivo')->name('usuario.DatosServerSideInactivo'); //eliminados
    Route::get('usuario/perfil','perfil')->name('usuario.perfil');
    Route::post('usuario/store','store')->name('usuario.store');
    
    
    
    Route::get('usuario/buscar/{id}','buscarPoUsuario')->name('usuario.buscar');*/
});
Route::controller(RolController::class)->group(function (){
    Route::get('rol','index')->name('rol.index');
    Route::get('rol/DatosServerSideActivo/{sw}','datos')->name('rol.datos'); 
   /* Route::post('usuario/update_perfil','update_perfil')->name('usuario.update_perfil');
    Route::post('usuario/update_password','update_password')->name('usuario.update_password');
    Route::get('usuario/DatosServerSideActivo','DatosServerSideActivo')->name('usuario.DatosServerSideActivo'); //activos
    Route::get('usuario/DatosServerSideInactivo','DatosServerSideInactivo')->name('usuario.DatosServerSideInactivo'); //eliminados
    Route::get('usuario/perfil','perfil')->name('usuario.perfil');
    
    Route::post('usuario/update/{id}','update')->name('usuario.update');
    Route::get('usuario/destroy/{id}','destroy')->name('usuario.destroy');
    Route::get('usuario/restore/{id}','restore')->name('usuario.restore');
    Route::get('usuario/buscar/{id}','buscarPoUsuario')->name('usuario.buscar');*/
});

/*Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');*/

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ArchivoController;

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
    return view('Bienvenido');
});

//Auth::routes(['verify' => true]);


//proteger lar páginas que no puedan acceder al menú sin log in con middleware auth
Route::group(['middleware' => 'auth'], function() { 
    
    Route::resource('users', App\Http\Controllers\UserController::class);

    Route::resource('posts', App\Http\Controllers\PostController::class);

    Route::resource('permissions', App\Http\Controllers\PermissionController::class);
    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::get('/perfil', [App\Http\Controllers\PerfilController::class, 'index'])->name('perfil');
    
    Route::resource('archivo', App\Http\Controllers\ArchivoController::class)->except('edit','update');
    Route::get('archivo/descargar/{archivo}', [App\Http\Controllers\ArchivoController::class, 'descargar'])->name('archivo.descargar');
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/pdf',[App\Http\Controllers\PDFController::class, 'PDF'])->name('descargarPDF');
    Route::get('/paypal/pay',[App\Http\Controllers\PaymentController::class, 'index'])->name('pay');

});

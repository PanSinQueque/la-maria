<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/dashboard');

/*
|--------------------------------------------------------------------------
| Rutas para visitantes
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
});

/*
|--------------------------------------------------------------------------
| Cierre de sesión
|--------------------------------------------------------------------------
*/
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| Rutas protegidas
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::resource('productos', ProductoController::class)->except(['show']);
    Route::resource('categorias', CategoriaController::class)->except(['show']);
    Route::view('/usuarios', 'usuarios')->name('usuarios.index');
    Route::view('/roles', 'roles')->name('roles.index');
    Route::view('/contacto', 'contacto')->name('contacto.index');
    Route::view('/cotizacion', 'cotizacion')->name('cotizacion.index');
    Route::view('/empresa', 'empresa')->name('empresa');
});

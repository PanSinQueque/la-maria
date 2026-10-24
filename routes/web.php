<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/dashboard');

Route::view('/dashboard', 'dashboard')->name('dashboard');
Route::view('/productos', 'productos')->name('productos.index');
Route::view('/categorias', 'categorias')->name('categorias.index');
Route::view('/usuarios', 'usuarios')->name('usuarios.index');
Route::view('/roles', 'roles')->name('roles.index');
Route::view('/contacto', 'contacto')->name('contacto.index');
Route::view('/cotizacion', 'cotizacion')->name('cotizacion.index');
Route::view('/empresa', 'empresa')->name('empresa');
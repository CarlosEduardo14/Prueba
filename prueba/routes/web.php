<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;

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
//Rutas del sistema

Route::get('/tareas', function () {
    return view('welcome');
})->name('tareas');

//Ruta para mostrar la vista principal
Route::get('/', [TareaController::class, 'index'])->name('index');

//Ruta para mostrar el formulario para crear la tarea
Route::get('/crear', [TareaController::class, 'create'])->name('tarea.crear');

//Ruta para insertar los datos del formulario en la base de datos
Route::post('/insertar', [TareaController::class, 'store'])->name('tarea.insertar');

//Ruta para mostrar el formulario que actualiza el registro
Route::get('/editar/{tarea}', [TareaController::class, 'edit'])->name('tarea.editar');

//Ruta para actualizar la tarea anteriormente modificado en el formulario en la base de datos
Route::put('/actualizar/{tarea}', [TareaController::class, 'update'])->name('tarea.actualizar');

//Ruta para eliminar la tarea de la base de datos
Route::get('/eliminar/{tarea}', [TareaController::class, 'destroy'])->name('tarea.eliminar');

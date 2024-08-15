<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/tareas', [TareaController::class, 'index']);
Route::get('/crear', [TareaController::class, 'create'])->name('tarea.crear');
Route::post('/tareas', [TareaController::class, 'store'])->name('tarea.insertar'); 
Route::get('/tareasEditar/{tarea}', [TareaController::class, 'edit'])->name('tarea.editar');
Route::put('/tareasActualizar/{tarea}', [TareaController::class, 'update'])->name('tarea.actualizar');
Route::delete('/tareasEliminar/{tarea}', [TareaController::class, 'destroy'])->name('tarea.eliminar');
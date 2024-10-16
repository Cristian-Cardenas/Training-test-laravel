<?php

use App\Http\Controllers\Create_workerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);



Route::get('/create_worker', [Create_workerController::class, 'index'])->name('create_worker.index');

Route::post('/create_worker/crear_trabajadores', [Create_workerController::class, 'crear_trabajadores'])->name('crear_trabajadores');
Route::post('/create_worker/crear_cursos', [Create_workerController::class, 'crear_cursos'])->name('crear_cursos');
Route::post('/create_worker/crear_contenidos', [Create_workerController::class, 'crear_contenidos'])->name('crear_contenidos');
Route::post('/create_worker/crear_evaluaciones', [Create_workerController::class, 'crear_evaluaciones'])->name('crear_evaluaciones');
Route::post('/create_worker/crear_preguntas', [Create_workerController::class, 'crear_preguntas'])->name('crear_preguntas');
Route::post('/create_worker/crear_respuestas', [Create_workerController::class, 'crear_respuestas'])->name('crear_respuestas');
Route::post('/create_worker/respuestas', [Create_workerController::class, 'respuestas'])->name('respuestas');
// Route::get('/create_worker/contenidos', [Create_workerController::class, 'contenidos'])->name('contenidos');


Route::get('/create_worker/getRespuestas', [Create_workerController::class, 'getRespuestas'])->name('getRespuestas');
Route::get('/create_worker/{id}/contenidos', [Create_workerController::class, 'getContenidos'])->name('create_worker.getContenidos');
Route::get('/create_worker/{id}/evaluaciones', [Create_workerController::class, 'getEvaluaciones'])->name('create_worker.getEvaluaciones');
Route::get('/create_worker/{id}/crear_preguntas', [Create_workerController::class, 'get_id_c_pregunta'])->name('create_worker.get_id_c_pregunta');
Route::get('/create_worker/{id}/crear_respuestas', [Create_workerController::class, 'get_id_c_respuesta'])->name('create_worker.get_id_c_respuesta');
Route::get('/create_worker/{id}/trabajadores', [Create_workerController::class, 'get_id_trabajador'])->name('create_worker.get_id_trabajador');
Route::get('/create_worker/{id}/evaluaciones2', [Create_workerController::class, 'get_id_evaluacion'])->name('create_worker.get_id_evaluacion');
Route::get('/create_worker/{id}/pregunta', [Create_workerController::class, 'get_id_pregunta'])->name('create_worker.get_id_pregunta');
Route::get('/create_worker/{id}/preguntas', [Create_workerController::class, 'getPreguntas'])->name('create_worker.getPreguntas');


Route::get('/create_worker/{id_trabajador}/{id_evaluacion}', [Create_workerController::class, 'verificarIntentos'])->name('create_worker.verificarIntentos');
Route::get('/create_worker/getNotasPorTrabajador', [Create_workerController::class, 'getNotasPorTrabajador'])->name('create_worker.getNotasPorTrabajador');
Route::get('/create_worker/get_notas', [Create_workerController::class, 'getNotasPorTrabajador'])->name('create_worker.getNotasPorTrabajador');










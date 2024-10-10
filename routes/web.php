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






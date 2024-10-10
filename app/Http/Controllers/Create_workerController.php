<?php

namespace App\Http\Controllers;

use App\Models\contenidos;
use App\Models\crear_preguntas;
use App\Models\crear_respuestas;
use App\Models\cursos;
use App\Models\evaluaciones;
use App\Models\respuestas;
use Illuminate\Http\Request;
use App\Models\trabajadores;

class Create_workerController extends Controller
{
    // Método que obtiene tanto trabajadores como cursos
    public function index()
    {
        $trabajadores = trabajadores::all();
        $cursos = cursos::all();
        $contenidos = contenidos::all();
        $evaluaciones = evaluaciones::all();
        $crear_preguntas = crear_preguntas::all();
        $crear_respuestas = crear_respuestas::all();
        $respuestas = respuestas::all();

        return view('create_worker', [
            'trabajadores' => $trabajadores,
            'cursos' => $cursos,
            'contenidos' => $contenidos,
            'evaluaciones' => $evaluaciones,
            'crear_preguntas' => $crear_preguntas,
            'crear_respuestas' => $crear_respuestas,
            'respuestas' => $respuestas
        ]);
    }

    // Método para crear trabajadores
    public function crear_trabajadores(Request $request)
    {
        $datos = $request->all();
        trabajadores::create($datos);

        // Redirigir a la vista index para mostrar nuevamente la lista actualizada
        return redirect()->route('create_worker.index');
    }
    // Método para crear cursos
    public function crear_cursos(Request $request)
    {
        $datos = $request->all();
        cursos::create($datos);

        // Redirigir a la vista index para mostrar nuevamente la lista actualizada
        return redirect()->route('create_worker.index');
    }
    public function crear_contenidos(Request $request)
    {
        $datos = $request->all();
        contenidos::create($datos);

        // Redirigir a la vista index para mostrar nuevamente la lista actualizada
        return redirect()->route('create_worker.index');
    }
    public function crear_evaluaciones(Request $request)
    {
        $datos = $request->all();
        evaluaciones::create($datos);

        // Redirigir a la vista index para mostrar nuevamente la lista actualizada
        return redirect()->route('create_worker.index');
    }
    public function crear_preguntas(Request $request)
    {
        $datos = $request->all();
        crear_preguntas::create($datos);

        // Redirigir a la vista index para mostrar nuevamente la lista actualizada
        return redirect()->route('create_worker.index');
    }
    public function crear_respuestas(Request $request)
    {
        $datos = $request->all();
        crear_respuestas::create($datos);

        // Redirigir a la vista index para mostrar nuevamente la lista actualizada
        return redirect()->route('create_worker.index');
    }
}

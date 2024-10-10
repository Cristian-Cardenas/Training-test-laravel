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
    public function respuestas(Request $request)
    {
        $request->validate([
            'id_trabajador' => 'required|exists:trabajadores,id_trabajador',
            'id_c_pregunta' => 'required|exists:crear_preguntas,id_c_pregunta',
            'id_c_respuesta' => 'required|exists:crear_respuestas,id_c_respuesta',
            'id_evaluacion' => 'required|exists:evaluaciones,id_evaluacion',

        ]);

        $id_c_respuesta = $request->id_c_respuesta;

        $respuesta_seleccionada = crear_respuestas::find($id_c_respuesta);
        if ($respuesta_seleccionada) {

            $validacion = $respuesta_seleccionada->validacion ?? false;
            // dd([
            //     'id_trabajador' => $request->id_trabajador,
            //     'id_c_pregunta' => $request->id_c_pregunta,
            //     'id_c_respuesta' => $id_c_respuesta,
            //     'es_correcta' => $validacion,
            // ]);
            respuestas::create([
                'id_trabajador' => $request->id_trabajador,
                'id_c_pregunta' => $request->id_c_pregunta,
                'id_c_respuesta' => $id_c_respuesta,
                'id_evaluacion' => $request->id_evaluacion,
                'es_correcta' => $validacion,
            ]);

            return redirect()->route('create_worker.index')->with('success', 'Respuesta guardada exitosamente.');
        } else {
            return redirect()->back()->withErrors('La respuesta seleccionada no es válida.');
        }
    }

    public function getContenidos($id)
    {
        $contenidos = contenidos::where('id_curso', $id)->get();
        if ($contenidos->isEmpty()) {
            return response()->json(['message' => 'No contents found'], 200);
        }
        return response()->json($contenidos);
    }
    public function getEvaluaciones($id)
    {
        $evaluaciones = evaluaciones::where('id_contenido', $id)->get();
        if ($evaluaciones->isEmpty()) {
            return response()->json(['message' => 'No contents found'], 200);
        }
        return response()->json($evaluaciones);
    }
    public function get_id_c_pregunta($id)
    {
        $id_c_pregunta = crear_preguntas::where('id_evaluacion', $id)->get();
        if ($id_c_pregunta->isEmpty()) {
            return response()->json(['message' => 'No contents found'], 200);
        }
        return response()->json($id_c_pregunta);
    }
}

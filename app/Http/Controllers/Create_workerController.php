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
use Illuminate\Support\Facades\DB;

class Create_workerController extends Controller
{
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
            'respuestas' => $respuestas,

        ]);
    }
    public function crear_trabajadores(Request $request)
    {
        $datos = $request->all();
        trabajadores::create($datos);
        return redirect()->route('create_worker.index');
    }
    public function crear_cursos(Request $request)
    {
        $datos = $request->all();
        cursos::create($datos);

        // Redirigir a la vista index para mostrar nuevamente la lista actualizada
        return redirect()->route('create_worker.index');
    }
    public function crear_contenidos(Request $request)
    {
        $request->validate([
            'titulo_contenido' => 'required|string|max:255',
            'id_curso' => 'required|exists:cursos,id_curso',
            'material' => 'required|string|max:500',
            'archivo' => 'file|mimes:pdf,mp4,avi,docx,txt|max:10240',
        ]);
        $archivoPath = $request->file('archivo')->store('materiales', 'public'); // Almacena en /storage/app/public/materiales

        contenidos::create([
            'titulo_contenido' => $request->input('titulo_contenido'),
            'id_curso' => $request->input('id_curso'),
            'material' => $request->input('material'),
            'archivo' => $archivoPath,
        ]);
        return redirect()->back()->with('success', 'Contenido creado exitosamente.');
    }
    public function crear_evaluaciones(Request $request)
    {
        $datos = $request->all();
        evaluaciones::create($datos);
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
        return redirect()->route('create_worker.index');
    }
    public function respuestas(Request $request)
    {
        $datos = $request->validate([
            'id_trabajador' => 'required|exists:trabajadores,id_trabajador',
            'id_evaluacion' => 'required|exists:evaluaciones,id_evaluacion',
            'respuesta' => 'required|array',
        ]);
        // dd($datos);


        $respuestas = $request->input('respuesta');
        $idTrabajador = $request->input('id_trabajador');
        $idEvaluacion = $request->input('id_evaluacion');

        $intentoActual = respuestas::where('id_trabajador', $idTrabajador)
            ->where('id_evaluacion', $idEvaluacion)
            ->max('intento');

        $evaluacion = evaluaciones::find($idEvaluacion);

        if ($intentoActual >= $evaluacion->limite_intentos) {
            return response()->json([
                'success' => false,
                'error' => 'Ya no tienes intentos disponibles para esta evaluación.'
            ], 403);
        }

        $nuevoIntento = $intentoActual ? $intentoActual + 1 : 1;

        DB::beginTransaction();

        try {
            foreach ($respuestas as $idPregunta => $idRespuesta) {
                $respuestaSeleccionada = crear_respuestas::find($idRespuesta);

                if (!$respuestaSeleccionada) {
                    throw new \Exception("Respuesta no válida para la pregunta $idPregunta.");
                }

                Respuestas::create([
                    'id_trabajador' => $idTrabajador,
                    'id_evaluacion' => $idEvaluacion,
                    'id_c_pregunta' => $idPregunta,
                    'id_c_respuesta' => $idRespuesta,
                    'es_correcta' => $respuestaSeleccionada->validacion ?? false,
                    'intento' => $nuevoIntento,
                ]);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Respuestas guardadas correctamente.'
            ], 200);
        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'success' => false,
                'error' => 'Ocurrió un error al guardar las respuestas: ' . $e->getMessage()
            ], 500);
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
    public function get_id_c_respuesta($id)
    {
        $id_c_respuesta = crear_respuestas::where('id_c_pregunta', $id)->get();
        if ($id_c_respuesta->isEmpty()) {
            return response()->json(['message' => 'No contents found'], 200);
        }
        return response()->json($id_c_respuesta);
    }
    public function get_id_trabajador($id)
    {
        $id_trabajador = respuestas::with(['pregunta', 'respuesta'])->where('id_trabajador', $id)->get();
        if ($id_trabajador->isEmpty()) {
            return response()->json(['message' => 'No contents found'], 200);
        }
        return response()->json($id_trabajador);
    }
    public function get_id_evaluacion($id)
    {
        try {
            $id_evaluacion = crear_preguntas::where('id_evaluacion', $id)->get();

            if ($id_evaluacion->isEmpty()) {
                return response()->json(['message' => 'No contents found'], 200);
            }
            return response()->json($id_evaluacion);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function get_id_pregunta($id)
    {
        try {
            $id_pregunta = crear_respuestas::where('id_c_pregunta', $id)->get();

            if ($id_pregunta->isEmpty()) {
                return response()->json(['message' => 'No contents found'], 200);
            }
            return response()->json($id_pregunta);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function getPreguntas($id)
    {
        $evaluacion = evaluaciones::find($id);

        if (!$evaluacion) {
            return response()->json(['error' => 'Evaluación no encontrada'], 404);
        }

        $preguntas = crear_preguntas::where('id_evaluacion', $id)->get()->map(function ($pregunta) {
            return [
                'id_c_pregunta' => $pregunta->id_c_pregunta,
                'pregunta' => $pregunta->pregunta,
                'respuestas' => crear_respuestas::where('id_c_pregunta', $pregunta->id_c_pregunta)->get(),
            ];
        });

        return response()->json([
            'limite_intentos' => $evaluacion->limite_intentos,
            'preguntas' => $preguntas,
        ]);
    }
    public function verificarIntentos($id_trabajador, $id_evaluacion)
    {
        $intentoActual = respuestas::where('id_trabajador', $id_trabajador)
            ->where('id_evaluacion', $id_evaluacion)
            ->max('intento');

        $evaluacion = evaluaciones::find($id_evaluacion);

        if ($intentoActual >= $evaluacion->limite_intentos) {
            return response()->json(['puede_continuar' => false, 'error' => 'No tienes intentos disponibles.'], 403);
        }

        return response()->json(['puede_continuar' => true]);
    }
    public function getNotasPorTrabajador()
    {
        $respuestas = respuestas::with(['trabajador', 'evaluacion.contenido.curso'])
            ->select(
                'id_trabajador',
                'id_evaluacion',
                'intento', 
                DB::raw('SUM(CASE WHEN es_correcta = true THEN 1 ELSE 0 END) as correctas'),
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('id_trabajador', 'id_evaluacion', 'intento') 
            ->get();

        $resultadosAgrupados = [];

        foreach ($respuestas as $respuesta) {
            $nota = ($respuesta->correctas / $respuesta->total) * 5;

            $key = "{$respuesta->id_trabajador}-{$respuesta->id_evaluacion}";

            if (!isset($resultadosAgrupados[$key]) || $nota > $resultadosAgrupados[$key]['nota']) {
                $curso = $respuesta->evaluacion->contenido->curso->titulo_curso ?? 'Sin curso';

                $resultadosAgrupados[$key] = [
                    'id_trabajador' => $respuesta->id_trabajador,
                    'nombre' => $respuesta->trabajador->nombre_trabajador,
                    'curso' => $curso,
                    'nota' => number_format($nota, 2),
                    'fecha' => $respuesta->evaluacion->created_at->format('Y-m-d'),
                ];
            }
        }

        $resultados = array_values($resultadosAgrupados);

        if (empty($resultados)) {
            return response()->json(['message' => 'No hay notas disponibles'], 200);
        }

        return response()->json($resultados);
    }
}

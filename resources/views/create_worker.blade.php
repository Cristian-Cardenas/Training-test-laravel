<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Diseño DB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="d-flex container">
        <form class="m-5 col" action="{{ route('crear_trabajadores') }}" method="post">
            {{ csrf_field() }}
            <div class="mb-3">
                <label class="active">Nombre del Trabajador</label>
                <input name="nombre_trabajador" type="text" class="validate form-control">
            </div>
            <div class="mb-3">
                <label class="active">Area</label>
                <input name="area" type="text" class="validate form-control">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

        <div class="mt-5 col">
            <h2 class="mb-4">Lista de trabajadores</h2>

            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre del Trabajador</th>
                        <th>Área</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trabajadores as $trabajador)
                        <tr>
                            <td>{{ $trabajador->id_trabajador}}</td>
                            <td>{{ $trabajador->nombre_trabajador}}</td>
                            <td>{{ $trabajador->area}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($trabajadores->isEmpty())
                <div class="alert alert-info" role="alert">
                    No hay trabajadores registrados.
                </div>
            @endif
        </div>
    </div>

    <div class="d-flex container">
        <form class="m-5 col" action="{{ route('crear_cursos') }}" method="post">
            {{ csrf_field() }}
            <div class="mb-3">
                <label class="active">Titulo del curso</label>
                <input name="titulo_curso" type="text" class="validate form-control">
            </div>
            <div class="mb-3">
                <label class="active">Descripción</label>
                <input name="descripcion_curso" type="text" class="validate form-control">
            </div>
            <div class="mb-3">
                <label class="active">Area</label>
                <input name="area" type="text" class="validate form-control">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

        <div class="mt-5 col">
            <h2 class="mb-4">Lista de Cursos</h2>

            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Cursos</th>
                        <th>Descripcion</th>
                        <th>Área</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cursos as $curso)
                        <tr>
                            <td>{{ $curso->id_curso }}</td>
                            <td>{{ $curso->titulo_curso }}</td>
                            <td>{{ $curso->descripcion_curso }}</td>
                            <td>{{ $curso->area }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($cursos->isEmpty())
                <div class="alert alert-info" role="alert">
                    No hay cursos registrados.
                </div>
            @endif
        </div>
    </div>

    <div class="d-flex container">
        <form class="m-5 col" action="{{ route('crear_contenidos') }}" method="post">
            {{ csrf_field() }}
            <div class="mb-3">
                <label class="active">Titulo del contenido</label>
                <input name="titulo_contenido" type="text" class="validate form-control">
            </div>
            <select name="id_curso" class="form-control" required>
                <option value="">Selecciona un curso</option>
                @foreach($cursos as $curso)
                    <option value="{{ $curso->id_curso }}">{{ $curso->titulo_curso }}</option>
                @endforeach
            </select>
            <div class="mb-3">
                <label class="active">Material </label>
                <input name="material" type="text" class="validate form-control">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

        <div class="mt-5 col">
            <h2 class="mb-4">Lista de Contenido</h2>

            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>ID de Curso</th>
                        <th>Titulo Contenido </th>
                        <th>Material</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contenidos as $contenido )
                        <tr>
                            <td>{{$contenido->id_contenido}}</td>
                            <td>{{$contenido->id_curso}}</td>
                            <td>{{$contenido->titulo_contenido}}</td>
                            <td>{{$contenido->material}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($contenidos->isEmpty())
                <div class="alert alert-info" role="alert">
                    No hay cursos registrados.
                </div>
            @endif
        </div>
    </div>

    <div class="d-flex container">
        <form class="m-5 col" action="{{ route('crear_evaluaciones') }}" method="post">
            {{ csrf_field() }}
            <div class="mb-3">
                <label class="active">Limite de intentos</label>
                <input name="limite_intentos" type="text" class="validate form-control">
            </div>
            <select name="id_contenido" class="form-control" required>
                <option value="">Selecciona un contenido</option>
                @foreach($contenidos as $contenido)
                    <option value="{{ $contenido->id_contenido }}">{{ $contenido->titulo_contenido }}</option>
                @endforeach
            </select>
            <div class="mb-3">
                <label class="active">Fecha limite </label>
                <input name="fecha_limite" type="date" class="validate form-control">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

        <div class="mt-5 col">
            <h2 class="mb-4">Lista de evaluaciones</h2>

            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>ID de Contenido</th>
                        <th>Limite de intentos </th>
                        <th>Fecha limite</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($evaluaciones as $evaluacion )
                        <tr>
                            <td>{{ $evaluacion->id_evaluacion  }}</td>
                            <td>{{ $evaluacion->id_contenido  }}</td>
                            <td>{{ $evaluacion->limite_intentos  }}</td>
                            <td>{{ $evaluacion->fecha_limite  }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($evaluaciones->isEmpty())
                <div class="alert alert-info" role="alert">
                    No hay cursos registrados.
                </div>
            @endif
        </div>
    </div>

    <div class="d-flex container">
        <form class="m-5 col" action="{{ route('crear_preguntas') }}" method="post">
            {{ csrf_field() }}
            <select name="id_evaluacion" class="form-control" required>
                <option value="">Selecciona una evaluacion</option>
                @foreach($evaluaciones as $evaluacion)
                    <option value="{{ $evaluacion->id_evaluacion }}">{{ $evaluacion->id_evaluacion }}</option>
                @endforeach
            </select>
            <div class="mb-3">
                <label class="active">Pregunta de evaluacion</label>
                <input name="pregunta" type="text" class="validate form-control">
            </div>
            
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

        <div class="mt-5 col">
            <h2 class="mb-4">Lista de preguntas</h2>

            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>ID de Evaluacion</th>
                        <th>Pregunta de evaluacion </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($crear_preguntas as $crear_pregunta )
                        <tr>
                            <td>{{ $crear_pregunta->id_c_pregunta  }}</td>
                            <td>{{ $crear_pregunta->id_evaluacion  }}</td>
                            <td>{{ $crear_pregunta->pregunta  }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($crear_preguntas->isEmpty())
                <div class="alert alert-info" role="alert">
                    No hay cursos registrados.
                </div>
            @endif
        </div>
    </div>

    <div class="d-flex container">
        <form class="m-5 col" action="{{ route('crear_respuestas') }}" method="post">
            {{ csrf_field() }}
            <select name="id_c_pregunta" class="form-control" required>
                <option value="">Selecciona una pregunta</option>
                @foreach($crear_preguntas as $crear_pregunta)
                    <option value="{{ $crear_pregunta->id_c_pregunta }}">{{ $crear_pregunta->pregunta }}</option>
                @endforeach
            </select>
            <div class="mb-3">
                <label class="active">Respuesta de evaluacion</label>
                <input name="c_respuesta" type="text" class="validate form-control">
            </div>
            <select name="validacion" class="form-control" required>
                <option value="" disabled selected>Seleccione una opción</option>
                <option value="true">True</option>
                <option value="false">False</option>
            </select>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

        <div class="mt-5 col">
            <h2 class="mb-4">Lista de Respuestas</h2>

            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>ID de Pregunta</th>
                        <th>Respuesta de evaluacion </th>
                        <th>Validación </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($crear_respuestas as $crear_respuesta )
                        <tr>
                            <td>{{ $crear_respuesta->id_c_respuesta  }}</td>
                            <td>{{ $crear_respuesta->id_c_pregunta  }}</td>
                            <td>{{ $crear_respuesta->c_respuesta  }}</td>
                            <td>{{ $crear_respuesta->validacion  }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($crear_respuestas->isEmpty())
                <div class="alert alert-info" role="alert">
                    No hay cursos registrados.
                </div>
            @endif
        </div>
    </div>

    <div class="d-flex container">
        
        <div class="mt-5 col">
            <h2 class="mb-4">Listado de Respuestas de Trabajadores</h2>

            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Trabajador</th>
                        <th>Respuesta de evaluacion </th>
                        <th>Validación </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($respuestas as $respuesta )
                        <tr>
                            <td>{{ $respuesta->id_respuesta  }}</td>
                            <td>{{ $respuesta->id_c_pregunta  }}</td>
                            <td>{{ $respuesta->c_respuesta  }}</td>
                            <td>{{ $respuesta->validacion  }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($respuestas->isEmpty())
                <div class="alert alert-info" role="alert">
                    No hay cursos registrados.
                </div>
            @endif
        </div>
    </div>
</body>

</html>

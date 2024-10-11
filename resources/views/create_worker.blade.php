<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Diseño DB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function nextTab(tabId) {
            var nextTab = new bootstrap.Tab(document.querySelector(tabId));
            nextTab.show();
        }

        function prevTab(tabId) {
            var prevTab = new bootstrap.Tab(document.querySelector(tabId));
            prevTab.show();
        }
    </script>
</head>

<body>

    <div class="container mt-5">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="tab1-tab" data-bs-toggle="tab" data-bs-target="#tab1"
                    type="button" role="tab" aria-controls="tab1" aria-selected="true">Crear Trabajador</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab2-tab" data-bs-toggle="tab" data-bs-target="#tab2" type="button"
                    role="tab" aria-controls="tab2" aria-selected="false">Crear Cursos</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab3-tab" data-bs-toggle="tab" data-bs-target="#tab3" type="button"
                    role="tab" aria-controls="tab3" aria-selected="false">Crear Contenido</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab4-tab" data-bs-toggle="tab" data-bs-target="#tab4" type="button"
                    role="tab" aria-controls="tab4" aria-selected="false">Crear Evaluacion</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab5-tab" data-bs-toggle="tab" data-bs-target="#tab5" type="button"
                    role="tab" aria-controls="tab5" aria-selected="false">Crear Pregunta</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab6-tab" data-bs-toggle="tab" data-bs-target="#tab6" type="button"
                    role="tab" aria-controls="tab6" aria-selected="false">Crear Respuesta</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab7-tab" data-bs-toggle="tab" data-bs-target="#tab7" type="button"
                    role="tab" aria-controls="tab7" aria-selected="false">Respuesta del trabajador</button>
            </li>

        </ul>

        <div class="tab-content mt-3" id="myTabContent">
            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
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
                                        <td>{{ $trabajador->id_trabajador }}</td>
                                        <td>{{ $trabajador->nombre_trabajador }}</td>
                                        <td>{{ $trabajador->area }}</td>
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
                <button class="btn btn-primary" onclick="nextTab('#tab2-tab')">Siguiente</button>
            </div>

            <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
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
                <button class="btn btn-secondary" onclick="prevTab('#tab1-tab')">Anterior</button>
                <button class="btn btn-primary" onclick="nextTab('#tab3-tab')">Siguiente</button>
            </div>

            <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
                <div class="d-flex container">
                    <form class="m-5 col" action="{{ route('crear_contenidos') }}" method="post">
                        {{ csrf_field() }}
                        <div class="mb-3">
                            <label class="active">Titulo del contenido</label>
                            <input name="titulo_contenido" type="text" class="validate form-control">
                        </div>
                        <label class="active">Cursos</label>
                        <select name="id_curso" id="cursoSelect" class="form-control" required>
                            <option value="">Selecciona un curso</option>
                            @foreach ($cursos as $curso)
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
                        <h2 class="mb-4">Lista de Contenidos</h2>

                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>ID de Curso</th>
                                    <th>Titulo Contenido </th>
                                    <th>Material</th>
                                </tr>
                            </thead>
                            <tbody id="contenidoBody">
                                @foreach ($contenidos as $contenido)
                                    <tr>
                                        <td>{{ $contenido->id_contenido }}</td>
                                        <td>{{ $contenido->id_curso }}</td>
                                        <td>{{ $contenido->titulo_contenido }}</td>
                                        <td>{{ $contenido->material }}</td>
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
                <button class="btn btn-secondary" onclick="prevTab('#tab2-tab')">Anterior</button>
                <button class="btn btn-primary" onclick="nextTab('#tab4-tab')">Siguiente</button>

            </div>
            <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="tab4-tab">
                <div class="d-flex container">
                    <form class="m-5 col" action="{{ route('crear_evaluaciones') }}" method="post">
                        {{ csrf_field() }}
                        <div class="mb-3">
                            <label class="active">Limite de intentos</label>
                            <input name="limite_intentos" type="text" class="validate form-control">
                        </div>
                        <option value="">Selecciona un contenido a evaluar</option>
                        <select name="id_contenido" id="contenidoSelect" class="form-control" required>
                            @foreach ($contenidos as $contenido)
                                <option value="{{ $contenido->id_contenido }}">{{ $contenido->titulo_contenido }}
                                </option>
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
                            <tbody id="evaluacionBody">
                                @foreach ($evaluaciones as $evaluacion)
                                    <tr>
                                        <td>{{ $evaluacion->id_evaluacion }}</td>
                                        <td>{{ $evaluacion->id_contenido }}</td>
                                        <td>{{ $evaluacion->limite_intentos }}</td>
                                        <td>{{ $evaluacion->fecha_limite }}</td>
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
                <button class="btn btn-secondary" onclick="prevTab('#tab3-tab')">Anterior</button>
                <button class="btn btn-primary" onclick="nextTab('#tab5-tab')">Siguiente</button>

            </div>
            <div class="tab-pane fade" id="tab5" role="tabpanel" aria-labelledby="tab5-tab">
                <div class="d-flex container">
                    <form class="m-5 col" action="{{ route('crear_preguntas') }}" method="post">
                        {{ csrf_field() }}
                        <select name="id_evaluacion" id="evaluacionSelect" class="form-control" required>
                            <option value="">Selecciona una evaluacion</option>
                            @foreach ($evaluaciones as $evaluacion)
                                <option value="{{ $evaluacion->id_evaluacion }}">{{ $evaluacion->id_evaluacion }}
                                </option>
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
                            <tbody id="c_preguntaBody">
                                @foreach ($crear_preguntas as $crear_pregunta)
                                    <tr>
                                        <td>{{ $crear_pregunta->id_c_pregunta }}</td>
                                        <td>{{ $crear_pregunta->id_evaluacion }}</td>
                                        <td>{{ $crear_pregunta->pregunta }}</td>
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
                <button class="btn btn-secondary" onclick="prevTab('#tab4-tab')">Anterior</button>
                <button class="btn btn-primary" onclick="nextTab('#tab6-tab')">Siguiente</button>

            </div>
            <div class="tab-pane fade" id="tab6" role="tabpanel" aria-labelledby="tab6-tab">
                <div class="d-flex container">
                    <form class="m-5 col" action="{{ route('crear_respuestas') }}" method="post">
                        {{ csrf_field() }}
                        <label class="active">Selecciona una Pregunta</label>

                        <select name="id_c_pregunta" id="preguntaSelect" class="form-control" required>
                            <option value="">Selecciona una pregunta</option>
                            @foreach ($crear_preguntas as $crear_pregunta)
                                <option value="{{ $crear_pregunta->id_c_pregunta }}">{{ $crear_pregunta->pregunta }}
                                </option>
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
                            <tbody id="c_respuestaBody">
                                @foreach ($crear_respuestas as $crear_respuesta)
                                    <tr>
                                        <td>{{ $crear_respuesta->id_c_respuesta }}</td>
                                        <td>{{ $crear_respuesta->id_c_pregunta }}</td>
                                        <td>{{ $crear_respuesta->c_respuesta }}</td>
                                        <td>{{ $crear_respuesta->validacion }}</td>

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
                <button class="btn btn-secondary" onclick="prevTab('#tab5-tab')">Anterior</button>
                <button class="btn btn-primary" onclick="nextTab('#tab7-tab')">Siguiente</button>

            </div>
            <div class="tab-pane fade" id="tab7" role="tabpanel" aria-labelledby="tab7-tab">
                <div class="d-flex container">
                    <form class="m-5 col" action="{{ route('respuestas') }}" method="post">
                        {{ csrf_field() }}
                        <label class="active">Selecciona tu nombre</label>
                        <select name="id_trabajador" id="trabajadorSelect" class="form-control" required>
                            <option value="">- - -</option>
                            @foreach ($trabajadores as $trabajador)
                                <option value="{{ $trabajador->id_trabajador }}">{{ $trabajador->nombre_trabajador }}
                                </option>
                            @endforeach
                        </select>
                        <label class="active">Selecciona tu evaluacion</label>
                        <select name="id_evaluacion" id="evaluacionSelect" class="form-control" required>
                            <option value="">- - -</option>
                            @foreach ($evaluaciones as $evaluacion)
                                <option value="{{ $evaluacion->id_evaluacion }}">{{ $evaluacion->id_evaluacion }}
                                </option>
                            @endforeach
                        </select>
                        <label class="active">Selecciona una pregunta</label>
                        <select name="id_c_pregunta" class="form-control" required>
                            <option value="">- - -</option>
                            @foreach ($crear_preguntas as $crear_pregunta)
                                <option value="{{ $crear_pregunta->id_c_pregunta }}">{{ $crear_pregunta->pregunta }}
                                </option>
                            @endforeach
                        </select>
                        <label class="active">Selecciona una respuesta</label>
                        <select name="id_c_respuesta" class="form-control" required>
                            <option value="">- - -</option>
                            @foreach ($crear_respuestas as $crear_respuesta)
                                <option value="{{ $crear_respuesta->id_c_respuesta }}">
                                    {{ $crear_respuesta->c_respuesta }}</option>
                            @endforeach
                        </select>

                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>

                    <div class="mt-5 col">
                        <h2 class="mb-4">Lista de Respuestas</h2>
                        @if (isset($respuestas) && $respuestas)
                            <table class="table table-bordered table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>ID del trabajador</th>
                                        <th>ID de evaluacion</th>
                                        <th>ID de Pregunta</th>
                                        <th>Su respuesta</th>
                                        <th>Validación </th>

                                    </tr>
                                </thead>
                                <tbody id="respuestaBody">
                                    @foreach ($respuestas as $respuesta)
                                        <tr>
                                            <td>{{ $respuesta->id_respuesta }}</td>
                                            <td>{{ $respuesta->id_trabajador }}</td>
                                            <td>{{ $respuesta->id_evaluacion }}</td>
                                            <td>{{ $respuesta->pregunta->pregunta ?? 'Sin pregunta' }}</td>
                                            <td>{{ $respuesta->respuesta->c_respuesta ?? 'Sin respuesta' }}</td>
                                            <td>{{ $respuesta->es_correcta ? 'Correcta' : 'Incorrecta' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-info" role="alert">
                                No hay respuestas registradas.
                            </div>
                        @endif
                    </div>
                </div>
                <button class="btn btn-secondary" onclick="prevTab('#tab6-tab')">Anterior</button>
            </div>

        </div>
    </div>

</body>
<script>
    document.getElementById('cursoSelect').addEventListener('change', function() {
        const cursoId = this.value;
        if (cursoId) {
            // Realiza una solicitud AJAX para obtener los contenidos del curso
            fetch(`/new-project/public/create_worker/${cursoId}/contenidos`) // Usar el cursoId en lugar de "id"
                .then(response => {
                    // console.log(response); 
                    return response.json();
                })
                
                .then(data => {
                    console.log('Datos recibidos:', data);
                    const contenidoBody = document.getElementById('contenidoBody');
                    contenidoBody.innerHTML = ''; // Limpiar tabla anterior

                    if (data.length > 0) {
                        // Iterar sobre los contenidos obtenidos y agregarlos a la tabla
                        data.forEach(contenido => {
                            const row = `
                                <tr>
                                    <td>${contenido.id_contenido}</td>
                                    <td>${contenido.id_curso}</td>
                                    <td>${contenido.titulo_contenido}</td>
                                    <td>${contenido.material}</td>
                                </tr>
                            `;
                            contenidoBody.innerHTML += row;
                        });
                    } else {
                        // Si no hay contenidos, muestra un mensaje en la tabla
                        contenidoBody.innerHTML = `
                            <tr>
                                <td colspan="4" class="text-center">No hay contenidos disponibles para este curso.</td>
                            </tr>
                        `;
                    }
                })
                .catch(error => console.error('Error al obtener los contenidos:', error));
        } else {
            // Si no se selecciona un curso, limpia la tabla
            document.getElementById('contenidoBody').innerHTML = '';
        }
    });
    
    document.getElementById('contenidoSelect').addEventListener('change', function() {
        const contenidoId = this.value;
        if (contenidoId) {
            fetch(`/new-project/public/create_worker/${contenidoId}/evaluaciones`) 
                .then(response => {
                    // console.log(response); 
                    return response.json();
                })
                
                .then(data => {
                    console.log('Datos recibidos:', data);
                    const evaluacionBody = document.getElementById('evaluacionBody');
                    evaluacionBody.innerHTML = ''; // Limpiar tabla anterior

                    if (data.length > 0) {
                        data.forEach(evaluacion => {
                            const row = `
                                <tr>
                                    <td>${evaluacion.id_evaluacion}</td>
                                    <td>${evaluacion.id_contenido}</td>
                                    <td>${evaluacion.limite_intentos}</td>
                                    <td>${evaluacion.fecha_limite}</td>
                                </tr>
                            `;
                            evaluacionBody.innerHTML += row;
                        });
                    } else {
                        evaluacionBody.innerHTML = `
                            <tr>
                                <td colspan="4" class="text-center">No hay contenidos disponibles para este curso.</td>
                            </tr>
                        `;
                    }
                })
                .catch(error => console.error('Error al obtener los contenidos:', error));
        } else {
            // Si no se selecciona un curso, limpia la tabla
            document.getElementById('evaluacionBody').innerHTML = '';
        }
    });

    document.getElementById('evaluacionSelect').addEventListener('change', function() {
        const evaluacionId = this.value;
        if (evaluacionId) {
            fetch(`/new-project/public/create_worker/${evaluacionId}/crear_preguntas`) 
                .then(response => {
                    // console.log(response); 
                    return response.json();
                })
                
                .then(data => {
                    console.log('Datos recibidos:', data);
                    const c_preguntaBody = document.getElementById('c_preguntaBody');
                    c_preguntaBody.innerHTML = ''; // Limpiar tabla anterior

                    if (data.length > 0) {
                        data.forEach(crear_pregunta => {
                            const row = `
                                <tr>
                                    <td>${crear_pregunta.id_c_pregunta}</td>
                                    <td>${crear_pregunta.id_evaluacion}</td>
                                    <td>${crear_pregunta.pregunta}</td>
                                </tr>
                            `;
                            c_preguntaBody.innerHTML += row;
                        });
                    } else {
                        c_preguntaBody.innerHTML = `
                            <tr>
                                <td colspan="4" class="text-center">No hay contenidos disponibles para este curso.</td>
                            </tr>
                        `;
                    }
                })
                .catch(error => console.error('Error al obtener los contenidos:', error));
        } else {
            // Si no se selecciona un curso, limpia la tabla
            document.getElementById('c_preguntaBody').innerHTML = '';
        }
    });
    
    document.getElementById('preguntaSelect').addEventListener('change', function() {
        const preguntaId = this.value;
        if (preguntaId) {
            fetch(`/new-project/public/create_worker/${preguntaId}/crear_respuestas`) 
                .then(response => {
                    // console.log(response); 
                    return response.json();
                })
                
                .then(data => {
                    console.log('Datos recibidos:', data);
                    const c_respuestaBody = document.getElementById('c_respuestaBody');
                    c_respuestaBody.innerHTML = ''; // Limpiar tabla anterior

                    if (data.length > 0) {
                        data.forEach(crear_respuesta => {
                            const row = `
                                <tr>
                                    <td>${crear_respuesta.id_c_respuesta}</td>
                                    <td>${crear_respuesta.id_c_pregunta}</td>
                                    <td>${crear_respuesta.c_respuesta}</td>
                                    <td>${crear_respuesta.validacion}</td>
                                </tr>
                            `;
                            c_respuestaBody.innerHTML += row;
                        });
                    } else {
                        c_respuestaBody.innerHTML = `
                            <tr>
                                <td colspan="4" class="text-center">No hay contenidos disponibles para este curso.</td>
                            </tr>
                        `;
                    }
                })
                .catch(error => console.error('Error al obtener los contenidos:', error));
        } else {
            // Si no se selecciona un curso, limpia la tabla
            document.getElementById('c_respuestaBody').innerHTML = '';
        }
    });
    
    document.getElementById('trabajadorSelect').addEventListener('change', function() {
        const trabajadorId = this.value;
        if (trabajadorId) {
            fetch(`/new-project/public/create_worker/${trabajadorId}/trabajadores`) 
                .then(response => {
                    // console.log(response); 
                    return response.json();
                })
                
                .then(data => {
                    console.log('Datos recibidos:', data);
                    const respuestaBody = document.getElementById('respuestaBody');
                    respuestaBody.innerHTML = ''; // Limpiar tabla anterior

                    if (data.length > 0) {
                        data.forEach(respuesta => {
                            const row = `
                                <tr>
                                    <td>${respuesta.id_respuesta}</td>
                                    <td>${respuesta.id_trabajador}</td>
                                    <td>${respuesta.id_evaluacion}</td>
                                    <td>${respuesta.pregunta ? respuesta.pregunta.pregunta : 'Sin pregunta'}</td>
                                    <td>${respuesta.respuesta ? respuesta.respuesta.c_respuesta : 'Sin respuesta'}</td>
                                    <td>${respuesta.es_correcta ? 'Correcta' : 'Incorrecta' }</td>
                                </tr>
                            `;
                            respuestaBody.innerHTML += row;
                        });
                    } else {
                        respuestaBody.innerHTML = `
                            <tr>
                                <td colspan="4" class="text-center">No hay contenidos disponibles para este curso.</td>
                            </tr>
                        `;
                    }
                })
                .catch(error => console.error('Error al obtener los contenidos:', error));
        } else {
            // Si no se selecciona un curso, limpia la tabla
            document.getElementById('respuestaBody').innerHTML = '';
        }
    });
</script>


</html>

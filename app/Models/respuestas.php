<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class respuestas extends Model
{
    protected $table = 'respuestas';
    protected $primaryKey = 'id_respuesta';

    protected $fillable =['id_evaluacion','id_trabajador','id_c_pregunta','id_c_respuesta','es_correcta', 'intento'];

    public function pregunta()
    {
        return $this->belongsTo(crear_preguntas::class, 'id_c_pregunta', 'id_c_pregunta');
    }
    public function respuesta()
    {
        return $this->belongsTo(crear_respuestas::class, 'id_c_respuesta', 'id_c_respuesta');
    }
    public function trabajador()
    {
        return $this->belongsTo(trabajadores::class, 'id_trabajador', 'id_trabajador');
    }
    public function evaluacion()
    {
        return $this->belongsTo(evaluaciones::class, 'id_evaluacion', 'id_evaluacion');
    }
}

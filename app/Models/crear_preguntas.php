<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class crear_preguntas extends Model
{
    protected $table = 'crear_preguntas';
    protected $primaryKey = 'id_c_pregunta';

    protected $fillable =['id_evaluacion', 'pregunta'];
}

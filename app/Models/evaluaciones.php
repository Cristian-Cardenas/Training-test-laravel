<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class evaluaciones extends Model
{
    protected $table = 'evaluaciones';
    protected $primaryKey = 'id_evaluacion';

    protected $fillable =['id_contenido' ,'limite_intentos', 'fecha_limite'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class crear_respuestas extends Model
{
    protected $table = 'crear_respuestas';
    protected $primaryKey = 'id_c_respuesta';

    protected $fillable =['id_c_pregunta','c_respuesta', 'validacion'];
}

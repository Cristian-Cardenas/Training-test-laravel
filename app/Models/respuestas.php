<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class respuestas extends Model
{
    protected $table = 'respuestas';
    protected $primaryKey = 'id_respuesta';

    protected $fillable =['es_correcta'];
}

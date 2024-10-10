<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cursos extends Model
{
    protected $table = 'cursos';
    protected $primaryKey = 'id_curso';

    protected $fillable =['titulo_curso', 'descripcion_curso', 'area'];
}

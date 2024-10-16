<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contenidos extends Model
{
    protected $table = 'contenidos';
    protected $primaryKey = 'id_contenido';

    protected $fillable =['id_curso','titulo_contenido', 'material', 'archivo'];
    public function curso()
    {
        return $this->belongsTo(cursos::class, 'id_curso');
    }
}

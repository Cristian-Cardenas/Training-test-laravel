<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trabajadores extends Model
{
    protected $table = 'trabajadores';
    protected $primaryKey = 'id_trabajador';

    protected $fillable =['nombre_trabajador', 'area'];
}

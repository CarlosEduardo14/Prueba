<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;

    //Se declaran los campos de la base de datos que tendran llenado masivo
    protected $fillable = ['titulo', 'descripcion', 'fecha_vencimiento', 'estado'];
}

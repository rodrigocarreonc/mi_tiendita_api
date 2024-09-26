<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedores extends Model
{
    use HasFactory;

    public function categoria()
    {
        return $this->belongsTo(Categorias::class, 'Cat_ID');
    }

    // Relación con la tabla carreras
    public function carrera()
    {
        return $this->belongsTo(Carreras::class, 'Carrera_ID');
    }
}

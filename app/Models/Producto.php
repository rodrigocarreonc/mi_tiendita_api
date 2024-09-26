<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    public function movimientos()
    {
        return $this->hasMany(Movimiento::class, 'Producto_ID', 'Producto_ID');
    }
}

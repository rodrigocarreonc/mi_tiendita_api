<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    use HasFactory;
    public function venta()
    {
        return $this->belongsTo(Ventas::class, 'Venta_ID', 'Venta_ID');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\Movimiento;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ClientesController extends Controller
{
    public function profile($id){
        $data = Clientes::where('cliente_ID', $id)->select('Nombre','AP_Paterno', 'Correo')->get();
        return response()->json($data);
    }

    public function purchase_history($id){
        $history = Producto::join('movimientos', 'productos.Producto_ID', '=', 'movimientos.Producto_ID')
        ->join('ventas', 'ventas.Venta_ID', '=', 'movimientos.Venta_ID')
        ->join('clientes', 'clientes.cliente_ID', '=', 'ventas.cliente_ID')
        ->select('productos.NombreProd', 'movimientos.Cantidad', 'movimientos.Precio', DB::raw('(movimientos.Cantidad * movimientos.Precio) as Total'), 'movimientos.Venta_ID')
        ->where('clientes.cliente_ID', $id)
        ->orderBy('movimientos.Fecha', 'Desc')
        ->get();
        return response()->json($history);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Vendedores;
use App\Models\Ventas;
use Illuminate\Http\Request;

use function Laravel\Prompts\select;

class VendedoresController extends Controller
{
    public function index(){
        $vendedores = Vendedores::where('Verificacion', 'completado')
        ->join('categorias', 'vendedores.Cat_ID', '=', 'categorias.Cat_ID')
        ->join('carreras','vendedores.Carrera_ID', '=', 'carreras.Carrera_ID')
        ->select('vendedores.NombreNegocio', 'vendedores.Horario', 'categorias.Nombre_Cat as Categoria', 'carreras.nombre as Carrera')
        ->get();

        return response()->json($vendedores);
    }

    public function top_vendedores(){
        $top = Vendedores::join('ventas', 'ventas.Vendedor_ID', '=', 'vendedores.Vendedor_ID')
        ->select('vendedores.NombreNegocio',Ventas::raw('COUNT(ventas.Venta_ID) AS total_ventas'))
        ->groupBy('vendedores.NombreNegocio')
        ->orderBy('total_ventas', 'DESC')
        ->limit(5)  // Limitar a los primeros 5
        ->get();
        return response()->json($top);
    }

    public function profile($id){
        $data = Vendedores::where('Verificacion', 'completado')->where('Vendedor_ID', $id)
        ->join('categorias', 'vendedores.Cat_ID', '=', 'categorias.Cat_ID')
        ->join('carreras','vendedores.Carrera_ID', '=', 'carreras.Carrera_ID')
        ->select('vendedores.NombreNegocio', 'vendedores.Horario', 'categorias.Nombre_Cat as Categoria', 'carreras.nombre as Carrera')
        ->get();
        return response()->json($data);
    }

    public function products($id){
        $products = Producto::where('Vendedor_ID', $id)->select('NombreProd', 'Existencia', 'Precio_Uni')->get();
        return response()->json($products);
    }
}

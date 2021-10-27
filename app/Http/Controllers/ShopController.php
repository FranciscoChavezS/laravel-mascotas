<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
       // $this->middleware('verified'); //poder acceder a la ruta si el email está verificado 
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        //Método para hacer busqueda de productos 
        $search=trim($request->get('search')); //eliminar espacios en blanco del buscador
        $products=DB::table('products') //utilizamos facade DB
            ->select('id','name','description','photo','price','created_at', 'updated_at') //hacemos un select de los datos que queremos que se muestren
            ->where('name','LIKE','%'.$search.'%') //Con Like hacemos que busque todas las coicidentes con la busqueda
            ->orWhere('price','LIKE','%'.$search.'%') // buscar también por precio
            ->orderBy('name','asc') //Ordenar de forma ascendente el title (nombre del producto)
            ->paginate(6); //paginación 
        return view('shop', compact('products','search'));
        
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        //Método para hacer busqueda de posts 
        $search=trim($request->get('search')); //eliminar espacios en blanco del buscador
        $posts=DB::table('posts') //utilizamos facade DB
            ->select('id','title','foto','fecha','telefono','raza','comentario','created_at') //hacemos un select de los datos que queremos que se muestren
            ->where('title','LIKE','%'.$search.'%') //Con Like hacemos que busque todas las coicidentes con la busqueda
            ->orWhere('raza','LIKE','%'.$search.'%') // buscar también por raza
            ->orderBy('title','asc') //Ordenar de forma ascendente el title (nombre de mascota)
            ->paginate(6); //paginación 
        return view('home', compact('posts','search'));
        
    }
}

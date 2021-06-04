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
        $posts=DB::table('posts') //utilizamos facade
            ->select('id','title','foto','fecha','telefono','raza','comentario','created_at') //hacemos un select de los datos que queremos que se muestren
            ->where('title','LIKE','%'.$search.'%') //donde el la palabra coincida con la busqueda aparece
            ->orWhere('raza','LIKE','%'.$search.'%') // buscar también por raza
            ->orderBy('title','asc') //Ordenar de forma ascendente
            ->paginate(6);
        return view('home', compact('posts','search'));
        
    }
}

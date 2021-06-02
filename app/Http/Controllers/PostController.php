<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostEditRequest;
use Illuminate\Http\Request;
use App\Models\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {
        $post = new Post();
        
        $post->user_id = auth()->user()->id;

        $post->title = $request->title;
        $post->fecha = $request->fecha;
        $post->telefono = $request->telefono;
        $post->raza = $request->raza;
        $post->comentario = $request->comentario;

        //Guardar ruta de imagen en BD 
        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $destinationPath = 'images/featureds/';
            $filename = time().'-'.$file->getClientOriginalName(); 
            $uploadSuccess = $request->file('foto')->move($destinationPath, $filename);
            $post->foto = $destinationPath . $filename;
         }
        
         $post->save();
        //Post::create($request->all());

        return redirect()->route('posts.index')->with('mensajePost','Registro creado correctamente');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //Agregar policies
        $this->authorize('author', $post);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostEditRequest $request, Post $post)
    {
        //$post->update($request->all());
        //$post = Post::find($id);
        $this->authorize('author', $post);
        
        $post->title = $request->title;
        $post->fecha = $request->fecha;
        $post->telefono = $request->telefono;
        $post->raza = $request->raza;
        $post->comentario = $request->comentario;
        
        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $destinationPath = 'images/featureds/'; //ubicamos la carpeta a guardar las imagenes
            $filename = time().'-'.$file->getClientOriginalName(); 
            $uploadSuccess = $request->file('foto')->move($destinationPath, $filename); 
            $post->foto = $destinationPath . $filename; //concatenamos el destino con el nombre del archivo
         }

        $post->save();

        return redirect()->route('posts.index')->with('mensajePost','Registro actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('mensajePost','Registro eliminado correctamente');
    }
}

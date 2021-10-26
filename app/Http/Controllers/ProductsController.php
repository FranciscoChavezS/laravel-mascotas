<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Método para agregar registros
        $product = new Product();
        
        //$product->user_id = auth()->user()->id;

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;

        //Guardar ruta de imagen en BD 
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $destinationPath = 'images/featureds/'; //asignamos la carpeta 
            $filename = time().'-'.$file->getClientOriginalName(); //recuperar el nombre original del archivo
            $uploadSuccess = $request->file('photo')->move($destinationPath, $filename); //la imagen cargada la movemos a la carpeta y guardamos la url en la DB
            $product->photo = $destinationPath . $filename;
         }
        
         $product->save();
        //Post::create($request->all());

        return redirect()->route('products.index')->with('mensajeProduct','Registro creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //Agregar Policy
        //$this->authorize('author', $post);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //$post->update($request->all());
        //$post = Post::find($id);

        //Agregar Policy
        //$this->authorize('author', $post);
        
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;

        //Actualizar foto
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $destinationPath = 'images/featureds/'; //ubicamos la carpeta a guardar las imagenes
            $filename = time().'-'.$file->getClientOriginalName(); 
            $uploadSuccess = $request->file('photo')->move($destinationPath, $filename); 
            $product->photo = $destinationPath . $filename; //concatenamos el destino con el nombre del archivo
         }

        $product->save();

        return redirect()->route('products.index')->with('mensajeProduct','Registro actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        /*Agregar policies para que solo se puedan eliminar los post que de tu propiedad 
        o con el permiso necesario*/
        //$this->authorize('author', $post);
        
        $product->delete();

        return redirect()->route('products.index')->with('mensajeProduct','Registro eliminado correctamente');
    }
}


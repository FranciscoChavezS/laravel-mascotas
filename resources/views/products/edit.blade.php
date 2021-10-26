@extends('layouts.main', ['activePage' => 'products', 'titlePage' => 'Editar Post'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="POST" action="{{ route('products.update', $product->id) }}" class="form-horizontal" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          
          <div class="card">
            <!--Header-->
            <div class="card-header card-header-primary">
              <h4 class="card-title">Editar PRoducto</h4>
              <p class="card-category">Editar datos del Producto</p>
            </div>
            <!--End header-->
            <!--Body-->
            <div class="card-body">
              <div class="row">
                <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="name" placeholder="Ingrese el nombre"
                    value="{{ old('name', $product->name) ?? ''}}" autocomplete="off" autofocus>
                    <!--Validaciones-->
                    @if($errors->has('name'))
                      <span class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                    @endif
                </div>
              </div>
              <div class="row">
                <label for="photo" class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-7">
                  <input type="file" class="form-control" name="photo" 
                    value="{{ old('photo', $product->photo) ?? ''}}" autofocus>
                    <!--Validaciones-->
                    @if($errors->has('photo'))
                      <span class="error text-danger" for="input-name">{{ $errors->first('photo') }}</span>
                    @endif
                    <img src="{{ asset($product->photo)}}" class="img-fluid img-thumbnail" width="200">
                </div>
              </div>
              <div class="row">
                <label for="description" class="col-sm-2 col-form-label">Descripción</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="description" 
                    value="{{ old('description', $product->description) ?? ''}}" autocomplete="off" autofocus>
                    <!--Validaciones-->
                    @if($errors->has('description'))
                      <span class="error text-danger" for="input-name">{{ $errors->first('description') }}</span>
                    @endif
                </div>
              </div>
              <div class="row">
                <label for="price" class="col-sm-2 col-form-label">Precio</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="price" placeholder="Ingrese el Precio"
                    value="{{ old('price', $product->price) ?? ''}}" autocomplete="off" autofocus>
                    <!--Validaciones-->
                    @if($errors->has('price'))
                      <span class="error text-danger" for="input-name">{{ $errors->first('price') }}</span>
                    @endif
                </div>
              </div>
            </div>
            <!--End body-->
            <!--Footer-->
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          <!--End footer-->
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
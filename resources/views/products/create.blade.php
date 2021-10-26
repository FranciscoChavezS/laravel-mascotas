@extends('layouts.main', ['activePage' => 'products', 'titlePage' => 'Nuevo Post'])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="POST" action="{{ route('products.store') }}" class="form-horizontal" enctype="multipart/form-data">
          @csrf
          <div class="card ">
            <!--Header-->
            <div class="card-header card-header-primary">
              <h4 class="card-title">Productos</h4>
              <p class="card-category">Resgistra un producto</p>
            </div>
            <!--End header-->
            <!--Body-->
            <div class="card-body">
              <div class="row">
                <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="name" placeholder="Ingrese el nombre del producto"
                    autocomplete="off" autofocus>
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
                    autocomplete="off" accept="image/*"> <!--Validamos que solo acepte archivos tipo imagen png,jpg,jpeg,etc-->
                    <!--Validaciones-->
                    @if($errors->has('photo'))
                      <span class="error text-danger" for="input-name">{{ $errors->first('photo') }}</span>
                    @endif
                </div>
              </div>
              <div class="row">
                <label for="description" class="col-sm-2 col-form-label">Descripción</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="description" placeholder="Ingrese descripción"
                    autocomplete="off" autofocus>
                    <!--Validaciones-->
                    @if($errors->has('description'))
                      <span class="error text-danger" for="input-name">{{ $errors->first('description') }}</span>
                    @endif
                </div>
              </div>
              <div class="row">
                <label for="price" class="col-sm-2 col-form-label">Precio $</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="price" placeholder="Ingrese el precio"
                    autocomplete="off" autofocus>
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
            <!--End footer-->
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@extends('layouts.main', ['activePage' => 'posts', 'titlePage' => 'Nuevo Post'])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="POST" action="{{ route('posts.store') }}" class="form-horizontal" enctype="multipart/form-data">
          @csrf
          <div class="card ">
            <!--Header-->
            <div class="card-header card-header-primary">
              <h4 class="card-title">Post</h4>
              <p class="card-category">Resgistra a tu mascota extraviada</p>
            </div>
            <!--End header-->
            <!--Body-->
            <div class="card-body">
              <div class="row">
                <label for="title" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="title" placeholder="Ingrese el nombre de la mascota"
                    autocomplete="off" autofocus>
                    <!--Validaciones-->
                    @if($errors->has('title'))
                      <span class="error text-danger" for="input-name">{{ $errors->first('title') }}</span>
                    @endif
                </div>
              </div>
              <div class="row">
                <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-7">
                  <input type="file" class="form-control" name="foto"
                    autocomplete="off" accept="image/*"> <!--Validamos que solo acepte archivos tipo imagen png,jpg,jpeg,etc-->
                    <!--Validaciones-->
                    @if($errors->has('foto'))
                      <span class="error text-danger" for="input-name">{{ $errors->first('foto') }}</span>
                    @endif
                </div>
              </div>
              <div class="row">
                <label for="fecha" class="col-sm-2 col-form-label">Situación</label>
                <div class="col-sm-7">
                  <input type="date" name="fecha" id="fecha" class="form-control">
                  <!--Validaciones-->
                  @if($errors->has('fecha'))
                    <span class="error text-danger" for="input-name">{{ $errors->first('fecha') }}</span>
                  @endif
                </div>
              </div>
              <div class="row">
                <label for="telefono" class="col-sm-2 col-form-label">Teléfono</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="telefono" placeholder="Ingrese el teléfono"
                    autocomplete="off" autofocus>
                    <!--Validaciones-->
                    @if($errors->has('telefono'))
                      <span class="error text-danger" for="input-name">{{ $errors->first('telefono') }}</span>
                    @endif
                </div>
              </div>
              <div class="row">
                <label for="raza" class="col-sm-2 col-form-label">Raza</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="raza" placeholder="Ingrese la raza"
                    autocomplete="off" autofocus>
                    <!--Validaciones-->
                    @if($errors->has('raza'))
                      <span class="error text-danger" for="input-name">{{ $errors->first('raza') }}</span>
                    @endif
                </div>
              </div>
              <div class="row">
                <label for="comentario" class="col-sm-2 col-form-label">comentario</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="comentario" placeholder="Ingrese comentario"
                    autocomplete="off" autofocus>
                    <!--Validaciones-->
                    @if($errors->has('comentario'))
                      <span class="error text-danger" for="input-name">{{ $errors->first('comentario') }}</span>
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
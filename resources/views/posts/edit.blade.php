@extends('layouts.main', ['activePage' => 'posts', 'titlePage' => 'Editar Post'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="POST" action="{{ route('posts.update', $post->id) }}" class="form-horizontal" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          
          <div class="card">
            <!--Header-->
            <div class="card-header card-header-primary">
              <h4 class="card-title">Editar post</h4>
              <p class="card-category">Editar datos del post</p>
            </div>
            <!--End header-->
            <!--Body-->
            <div class="card-body">
              <div class="row">
                <label for="title" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="title" placeholder="Ingrese el nombre"
                    value="{{ old('title', $post->title) ?? ''}}" autocomplete="off" autofocus>
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
                    value="{{ old('foto', $post->foto) ?? ''}}" autofocus>
                    <!--Validaciones-->
                    @if($errors->has('foto'))
                      <span class="error text-danger" for="input-name">{{ $errors->first('foto') }}</span>
                    @endif
                </div>
              </div>
              <div class="row">
                <label for="fecha" class="col-sm-2 col-form-label">Fecha</label>
                <div class="col-sm-7">
                  <input type="date" class="form-control" name="fecha" 
                    value="{{ old('fecha', $post->fecha) ?? ''}}" autocomplete="off" autofocus>
                    <!--Validaciones-->
                    @if($errors->has('fecha'))
                      <span class="error text-danger" for="input-name">{{ $errors->first('fecha') }}</span>
                    @endif
                </div>
              </div>
              <div class="row">
                <label for="telefono" class="col-sm-2 col-form-label">Teléfono</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="telefono" placeholder="Ingrese el telefono"
                    value="{{ old('telefono', $post->telefono) ?? ''}}" autocomplete="off" autofocus>
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
                    value="{{ old('raza', $post->raza) ?? ''}}" autocomplete="off" autofocus >
                    <!--Validaciones-->
                    @if($errors->has('raza'))
                      <span class="error text-danger" for="input-name">{{ $errors->first('raza') }}</span>
                    @endif
                </div>
              </div>
              <div class="row">
                <label for="comentario" class="col-sm-2 col-form-label">Comentario</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="comentario" placeholder="Ingrese el comentario"
                    value="{{ old('comentario', $post->comentario) ?? ''}}" autocomplete="off" autofocus>
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
          </div>
          <!--End footer-->
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
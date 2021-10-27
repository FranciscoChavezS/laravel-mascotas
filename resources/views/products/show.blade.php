@extends('layouts.main', ['activePage' => 'products', 'titlePage' => 'Detalles del post'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
      <!-- Mostrar mensaje en post-->
          @if (session('mensajeProduct'))
                    <div class="alert alert-success" role="success">
                      {{ session('mensajeProduct') }}
                    </div>
            @endif
        <div class="card">
          <!--Cabecera o Header-->
          <div class="card-header card-header-primary">
            <h4 class="card-title">Productos</h4>
            <p class="card-category">Vista detallada de {{ $product->name }}</p>
          </div>
          <!--Fin de Header-->
          <!--Body-->

            <div class="card-body">
              <div class="row">
                <!-- Primero -->
                <div class="col-md-4">
                  <div class="card card-user">
                    <div class="card-body">
                      <p class="card-text">
                        <div class="author">
                          <div class="block block-one"></div>
                          <div class="block block-two"></div>
                          <div class="block block-three"></div>
                          <div class="block block-four"></div>
                          <a href="#">
                            <img src="{{ asset($product->photo)}}" alt="" width="150" class="img-fluid img-thumbnail">
                            <h5 class="title mt-3">{{ $product->name }}</h5>
                          </a>
                          <p class="description">
                            Precio $ {{ $product->price }} <br>
                            Creación del producto: {{ $product->created_at }}
                          </p>
                        </div>
                      </p>
                      <div class="card-description">
                        {{ $product->description }} <br>
                      </div>
                    </div>
                    <div class="card-footer">
                      <div class="button-container">
                        <a href="{{ route('products.index') }}" class="btn btn-sm btn-success mr-3"> Volver </a>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary">Editar</a>
                      </div>
                    </div>
                  </div>
                </div>
                <!--Fin de primero-->
              </div>
              <!--fin de fila-->
            </div>
            <!--fin de body-->

        </div>
        <!--fin de card-->
      </div>
    </div>
  </div>
</div>
@endsection
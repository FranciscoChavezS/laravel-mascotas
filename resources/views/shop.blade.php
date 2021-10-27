@extends('layouts.main', ['activePage' => 'shop', 'titlePage' => __('Conoce nuestros productos')])

@section('content')
    <div class="content">
      <div class="col-md-12">
      <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shop</li>
            </ol>
        </nav>
      <div class="container-fluid">
        <div class="row">
    @foreach($products as $product)
          <div class="col-md-4 col-12 justify-content-center mb-5">
            <div class="card m-auto" style="width: 18rem;">
                <img src="{{ asset($product->photo)}}" class="card-img-top" alt="">
                <div class="card-body">
                  <h3 class="card-title my-2">{{ $product->name }}</h3>
                  <h5 class="card-title my-2">Precio: $ {{ $product->price }}</h5>
                  <div class="d-card-text">
                    {{ $product->description }}
                  </div>
                  <a href="{{ route('products.show', $product->id) }}" class="post-link"><b>Ver: {{ $product->name }}</b></a>
                  <hr>
                  <div class="row">
                    <div class="col-6 text-left">
                      <span class="card-txt-author">Creado</span>
                    </div>
                    <div class="col-6 text-right">
                      <span class="card-txt-date">{{ $product->created_at }}</span>
                    </div>
                  </div>
                </div>
            </div>
          </div>
      @endforeach
        </div>
    </div>
  </div>
</div>
@endsection

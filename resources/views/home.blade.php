@extends('layouts.main', ['activePage' => 'dashboard', 'titlePage' => __('¡Ayudame a localizarlo!')])

@section('content')
    <div class="content">
      <div class="col-md-12">
      <div class="container-fluid">
        <div class="row">
    @foreach($posts as $post)
        @if(!$post->deleted_at)
          <div class="col-md-4 col-12 justify-content-center mb-5">
            <div class="card m-auto" style="width: 18rem;">
                <img src="{{ asset($post->foto)}}" class="card-img-top" alt="">
                <div class="card-body">
                  <small class="card-txt-category">Ultima vez visto: {{ $post->fecha }}</small>
                  <h3 class="card-title my-2">{{ $post->title }}</h3>
                  <h5 class="card-title my-2">Raza: {{ $post->raza }}</h5>
                  <div class="d-card-text">
                    {{ $post->comentario }}
                  </div>
                  <a href="{{ route('posts.show', $post->id) }}" class="post-link"><b>Tel: {{ $post->telefono }}</b></a>
                  <hr>
                  <div class="row">
                    <div class="col-6 text-left">
                      <span class="card-txt-author">Creado</span>
                    </div>
                    <div class="col-6 text-right">
                      <span class="card-txt-date">{{ $post->created_at }}</span>
                    </div>
                  </div>
                </div>
            </div>
          </div>
          @endif
      @endforeach
        </div>
        {{ $posts->links() }}
    </div>
  </div>
</div>
@endsection

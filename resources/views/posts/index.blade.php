@extends('layouts.main', ['activePage' => 'posts', 'titlePage' => 'Posts'])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
      <!-- Mostrar mensaje en post-->
      @if (session('mensajePost'))
                    <div class="alert alert-success" role="success">
                      {{ session('mensajePost') }}
                    </div>
            @endif
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Mascotas</h4>
            <p class="card-category">Lista de mascotas registrados </p>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-12 text-right">
                <a href="{{ route('posts.create') }}" class="btn btn-sm btn-facebook">Añadir post</a>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table ">
                <thead class="text-primary">
                  <th> ID </th>
                  <th> Nombre </th>
                  <th> Foto </th>
                  <th> Ultimo visto </th>
                  <th> Teléfono </th>
                  <th> Raza </th>
                  <th> Comentario </th>
                  <th> Fecha de creación </th>
                  <th> Usuario </th>
                  <th class="text-right"> Acciones </th>
                </thead>
                <tbody>
                  @forelse ($posts as $post)
                  <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>
                      <img src="{{ asset($post->foto)}}" class="img-fluid img-thumbnail" width="120">
                    </td>
                    <td>{{ $post->fecha }}</td>
                    <td>{{ $post->telefono }}</td>
                    <td>{{ $post->raza }}</td>
                    <td>{{ $post->comentario }}</td>
                    <td class="text-primary">{{ $post->created_at->toFormattedDateString() }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td class="td-actions text-right">
                      <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info"> <i
                          class="material-icons">person</i> </a>
                      <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-success"> <i
                          class="material-icons">edit</i> </a>
                      <form action="{{ route('posts.destroy', $post->id) }}" method="post"
                        onsubmit="return confirm('¿Estas seguro de eliminar el registro?')" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" rel="tooltip" class="btn btn-danger">
                          <i class="material-icons">close</i>
                        </button>
                      </form>
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="2">Sin registros.</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
              {{-- {{ $users->links() }} --}}
            </div>
          </div>
          <!--Footer-->
          <div class="card-footer mr-auto">
            {{ $posts->links() }}
          </div>
          <!--End footer-->
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
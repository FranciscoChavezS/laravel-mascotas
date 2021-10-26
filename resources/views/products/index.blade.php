@extends('layouts.main', ['activePage' => 'products', 'titlePage' => __('Productos')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
      <!-- Mostrar mensaje de producto-->
      @if (session('mensajeProduct'))
                    <div class="alert alert-success" role="success">
                      {{ session('mensajeProduct') }}
                    </div>
            @endif
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Productos</h4>
            <p class="card-category">Lista de productos registrados </p>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-10 text-right">
                <a href="{{ route('products.create') }}" class="btn btn-sm btn-facebook">Añadir Producto</a>
              </div>
              <div class="row">
              <div class="col-12 text-right">
                <a href="{{ route('descargarPDF') }}" class="btn btn-sm btn-warning">Descargar PDF</a>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table ">
                <thead class="text-primary">
                  <th> ID </th>
                  <th> Nombre </th>
                  <th> Foto </th>
                  <th> Descripción </th>
                  <th> Precio </th>
                  <th> Fecha de creación </th>
                  <th class="text-right"> Acciones </th>
                </thead>
                <tbody>
                  @forelse ($products as $product)
                  <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>
                      <img src="{{ asset($product->photo)}}" class="img-fluid img-thumbnail" width="120">
                    </td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td class="text-primary">{{ $product->created_at->toFormattedDateString() }}</td>
                    <td class="td-actions text-right">
                      <a href="{{ route('products.edit', $product->id) }}" class="btn btn-success"> <i
                          class="material-icons">edit</i> </a>
                      <form action="{{ route('products.destroy', $product->id) }}" method="post"
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
                    <td colspan="2">Sin productos.</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
              {{-- {{ $users->links() }} --}}
            </div>
          </div>
          <!--Footer-->
          <div class="card-footer mr-auto">
            {{ $products->links() }}
          </div>
          <!--End footer-->
        </div>
      </div>
    </div>
    </div>
  </div>
</div>
@endsection
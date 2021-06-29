@extends('layouts.main', ['activePage' => 'archivos', 'titlePage' => 'Archivos:Carga/Descarga'])

@section('content')
<style >
     body {
        background-image: url('../img/Mascotas.jpg');
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;
       }
  </style>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
      <!-- Mostrar mensaje en post-->
      @if (session('mensajeArchivo'))
                    <div class="alert alert-success" role="success">
                      {{ session('mensajeArchivo') }}
                    </div>
            @endif
         <!--FORMULARIO SUBIR ARCHIVOS--> 
         <form method="POST" action="{{ route('archivo.store') }}" class="form-horizontal" enctype="multipart/form-data">
          @csrf
          <div class="card ">
            <!--Header-->
            <div class="card-header card-header-primary">
              <h4 class="card-title">Archivos</h4>
              <p class="card-category">Archivos: Carga/Descarga</p>
            </div>
            <!--End header-->
            <!--Body-->
            <div class="card-body">
              <div class="row">
                <label for="archivo" class="col-sm-2 col-form-label">Subir archivo</label>
                <div class="col-sm-7">
                  <input type="file" class="form-control" name="archivo"
                    autocomplete="off" required> <!--Validamos que solo acepte archivos tipo imagen png,jpg,jpeg,etc-->
                </div>
              
            </div>
            <!--End body-->

            <!--Button-->
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-facebook">Guardar</button>
            </div>
            <!--End button-->
          </div>
        </form>
        <!--FIN DE FORMULARIO CARGAR ARCHIVOS--->  
            </div>
        </div>
    </div>
</div>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
            <div class="table-responsive">
              <table class="table ">
                <thead class="text-dark">
                  <th> ID </th>
                  <th> Nombre </th>
                  <th> Mime </th>
                  <th> Fecha de Carga </th>
                  <th class="text-right"> Acciones </th>
                </thead>
                <tbody>
                  @forelse ($archivos as $archivo)
                  <tr>
                    <td>{{ $archivo->id }}</td>
                    <td>{{ $archivo->nombre_original }}</td>
                    <td>{{ $archivo->mime }}</td>
                    <td class="text-primary">{{ $archivo->created_at->toFormattedDateString() }}</td>
                    
                    <td class="td-actions text-right">
                      <a href="{{ route('archivo.descargar', $archivo) }}" class="btn btn-info"> <i
                          class="material-icons">file_download</i> </a>
                    <form action="{{ route('archivo.destroy', $archivo->id) }}" method="post"
                        onsubmit="return confirm('¿Seguro que deseas eliminar el archivo?')" style="display: inline-block;">
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
                    <td colspan="2">Sin archivos.</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            
            </div>
          </div>
          <!--Footer-->
          <div class="card-footer mr-auto">
            {{ $archivos->links() }}
          </div>
          <!--End footer-->
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
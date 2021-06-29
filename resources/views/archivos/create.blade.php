@extends('layouts.main', ['activePage' => 'posts', 'titlePage' => 'Carga de archivos'])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="POST" action="{{ route('archivos.store') }}" class="form-horizontal" enctype="multipart/form-data">
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
                <label for="foto" class="col-sm-2 col-form-label">Subir archivo</label>
                <div class="col-sm-7">
                  <input type="file" class="form-control" name="archivo"
                    autocomplete="off"> <!--Validamos que solo acepte archivos tipo imagen png,jpg,jpeg,etc-->
                </div>
              
            </div>
            <!--End body-->

            <!--Button-->
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            <!--End button-->
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
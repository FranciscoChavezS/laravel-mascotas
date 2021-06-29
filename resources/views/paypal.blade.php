@extends('layouts.main', ['activePage' => 'donar', 'titlePage' => __('Perfil')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 ml-auto mr-auto">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Sistema de pago PayPal</h4>
            <p class="card-category">Haz un donativo para ayudar a las mascotas que necesitan un hogar.</p>
          </div>
          <div class="card-body">
            <div class="table-responsive table-upgrade">
              <table class="table">
                <thead>
                  <tr>
                    <th></th>
                    <th class="text-center">Contra</th>
                    <th class="text-center">Pros</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><h3 class="text-primary">DONAR</h3></td>
                    <td class="text-center"></td>
                    <td class="text-center"></td>
                  </tr>
                  <tr>
                    <td>Login, Register, Recuperar Contraseña</td>
                    <td class="text-center"><i class="fa fa-check text-success"></i></td>
                    <td class="text-center"><i class="fa fa-check text-success"></i></td>
                  </tr>
                  <tr>
                    <td>User profile</td>
                    <td class="text-center"><i class="fa fa-check text-success"></i></td>
                    <td class="text-center"><i class="fa fa-check text-success"></i></td>
                  </tr>
                  <tr>
                    <td>Ayudar a los animales sin hogar (Comida,Medicina,Adopción)</td>
                    <td class="text-center"><i class="fa fa-times text-danger"></i></td>
                    <td class="text-center"><i class="fa fa-check text-success"></i></td>
                  </tr>
                  <tr>
                    <td>Seguir creciendo la página </td>
                    <td class="text-center"><i class="fa fa-times text-danger"></i></td>
                    <td class="text-center"><i class="fa fa-check text-success"></i></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td class="text-center">Contras</td>
                    <td class="text-center">Donativo</td>
                  </tr>
                  <tr>
                    <td class="text-center"></td>
                    <td class="text-center">
                      <a href="#" class="btn btn-round btn-fill btn-default disabled">Versión gratuita</a>
                    </td>
                    <td class="text-center">
                    <form action="https://www.paypal.com/donate" method="post" target="_top">
                    <input type="hidden" name="hosted_button_id" value="8YW8T8FH5H4AW" />
                    <input type="image" src="https://www.paypalobjects.com/es_XC/MX/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
                    <img alt="" border="0" src="https://www.paypal.com/es_MX/i/scr/pixel.gif" width="1" height="1"/>
                    </form>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
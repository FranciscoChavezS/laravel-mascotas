<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="{{ route('home') }}" class="simple-text logo-normal">
      {{ __('PETS & CARE') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Home') }}</p>
        </a>
      </li>
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i><img style="width:35px" src="{{ asset('img/logo3.png') }}"></i>
          <p>{{ __('Registros Pet') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('perfil') }}">
                <span class="sidebar-mini"> PE </span>
                <span class="sidebar-normal">{{ __('Perfil') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'archivos' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('archivo.index') }}">
                <span class="sidebar-mini"> C/D </span>
                <span class="sidebar-normal"> {{ __('Carga de Archivos') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'posts' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('posts.index') }}">
                <i class="material-icons">library_books</i>
                <p>{{ __('Post') }}</p>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'products' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('products.index') }}">
                <i class="material-icons">store</i>
                <p>{{ __('Productos') }}</p>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <!--Asignar permisos -->
      @can('users.index')
      <li class="nav-item{{ $activePage == 'users' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('users.index') }}">
          <i class="material-icons">person_add</i>
            <p>Usuarios</p>
        </a>
      </li>
      @endcan
      
      <!--Asignar permisos -->
      @can('permissions.index')
      <li class="nav-item{{ $activePage == 'permissions' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('permissions.index') }}">
          <i class="material-icons">bubble_chart</i>
          <p>{{ __('Permissions') }}</p>
        </a>
      </li>
      @endcan
      <!--Asignar permisos -->
      @can('roles.index')
      <li class="nav-item{{ $activePage == 'roles' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('roles.index') }}">
          <i class="material-icons">people_alt</i>
            <p>{{ __('Roles') }}</p>
        </a>
        @endcan
      </li>
      <li class="nav-item{{ $activePage == 'donar' ? ' active' : '' }}">
        <a class="nav-link" href="{{ url('/paypal/pay') }}">
          <i class="material-icons">attach_money</i>
          <p>{{ __('Donar') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>

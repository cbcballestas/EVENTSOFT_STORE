<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand main-title" href="{{ URL::to('admin/dashboard') }}">EVENTSOFT Store</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <p class="navbar-text"><i class="fa fa-dashboard"></i>&nbsp;Dashboard
      </p>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{ route('admin.reports.index') }}">Reportes</a></li>
        <li><a href="{{ route('admin.category.index') }}">Categorías</a></li>
        <li><a href="{{ route('admin.product.index') }}">Productos</a></li>
        <li><a href="{{ route('admin.orders.index') }}">Pedidos</a></li>
        <li><a href="{{ route('admin.users.index') }}">Usuarios</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user">&nbsp;</i>{{ Auth::user()->user}}<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{ route('logout')}}">Finalizar sesión</a></li>
            <li><a href="{{ route('home')}}">Ir al catálogo</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
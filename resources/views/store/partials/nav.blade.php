<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand main-title" href="{{ route('home')}}">EVENTSOFT Store</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{ route('cart-show')}}" title="Ir al carrito de compras"><i class="fa fa-shopping-cart"></i></a></li>
        @if(Auth::check())
        @if(Auth::user()->type == 'admin')
            <li><a href="{{ URL::to('admin/dashboard') }}" title="Panel de administración"><i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;Dashboard</a></li>
        @endif
        @endif
        <li><a href="{{ URL::to('contacto/') }}">Contacto</a></li>
        @include('store.partials.menu-user')
      </ul>
    </div>
  </div>
</nav>
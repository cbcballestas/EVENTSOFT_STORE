@extends('store.template.template')
@section('content')
@include('store.partials.slider')
 <!-- BUSCADOR DE PRODUCTOS-->
    	{!! Form::open(['route' => 'home','method' => 'GET','class' => 'navbar-form pull-right']) !!}
    	    <div class="input-group" style="right: 10px;width: 400px">
    	   	  {!! Form::text('name',null,['class' => 'form-control','placeholder' => 'Buscar producto...','aria-describedby' => 'search','title' => 'Ingrese el nombre del producto a buscar']) !!}
    	   	  <span class="input-group-addon" style="height: -20px" id="search">
    	   	    <button type="submit" style="border: 0">
    	   	  	<i class="fa fa-search"  aria-hidden="true"></a></i>
    	   	  </span> 
    	    </div>
    	{!! Form::close() !!}
           <h2>Categorías:</h2>&nbsp;<h3 style="display: inline-block">
           @if(count($products))
           @foreach($categorias as $categoria)
             <a href="{{ route('categories',$categoria->slug) }}" style="color: {{ $categoria->color }}"><span class="label" style="background-color: {{ $categoria->color }}">{{ $categoria->name }}</a> 
           @endforeach
           @else
            <h2>
            <span class="label label-warning">
                No existen categorías registradas
            <i class="fa fa-frown-o" aria-hidden="true"></i>.
            </span>
            </h2>
           @endif
           </h3>
            <br><br><hr>
<div class="container text-center">
     @if(count($products)) 
    <div id="products">
    	@foreach($products as $product)
    		@if($product->visible == 1)
    	    <div class="product white-panel">
    	    	<h3>{{ $product->name}}</h3><hr>
				<img src ="{{ asset(''.$product->image) }}" width="200">
				<div class="product-info panel">
					<p>{{ $product->extract }}</p>
                    <br>
                    <hr>
                    <label style="font-size: 20px">Categoría:</label>
                    <h3><span class="label" style="background-color: {{ $product->category->color }}">{{ $product->category->name }}</h3><hr>
					<h3><span class="label label-success">Precio: ${{ number_format($product->price,2)}}</span></h3><hr>
					<p>
						<a class="btn btn-warning" href="{{ route('cart-add',$product->slug)}}"><i class="fa fa-cart-plus"></i>&nbsp;Agregar al carrito</a>
					</p>
                    <p>
                        <a class="btn btn-primary" href="{{ route('product-detail',$product->slug)}}"><i class="fa fa-chevron-circle-right"></i>&nbsp;Leer Más</a>
                    </p>
				</div>
    	    </div>
    	    @else
    	         <div class="product white-panel">
    	    	<h3>{{ $product->name}}</h3><hr>
				<img src ="{{ $product->image}}" width="200">
				<div class="product-info panel">
					<p>{{ $product->extract }}</p>               
					<h3><span class="label label-success">Precio: ${{ number_format($product->price,2)}}</span></h3>
					<p>
						<h3><span class ="label label-danger">
						 Producto Agotado    
						</span>
						</h3>
               </p>
				</div>
    	    </div>
    	@endif
        @endforeach
    </div>
    {!! $products->render()!!}
    @else
            <h1 style=" text-align: center">
            <span class="label label-warning">
            No existen productos
            <i class="fa fa-frown-o" aria-hidden="true"></i>.
            </span>
            </h1>
            <hr>
            
        @endif
</div>
@endsection
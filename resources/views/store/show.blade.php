@extends('store.template.template')
@section('content')
<div class="container text-center">
	<div class="page-header">
	<h1><i class="fa fa-shopping-cart"></i>Detalle del producto</h1>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="product-block">
				<img src="{{ asset(''.$product->image) }}" width="200px">
			</div>
		</div>
		<div class="col-md-6">
			<div class="product-block">
				<h3>{{ $product->name}}</h3><hr>
				<div class="product-info panel">
				<p>{{ $product->description}}</p>
				<h3><span class="label label-success">Precio: ${{ number_format($product->price,2)}}</span></h3>
				<p>
				<a class="btn btn-warning btn-block" href="{{ route('cart-add',$product->slug)}}"><i class="fa fa-cart-plus"></i>&nbsp;Agregar al carrito</a>
				</p>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<p>
	<a href="{{ route('home')}}" class="btn btn-primary" style="font-size: 20px">
		<i class="fa fa-chevron-circle-left"></i>&nbsp;Regresar
	</a>
	</p>
</div>
@endsection
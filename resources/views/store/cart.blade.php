@extends('store.template.template')
@section('title','EVENTSOFT-Carrito de compras')
@section('content')
 <div class="container text-center">
 	<div class="page-header">
	<h1><i class="fa fa-shopping-cart"></i>&nbsp;Carrito</h1>
	</div>
    
    <div class="table-cart">
    @if(count($cart))
    <p>
    	<a href="{{ route('cart-trash')}}" class="btn btn-danger">
    		Vaciar carrito <i class="fa fa-trash"></i>
    	</a>
    </p>
	<div class="table-responsive">
		<table class="table table-stripped table-hover table-bordered">
			<thead>
				<tr>
					<th>Imágen</th>
					<th>Producto</th>
					<th>Precio</th>
					<th>Cantidad</th>
					<th>Subtotal</th>
					<th>Quitar</th>
				</tr>
				</thead>
				<tbody>
					@foreach($cart as $item)
					<tr>
						<td><img src="{{ asset(''.$item->image) }}"></td>
						<td>{{ $item->name}}</td>
						<td>{{ number_format($item->price,2)}}</td>
						<td>
							<input 
										type="number"
										min="1"
										max="100"
										value="{{ $item->quantity }}"
										id="product_{{ $item->id }}"
									>
									<a 
										href="#" 
										class="btn btn-warning btn-update-item"
										data-href="{{ route('cart-update', [$item->slug,null]) }}"
										data-id = "{{ $item->id }}"
										title="Actualizar cantidad" 
									>
										<i class="fa fa-refresh"></i>
									</a>
						</td>
						<td>${{ number_format($item->price * $item->quantity,2) }}</td>
						<td>
							<a href="{{ route('cart-delete',$item->slug)}}" class="btn btn-danger" title="Quitar producto">
								<i class="fa fa-remove"></i>
							</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<hr>
			<h3><span class="label label-success">
				Total: ${{number_format($total,2)}}
			</span>
			</h3>
				@else
					<h3><span class="label label-warning">No hay productos en el carrito &nbsp;<i class="fa fa-frown-o" aria-hidden="true"></i>.
					</span></h3>
				@endif
		</div>
		<hr>
		<p>
			<a href="{{ route('home')}}" class="btn btn-primary"><i class="fa fa-chevron-circle-left"></i>&nbsp;Seguir comprando </a>
			<a href="{{ route('order-detail')}}" class="btn btn-primary">Continuar &nbsp;<i class="fa fa-chevron-circle-right"></i></a>
		</p>
	</div>
 </div>
@endsection
@extends('admin.template.template')
@section('content')
    <div class="container text-center">
    	<div class="page-header">
    		<h1>
    			<i class="fa fa-shopping-cart"></i>
    			PRODUCTOS <a href="{{ route('admin.product.create') }}" class="btn btn-warning" title="Agregar producto"><i class="fa fa-plus-circle"></i>&nbsp;Producto</a>
    		</h1>
    	</div>
    	<div class="page" style="border: solid #000">
    	@if(count($products))
    	<div class="table-responsive">
    	        <!-- BUSCADOR DE PRODUCTOS-->
    	{!! Form::open(['route' => 'admin.product.index','method' => 'GET','class' => 'navbar-form pull-right']) !!}
            <label>Ingrese nombre del producto: </label>
    	    <div class="input-group">
    	   	  {!! Form::text('name',null,['class' => 'form-control','placeholder' => 'Buscar producto...','aria-describedby' => 'search']) !!}
    	   	  <span class="input-group-addon" style="height: -20px" id="search">
    	   	    <button type="submit" style="border: 0">
    	   	  	<i class="fa fa-search"  aria-hidden="true"></a></i>
    	   	  </span> 
    	    </div>
    	{!! Form::close() !!}
    	        <br><br><hr>
	    		<table class="table table-striped table-bordered table-hover">
	    			<thead>
	    				<tr>
	    				    <th><h4 style="font-weight: bold">Editar</h4></th>
	    				    <th><h4 style="font-weight: bold">Eliminar</h4></th>
	    				    <th><h4 style="font-weight: bold">Imágen</h4></th>
	    				    <th><h4 style="font-weight: bold">Nombre</h4></th>
	    					<th><h4 style="font-weight: bold">Categoría</h4></th>
	    					<th><h4 style="font-weight: bold">Descripción</h4></th>
	    					<th><h4 style="font-weight: bold">Precio</h4></th>
	    					<th><h4 style="font-weight: bold">Visible</h4></th>
	    				</tr>
	    			</thead>
	    			<tbody>
	    				@foreach ($products as $product)
	    				 <tr>
	    				     <td>
	    				     <a href="{{ route('admin.product.edit',$product->slug) }}" class="btn btn-primary" title="Editar producto">
	    				     	<i class="fa fa-pencil-square"></i>
	    				     </a>
	    				     </td>
	    				     <td>
	    				     	<a href="{{ route('admin.product.destroy',$product->slug) }}" class="btn btn-danger" title="Eliminar producto" onclick="return confirm('¿Est\u00E1 seguro de eliminar éste producto?')">
	    				     		<i class="fa fa-trash"></i>
	    				     	</a>
	    				     </td>
				             <td><img src="{{ asset(''.$product->image) }}" width="40"></td>
				             <td>{{ $product->name }}</td>
				             <td>
				             	<h3><span class="label" style="background-color: {{ $product->category->color }}">{{ $product->category->name }}</h3>
				             </td>
				             <td>{{ $product->extract }}</td>
				             <td>${{ number_format($product->price,2) }}</td>
				             <td>
				             @if($product->visible == 1) 
				             	<h4><span class="label label-success" style="font-weight: bold">Si</span></h4> 
				             @else
				             	<h4><span class="label label-danger" style="font-weight: bold">No</span></h4> 
				             @endif 
				             </td>
				             </tr>
						@endforeach
	    			</tbody>
	    		</table>
	    	</div>
	    	 {!! $products->render()!!}
				@else
					<h2><span class="label label-warning">No hay productos registrados &nbsp;<i class="fa fa-frown-o" aria-hidden="true"></i>.
					</span></h2>
				@endif
      </div>
    </div>
@endsection
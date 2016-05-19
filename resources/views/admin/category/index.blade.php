@extends('admin.template.template')
@section('content')
    <div class="container text-center">
    	<div class="page-header">
    		<h1>
    			<i class="fa fa-shopping-cart"></i>
    			CATEGORÍAS <a href="{{ route('admin.category.create') }}" class="btn btn-warning" title="Agregar categoría"><i class="fa fa-plus-circle"></i>&nbsp;Categoría</a>
    		</h1>
    	</div>
    	 {!! $categories->render()!!}
    	<div class="page" style="border: solid #000">
    	@if(count($categories))
    	<div class="table-responsive">
	    		<table class="table table-striped table-bordered table-hover">
	    			<thead>
	    				<tr>
	    				    <th><h4 style="font-weight: bold">Editar</h4></th>
	    				    <th><h4 style="font-weight: bold">Eliminar</h4></th>
	    					<th><h4 style="font-weight: bold">Nombre</h4></th>
	    					<th><h4 style="font-weight: bold">Descripción</h4></th>
	    					<th><h4 style="font-weight: bold">Color</h4></th>
	    				</tr>
	    			</thead>
	    			<tbody>
	    				@foreach ($categories as $category)
	    				 <tr>
	    				     <td>
	    				     <a href="{{ route('admin.category.edit',$category) }}" class="btn btn-primary" title="Editar categoría">
	    				     	<i class="fa fa-pencil-square"></i>
	    				     </a>
	    				     </td>
	    				     <td>
	    				     	<a href="{{ route('admin.category.destroy',$category) }}" class="btn btn-danger" title="Eliminar categoría" onclick="return confirm('¿Está seguro de eliminar ésta categoría?')">
	    				     		<i class="fa fa-trash"></i>
	    				     	</a>
	    				     </td>
				             <td>{{ $category->name }}</td>
				             <td>{{ $category->description }}</td>
				             <td>
				             	<h3><span class="label" style="background-color: {{ $category->color }}">{{ $category->name }}</h3>
				             </td>
				             </tr>
						@endforeach
	    			</tbody>
	    		</table>
	    	</div>
	    	 {!! $categories->render()!!}
      </div>
			@else
					<h2><span class="label label-warning">No hay categorías registradas &nbsp;<i class="fa fa-frown-o" aria-hidden="true"></i>.
					</span></h2>
			@endif
    </div>
@endsection
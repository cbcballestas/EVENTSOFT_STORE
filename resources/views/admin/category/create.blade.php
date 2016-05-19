@extends('admin.template.template')
@section('content')
	<div class="container text-center">
		<div class="page-header">
			<h1>
				<i class="fa fa-shopping-cart"></i>
				CATEGORÍAS<small>&nbsp;(Agregar categoría)</small>
			</h1>
		</div>
		<div class="row">
			<div class="col-md-offset-3 col-md-6">
				<div class="page" style="border: solid #000">
					@if(count($errors) > 0)
                       @include('admin.partials.errors')
					@endif

					{!! Form::open(['route' => 'admin.category.store','method' => 'POST']) !!}
                    
					<div class="form-group">
						<label for="name">Nombre:</label>
						{!! Form::text('name',null,['class' =>'form-control','placeholder' =>'Ingresa el nombre...','autofocus' => 'autofocus']) !!}
					</div>
					<div class="form-group">
						<label for="description">Descripción:</label>
						{!! Form::textarea('description',null,['class' =>'form-control']) !!}
					</div>
					<div class="form-group">
						<label for="color">Color:</label>
                        <input type="color" name="color" class="form-control">
					</div>
					<div class="form-group">
						{!! Form::submit('Guardar',['class' => 'btn btn-primary']) !!}
						<a href="{{ route('admin.category.index') }}" class="btn btn-warning">Cancelar</a>
					</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection
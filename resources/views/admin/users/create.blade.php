@extends('admin.template.template')

@section('content')

    <div class="container text-center">
        
        <div class="page-header">
            <h1>
                <i class="fa fa-user"></i> USUARIOS <small>(Agregar usuario)</small>
            </h1>
        </div>
        
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                
                <div class="page" style="border: solid #000">
                    
                    @if (count($errors) > 0)
                        @include('admin.partials.errors')
                    @endif
                    
                    {!! Form::open(['route'=>'admin.users.store']) !!}
        
                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            
                            {!! 
                                Form::text(
                                    'name', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingrese el nombre...',
                                        'autofocus' => 'autofocus',
                                        //'required' => 'required'
                                    )
                                ) 
                            !!}
                        </div>
                        
                        <div class="form-group">
                            <label for="last_name">Apellidos:</label>
                            
                            {!! 
                                Form::text(
                                    'last_name', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingrese los apellidos...',
                                        //'required' => 'required'
                                    )
                                ) 
                            !!}
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Correo:</label>
                            
                            {!! 
                                Form::email(
                                    'email', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingrese el correo...',
                                        //'required' => 'required'
                                    )
                                ) 
                            !!}
                        </div>
                        
                        <div class="form-group">
                            <label for="user">Username:</label>
                            
                            {!! 
                                Form::text(
                                    'user', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingrese el nombre de usuario...',
                                        //'required' => 'required'
                                    )
                                ) 
                            !!}
                        </div>
                        
                        <div class="form-group">
                            <label for="password">Password:</label>
                            
                            {!! 
                                Form::password(
                                    'password', 
                                    array(
                                        'class'=>'form-control',
                                        //'required' => 'required'
                                    )
                                ) 
                            !!}
                        </div>
                        
                        <div class="form-group">
                            <label for="confirm_password">Confirmar Password:</label>
                            
                            {!! 
                                Form::password(
                                    'password_confirmation',
                                    array(
                                        'class'=>'form-control',
                                        //'required' => 'required'
                                    )
                                ) 
                            !!}
                        </div>
                        
                        <div class="form-group">
                            <label for="type">Rol:</label>
                            
                            {!! Form::radio('type', 'user', true) !!} User
                            {!! Form::radio('type', 'admin') !!} Admin
                        </div>
                        
                        <div class="form-group">
                            <label for="address">Dirección:</label>
                            
                            {!! 
                                Form::textarea(
                                    'address', 
                                    null, 
                                    array(
                                        'class'=>'form-control'
                                    )
                                ) 
                            !!}
                        </div>
                        
                        <div class="form-group">
                            <label for="active">Activar usuario:</label>
                            
                            {!! Form::checkbox('active', null, true,['title' => 'Marque la casilla si desea hablitar este usuario']) !!}
                        </div>
                        
                        <div class="form-group">
                            {!! Form::submit('Guardar', array('class'=>'btn btn-primary')) !!}
                            <a href="{{ route('admin.users.index') }}" class="btn btn-warning">Cancelar</a>
                        </div>
                    
                    {!! Form::close() !!}
                    
                </div>
                
            </div>
        </div>
        
    </div>

@endsection
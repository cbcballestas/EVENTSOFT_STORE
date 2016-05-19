@extends('admin.template.template')

@section('content')
    <div class="container text-center">
        <div class="page-header">
            <h1>
                <i class="fa fa-user"></i> USUARIOS
                <a href="{{ route('admin.users.create') }}" class="btn btn-warning" title="Agregar usuario">
                    <i class="fa fa-plus-circle"></i> Usuario
                </a>
            </h1>
        </div>
        
        <div class="page" style="border: solid #000">
            @if(count($users))
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><h4 style="font-weight: bold">Editar</h4></th>
                            <th><h4 style="font-weight: bold">Eliminar</h4></th>
                            <th><h4 style="font-weight: bold">Nombre</h4></th>
                            <th><h4 style="font-weight: bold">Apellidos</h4></th>
                            <th><h4 style="font-weight: bold">Username</h4></th>
                            <th><h4 style="font-weight: bold">Correo Electrónico</h4></th>
                            <th><h4 style="font-weight: bold">Tipo de cuenta (Rol)</h4></th>
                            <th><h4 style="font-weight: bold">Activo</h4></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>
                                    <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary">
                                        <i class="fa fa-pencil-square-o"></i>
                                    </a>
                                </td>
                                <td>
                                    @if($user->id != Auth::user()->id)
                                    {!! Form::open(['route' => ['admin.users.destroy', $user]]) !!}
        								<input type="hidden" name="_method" value="DELETE">
        								<button onclick="return confirm('¿Est\u00E1 seguro de eliminar éste usuario?')"class="btn btn-danger">
        									<i class="fa fa-trash-o"></i>
        								</button>
        							{!! Form::close() !!}
                                    @else
                                        <button class="btn btn-danger" disabled>
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    @endif
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->user }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->type }}</td> 
                                <td>
                                @if($user->active == 1)
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
            
            <hr>
            
             {{ $users->render() }}
            @else
                    <h2><span class="label label-warning">No hay usuarios registrados &nbsp;<i class="fa fa-frown-o" aria-hidden="true"></i>.
                    </span></h2>
            @endif
        </div>
    </div>
@endsection
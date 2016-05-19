@extends('admin.template.template')

@section('content')
    <div class="container text-center">
        <div class="page-header">
            <h1>
                <i class="fa fa-list-alt"></i> PEDIDOS
            </h1>
        </div>
        
        <div class="page" style="border: solid #000">
            @if(count($orders))
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Ver Detalle</th>
                            <th>Eliminar</th>
                            <th>Fecha</th>
                            <th>Usuario</th>
                            <th>Subtotal</th>
                            <th>Envio</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>
                                    <a 
                                        href="#" 
                                        class="btn btn-primary btn-detalle-pedido"
                                        data-id="{{ $order->id }}"
                                        data-path="{{ route('admin.orders.getItems') }}"
                                        data-toggle="modal" 
                                        data-target="#myModal"
                                        data-token="{{ csrf_token() }}"
                                    >
                                        <i class="fa fa-external-link"></i>
                                    </a>
                                </td>
                                <td>
                                    {!! Form::open(['route' => ['admin.orders.destroy', $order->id]]) !!}
        								<button onclick="return confirm('¿Est\u00E1 seguro de eliminar ésta orden?')" class="btn btn-danger">
        									<i class="fa fa-trash-o"></i>
        								</button>
        							{!! Form::close() !!}
                                </td>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->user->name . " " . $order->user->last_name }}</td>
                                <td>${{ number_format($order->subtotal,2) }}</td>
                                <td>${{ number_format($order->shipping,2) }}</td>
                                <td>${{ number_format($order->subtotal + $order->shipping,2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <hr>
            
            {{ $orders->render() }}
            @else
                    <h2><span class="label label-warning">No se han realizado pedidos &nbsp;<i class="fa fa-frown-o" aria-hidden="true"></i>.
                    </span></h2>
                @endif
            
        </div>
    </div>
       @include('admin.partials.modal-detalle-pedido')
@endsection


@extends('admin.template.template')

@section('content')

    <div class="container text-center">
        <div class="page-header">
            <h1><i class="fa fa-rocket"></i> EVENTSOFT Store - DASHBOARD</h1>
        </div>
        
        <h2>Bienvenido(a) {{ Auth::user()->name}}, al Panel de administración.</h2><hr>
        
        <div class="row">
            
            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-list-alt icon-home"></i>
                    <a href="{{ route('admin.category.index') }}" class="btn btn-warning btn-block btn-home-admin">CATEGORÍAS</a>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-shopping-cart  icon-home"></i>
                    <a href="{{ route('admin.product.index') }}" class="btn btn-warning btn-block btn-home-admin">PRODUCTOS</a>
                </div>
            </div>
                    
        </div>
        
        <div class="row">
            
            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-cc-paypal  icon-home"></i>
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-warning btn-block btn-home-admin">PEDIDOS</a>
                </div>
            </div> 
            
            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-users  icon-home"></i>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-warning btn-block btn-home-admin">USUARIOS</a>
                </div>
            </div>

            <div class="col-md-12">
                <div class="panel">
                    <i class="fa fa-bar-chart  icon-home"></i>
                    <a href="{{ route('admin.reports.index') }}" class="btn btn-warning btn-block btn-home-admin">REPORTES</a>
                </div>
            </div>
                    
        </div>
        
    </div>
    <hr>

@stop
@extends('admin.template.template')
@section('content')
<div class="container text-center">
        <div class="page-header">
            <h1>
                <i class="fa fa-list-alt"></i> REPORTES
            </h1>
        </div>
        <div class="page" style="border: solid #000">
            @if(count($products))
            <center>
            <h1><i class="fa fa-money" aria-hidden="true"></i>
             &nbsp;COMPRAS POR PRODUCTO</h1>
            </center>
            <div  id="grafico" class="table-responsive">
            </div>
            {!! $products->render()!!}
        </div>
        @else
          <h2><span class="label label-warning">No hay compras registradas &nbsp;<i class="fa fa-frown-o" aria-hidden="true"></i>.
          </span></h2>
        @endif
    </div>
       <script type="text/javascript">
        $(function ($) {
        $('#grafico').highcharts({
        title: {
            text: 'CANTIDAD DE COMPRAS REALIZADAS POR PRODUCTO',
            x: -20 //center
        },
        
        xAxis: {
            categories: [
            <?php foreach ($products as $item) {
            ?>
             '<?php echo $item->name ?>',
            <?php
               }
            ?>
          ]
        },
        yAxis: {
            title: {
                text: 'Numero de compras'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: 'Producto(s)'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{ type:'column',
            name: 'Cantidad',
            data: [
                <?php foreach ($products as $item) {
            ?>
             <?php echo $item->NumCompras ?>,
            <?php
               }
            ?>
            ]
        }]
    });
});
        </script>
@endsection
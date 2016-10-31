@extends('layouts.'.Auth::user()->tipo)

@section('contenido')

@include('alerts.success')
@include('alerts.error')

    <div class="cuadro panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><span class="glyphicon glyphicon-list"></span>INVENTARIOS</h3>
        </div>
        <div class="panel-body">
            <a href="/inventario/create" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Nuevo</a><br><br>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>DESCRIPCIÓN</th>
                            <th>INICIO</th>
                            <th>CIERRE</th>
                            <th>INVERSIÓN</th>
                            <th>ESTADO</th>
                            <th>DETALLES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inventarios as $inv)
                        <tr>
                            <td>{{$inv->descripcion}}</td>
                            <td>{{$inv->inicio}}</td>
                            <td>{{$inv->cierre}}</td>
                            @foreach ($inversion as $in)
                                @if($in['inventario_id'] == $inv->id)
                                    <td>{{$in['total']}}</td>
                                @endif
                            @endforeach    
                            @if($inv->cierre == NULL)
                                <td><span class="label label-success">VIGENTE</span></td>
                            @else
                                <td><span class="label label-danger">CERRADO</span></td>
                            @endif
                            <td><a href="/inventario/documento?cod={{$inv->id}}" class="btn btn-default" title="Ver PDF" style="float:left"><i class="fa fa-file-pdf-o"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop

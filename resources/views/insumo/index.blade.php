
@extends('layouts.'.Auth::user()->tipo)

@section('contenido')

@include('alerts.success')
@include('alerts.error')

    <div class="cuadro panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><span class="glyphicon glyphicon-list"></span>INSUMOS</h3>
        </div>
        <div class="panel-body">
            @if(Auth::user()->tipo == 'almacen')
                <a href="/insumo/create" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Nuevo</a><br><br>
            @endif
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>DESCRIPCION</th>
                            <th>MEDIDA</th>
                            <th>PARTIDA</th>
                            <th>DESC PART</th>
                            <!--th>ACCIONES</th-->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($insumos as $ins)
                        <tr>
                            <td>{{$ins->descripcion}}</td>
                            <td>{{$ins->unidad}}</td>
                            <td>{{$ins->partida_cod}}</td>
                            <td>{{$ins->partida_desc}}</td>
                            <!--td>
                                {!!link_to_route('insumo.update', $title = 'Eliminar', $parameters = $ins->id, $attributes = ['class'=>'btn btn-sm btn-danger izquerda'])!!}
                            </td-->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop

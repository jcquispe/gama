@extends('layouts.'.Auth::user()->tipo)

@section('contenido')

@include('alerts.success')
@include('alerts.error')

    <div class="cuadro panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><span class="glyphicon glyphicon-list"></span>ORGANIGRAMA</h3>
        </div>
        <div class="panel-body">
            <a href="/unidad/create" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Nuevo</a><br><br>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>UNIDAD</th>
                            <th>SIGLA</th>
                            <th>ACTIVO</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($unidads as $uni)
                        <tr>
                            <td>{{$uni->denominacion}}</td>
                            <td>{{$uni->sigla}}</td>
                             @if($uni->vigente==1)
                                <td><img src="img/yes.png" width=30></td>
                            @else
                                <td><img src="img/no.png" width=30></td>
                            @endif
                            <td>
                                {!!link_to_route('unidad.edit', $title = 'Editar', $parameters = $uni->id, $attributes = ['class'=>'btn btn-primary izquerda'])!!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop


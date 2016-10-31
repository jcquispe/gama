@extends('layouts.'.Auth::user()->tipo)

@section('contenido')

@include('alerts.success')
@include('alerts.error')

    <div class="cuadro panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><span class="glyphicon glyphicon-list"></span> LISTADO DE USUARIOS</h3>
        </div>
        <div class="panel-body">
            <a href="/usuario/create" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Nuevo</a><br><br>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>NOMBRE</th>
                            <th>USUARIO</th>
                            <th>CI</th>
                            <th>ROL</th>
                            <th>DEPENDENCIA</th>
                            <th>VIGENTE</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $us)
                        <tr>
                            <td>{{$us->nombre.' '.$us->paterno.' '.$us->materno}}</td>
                            <td>{{$us->us}}</td>
                            <td>{{$us->ci.' '.$us->exp}}</td>
                            <td>{{$us->tipo}}</td>
                            <td>{{$us->sigla}}</td>
                             @if($us->vigente==1)
                                <td><img src="img/yes.png" width=30></td>
                            @else
                                <td><img src="img/no.png" width=30></td>
                            @endif
                            <td>
                                {!!link_to_route('usuario.edit', $title = 'Editar', $parameters = $us->id, $attributes = ['class'=>'btn btn-primary izquerda'])!!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
   

@stop


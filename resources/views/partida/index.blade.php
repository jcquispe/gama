@extends('layouts.'.Auth::user()->tipo)

@section('contenido')

@include('alerts.success')
@include('alerts.error')

    <div class="cuadro panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><span class="glyphicon glyphicon-list"></span> PARTIDAS</h3>
        </div>
        <div class="panel-body">
            <!--a href="/partida/create" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Nuevo</a-->
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>COD</th>
                            <th>PARTIDA</th>
                            <th>CATEGORIA</th>
                            <th>ACTIVO</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach($partidas as $par)
                        <tr>
                            <td>{{$par->codigo}}</td>
                            <td>{{$par->descripcion}}</td>
                            <td>{{\App\Categoria::find($par->categoria_id)->cat_prog}} - {{\App\Categoria::find($par->categoria_id)->cat_prog_desc}}</td>
                             @if($par->vigente==1)
                                <td><img src="img/yes.png" width=30></td>
                            @else
                                <td><img src="img/no.png" width=30></td>
                            @endif
                            <td>
                                {!!link_to_route('partida.edit', $title = 'Editar', $parameters = $par->id, $attributes = ['class'=>'btn btn-primary izquerda'])!!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>

@stop


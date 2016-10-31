@extends('layouts.'.Auth::user()->tipo)

@section('contenido')

@include('alerts.success')
@include('alerts.error')

    <div class="cuadro panel panel-default">
        <div class="panel-heading">
            <h4>Insumos Disponibles</h4>
              <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>DESCRIPCION</th>
                            <th>UNIDAD</th>
                            <th>DISPONIBLE</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($disponible as $disp)
                        <tr>
                            <td>{{$disp[0]}}</td>
                            <td>{{$disp[1]}}</td>
                            <td>{{$disp[2]}}</td>
                            @if($disp[3]<= 10)
                                <td><span class="label label-danger">{{$disp[3]}} en almacen</span></td>'
                            @elseif($disp[3] <= 30)
                                <td><span class="label label-warning">{{$disp[3]}} en almacen</span></td>'
                            @else
                                <td><span class="label label-success">{{$disp[3]}} en almacen</span></td>'
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
        </div>
    </div>

@stop

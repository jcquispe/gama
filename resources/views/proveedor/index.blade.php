
@extends('layouts.'.Auth::user()->tipo)

@section('contenido')

@include('alerts.success')
@include('alerts.error')

    <div class="cuadro panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><span class="glyphicon glyphicon-list"></span>PROVEEDORES</h3>
        </div>
        <div class="panel-body">
            <a href="/proveedor/create" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Nuevo</a><br><br>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>NOMBRE O RAZON SOCIAL</th>
                            <th>NIT</th>
                            <th>TELEFONO</th>
                            <th>CORREO</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($proveedores as $pro)
                        <tr>
                            <td>{{$pro->razon_social}}</td>
                            <td>{{$pro->nit}}</td>
                            <td>{{$pro->telefono}}</td>
                            <td>{{$pro->correo}}</td>
                            <td>
                                {!!link_to_route('proveedor.edit', $title = 'Editar', $parameters = $pro->id, $attributes = ['class'=>'btn btn-sm btn-default izquerda'])!!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop
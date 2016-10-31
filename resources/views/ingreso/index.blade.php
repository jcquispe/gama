@extends('layouts.'.Auth::user()->tipo)

@section('contenido')

@include('alerts.success')
@include('alerts.error')

    <div class="cuadro panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><span class="glyphicon glyphicon-list"></span> LISTADO DE INGRESOS</h3>
        </div>
        <div class="panel-body">
            <a href="/ingreso/create" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Nuevo</a>
            <div class="row">
            <div class="col-md-9"><input id="vigente" type="text" value={{$vig}} hidden></div>
            <div class="col-md-3">
                <select class="form-control" id="inventario">
                    @foreach($inventarios as $inv)
                    <option value="{{$inv->id}}">{{$inv->descripcion}}</option>
                    @endforeach
                </select>
            </div>
            </div>
            <div class="table-responsive">
                <table class="table" id="ingresostable">
                    <thead>
                        <tr>
                            <th>NUMERO</th>
                            <th>FECHA</th>
                            <th>UNIDAD</th>
                            <th>PROYECTO</th>
                            <th>PROVEEDOR</th>
                            <th>NIT</th>
                            <th>FACTURA</th>
                            <th hidden>INV</th>
                            <th width=15%>OPCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                         @foreach($ingresos as $ing)
                        <tr>
                            <td>{{$ing->cod}}</td>
                            <td>{{date('d/m/Y', strtotime($ing->fecha_ingreso))}}</td>
                            <td>{{$ing->denominacion}}</td>
                            <td>{{$ing->cat_prog}}</td>
                            <td>{{$ing->razon_social}}</td>
                            <td>{{$ing->nit}}</td>
                            <td>{{$ing->factura}}</td>
                            <td hidden>{{$ing->inventario_id}}</td>
                            <td>
                                <a href="/ingreso/documento?cod={{$ing->id}}" class="btn btn-default" title="Ver PDF" style="float:left"><i class="fa fa-file-pdf-o"></i></a>
                                <a href="/ingreso/{{$ing->id}}/edit" class="btn btn-danger" title="Anular" style="float:left"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop

@section('scripts')
<script>

    
    //
</script>
@stop
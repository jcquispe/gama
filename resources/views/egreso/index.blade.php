@extends('layouts.'.Auth::user()->tipo)

@section('contenido')

@include('alerts.success')
@include('alerts.error')

    <div class="cuadro panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><span class="glyphicon glyphicon-list"></span> LISTADO DE EGRESOS</h3>
        </div>
        <div class="panel-body">
            <a href="/egreso/create" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Nuevo</a>
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
            <?php //echo '<pre>';print_r(date('d/m/Y', strtotime($egresos[0]->fecha_solicitud)));die;?>
            <div class="table-responsive">
                <table class="table" id="ingresostable">
                    <thead>
                        <tr>
                            <th>NUM EG</th>
                            <th>FECHA EG</th>
                            <th>NUM SOL</th>
                            <th>FECHA SOL</th>
                            <th>PROGRAMA</th>
                            <th>SOLICITANTE</th>
                            <th>UNIDAD</th>
                            <th hidden>INV</th>
                            <th width=15%>OPCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                         @foreach($egresos as $egr)
                        <tr>
                            <td>{{$egr->cod}}</td>
                            <td>{{date('d/m/Y', strtotime($egr->fecha_egreso))}}</td>
                            <td>{{$egr->numero}}</td>
                            <td>{{date('d/m/Y', strtotime($egr->fecha_solicitud))}}</td>
                            <td>{{$egr->cat_prog}}</td>
                            <td>{{$egr->us}}</td>
                            <td>{{$egr->denominacion}}</td>
                            <td hidden>{{$egr->inventario_id}}</td>
                            <td>
                                <a href="/egreso/documento?cod={{$egr->id}}" class="btn btn-default" title="Ver PDF" style="float:left"><i class="fa fa-file-pdf-o"></i></a>
                                <a href="/egreso/{{$egr->id}}/edit" class="btn btn-danger" title="Anular" style="float:left"><i class="fa fa-trash-o"></i></a>
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
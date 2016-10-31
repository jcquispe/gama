@extends('layouts.'.Auth::user()->tipo)

@include('alerts.success')

@section('contenido')

    <div class="cuadro panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><span class="glyphicon glyphicon-list"></span> NUEVO INVENTARIO </h3>
        </div>
        <div class="panel-body">
            {!!Form::open(['route'=>'inventario.store', 'method'=>'POST', 'class'=>'form-horizontal'])!!}

            <p>Debe tener en cuenta que al crear un nuevo inventario el anterior automáticamente quedará cerrado.</p>
            <div class="form-group">
                {!!Form::label('descripcion', 'Descripción:', ['class'=>'col-sm-3 control-label'])!!}
                <div class="col-sm-9">
                    {!!Form::text('descripcion',null,['class'=>'form-control', 'placeholder'=>'Descripción del inventario'])!!}
                </div>
            </div>

            <div class="form-group">
                {!!Form::label('fecha', 'Fecha de apertura:', ['class'=>'col-sm-3 control-label'])!!}
                <div class="col-sm-9">
                    <input type="text" class="form-control" value="<?php echo date('d/m/Y H:i:s');?>" disabled>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    {!!Form::submit('CREAR',['class'=>'btn btn-primary'])!!}
                </div>
            </div>

            {!!Form::close()!!}
        </div>
    </div>
   

@stop

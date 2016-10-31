<div class="form-group">
    {!!Form::label('nombre', 'Nombre(s)', ['class'=>'col-sm-3 control-label'])!!}
    <div class="col-sm-9">
        {!!Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'Nombre(s)'])!!}
    </div>
</div>

<div class="form-group">
    {!!Form::label('paterno', 'Ap. Paterno', ['class'=>'col-sm-3 control-label'])!!}
    <div class="col-sm-9">
        {!!Form::text('paterno',null,['class'=>'form-control', 'placeholder'=>'Apellido Paterno'])!!}
    </div>
</div>

<div class="form-group">
    {!!Form::label('materno', 'Ap. Materno', ['class'=>'col-sm-3 control-label'])!!}
    <div class="col-sm-9">
        {!!Form::text('materno',null,['class'=>'form-control', 'placeholder'=>'Apellido Materno'])!!}
    </div>
</div>

<div class="form-group">
    {!!Form::label('ci', 'CI', ['class'=>'col-sm-3 control-label'])!!}
    <div class="col-sm-9">
        {!!Form::number('ci', null,['class'=>'form-control', 'placeholder'=>'Número de Cedulade Identidad'])!!}
    </div>
</div>

<div class="form-group">
    {!!Form::label('exp', 'Expedido en', ['class'=>'col-sm-3 control-label'])!!}
    <div class="col-sm-9">
        {!!Form::select('exp', ['LP' => 'LA PAZ', 'OR' => 'ORURO', 'CB' => 'COCHABAMBA', 'SC' => 'SANTA CRUZ', 'PO' => 'POTOSI', 'TA' => 'TARIJA', 'CH' => 'CHUQUISACA', 'BE' => 'BENI', 'PA' => 'PANDO'],null,['class'=>'form-control'])!!}
    </div>
</div>

<div class="form-group">
    {!!Form::label('us', 'Usuario', ['class'=>'col-sm-3 control-label'])!!}
    <div class="col-sm-9">
        {!!Form::text('us',null,['class'=>'form-control', 'placeholder'=>'Nombre de Usuario'])!!}
    </div>
</div>

<div class="form-group">
    {!!Form::label('password', 'Contraseña:', ['class'=>'col-sm-3 control-label'])!!}
    <div class="col-sm-9">
        {!!Form::password('password',['class'=>'form-control', 'placeholder'=>'Contraseña'])!!}
    </div>
</div>

<div class="form-group">
    {!!Form::label('tipo', 'Rol de usuario:', ['class'=>'col-sm-3 control-label'])!!}
    <div class="col-sm-9">
        {!!Form::select('tipo', ['admin' => 'Administrador', 'almacen' => 'Usuario Almacen', 'solicitud' => 'Usuario Solicitud'],null,['class'=>'form-control'])!!}
    </div>
</div>
	  
	    
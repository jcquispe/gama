<div class="form-group">
    {!!Form::label('razon_social', 'Razón Social:', ['class'=>'col-md-3 control-label'])!!}
    <div class="col-md-9">
        <?php $today = date('Y-m-d');?>
        {!!Form::text('razon_social',null,['class'=>'form-control', 'value'=>''])!!}
    </div>
</div>
<div class="form-group">
    {!!Form::label('nit', 'NIT:', ['class'=>'col-md-3 control-label'])!!}
    <div class="col-md-9">
        <?php $today = date('Y-m-d');?>
        {!!Form::text('nit',null,['class'=>'form-control', 'value'=>''])!!}
    </div>
</div>
<div class="form-group">
    {!!Form::label('telefono', 'Teléfono:', ['class'=>'col-md-3 control-label'])!!}
    <div class="col-md-9">
        <?php $today = date('Y-m-d');?>
        {!!Form::text('telefono',null,['class'=>'form-control', 'value'=>''])!!}
    </div>
</div>
<div class="form-group">
    {!!Form::label('correo', 'Correo:', ['class'=>'col-md-3 control-label'])!!}
    <div class="col-md-9">
        <?php $today = date('Y-m-d');?>
        {!!Form::email('correo',null,['class'=>'form-control', 'value'=>''])!!}
    </div>
</div>
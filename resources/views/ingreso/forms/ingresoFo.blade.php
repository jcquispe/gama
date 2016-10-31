<div class="form-inline">
    <div class="form-group">
    {!!Form::label('cod', 'Código:', ['class'=>'col-sm-4 control-label'])!!}
    <div class="col-sm-8">
        {!!Form::text('cod',null,['class'=>'form-control', 'placeholder'=>'Código'])!!}
    </div>
</div>

<div class="form-group">
    {!!Form::label('fecha', 'Fecha de Ingreso:', ['class'=>'col-sm-4 control-label'])!!}
    <div class="col-sm-8">
        <?php $today = date('Y-m-d');?>
        {!!Form::date('fecha',null,['class'=>'form-control', 'value'=>$today])!!}
    </div>
</div>
</div>

<div class="form-inline">
    <div class="form-group col-sm-12">
        {!!Form::label('unidad', 'Solicitante:')!!}
        <select id="unidad" name="unidad" class="form-control">
        @foreach($unidads as $uni)
        	<option value={{$uni['id']}}>{{$uni['denominacion']}}</option>
        @endforeach	
    	</select>
    </div>
</div>
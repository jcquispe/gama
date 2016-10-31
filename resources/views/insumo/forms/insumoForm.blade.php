<div class="form-group">
    {!!Form::label('descripcion', 'Descripción:', ['class'=>'col-sm-3 control-label'])!!}
    <div class="col-sm-9">
        {!!Form::text('descripcion',null,['class'=>'form-control', 'placeholder'=>'Nombre del Producto'])!!}
    </div>
</div>

<div class="form-group">
	{!!Form::label('unidad', 'Unidad de medida:', ['class'=>'col-sm-3 control-label'])!!}
    <div class="col-sm-9">
        <select id="unidad" name="unidad" class="form-control">
         	<option value="UNIDAD">Unidad</option></option>
            <option value="DOCENA">Docena</option></option>
            <option value="MIL">Mil</option></option>
            <option value="PAQUETE">Paquete</option></option>
            <option value="BOLSA">Bolsa</option></option>
            <option value="CAJA">Caja</option>
            <option value="LITRO">Litro</option></option>
            <option value="KILO">Kilogramo</option></option>
            <option value="SERVICIO">Servicio</option></option>
    	</select>
    </div>
</div>

	  
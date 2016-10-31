<div class="col-md-6">
    
    <div class="form-group">
        {!!Form::label('fecha', 'Fecha:', ['class'=>'col-md-3 control-label'])!!}
        <div class="col-md-9">
            <input type="text" class="form-control" id="fecha" name="fecha" value="<?php echo date('Y-m-d H:i:s');?>" disabled>
        </div>
    </div>
    
    <div class="form-group">
        {!!Form::label('proveedor', 'Proveedor:', ['class'=>'col-md-3 control-label'])!!}
        <div class="col-md-6 col-xs-12">
            <select id="proveedor" name="proveedor" class="form-control">
                <option value=''>--Seleccionar NIT--</option>
            @foreach($proveedors as $pro)
            	<option value={{$pro['id']}}>{{$pro['nit']}}</option>
            @endforeach	
        	</select>
        </div>
        <div class="col-md-3 col-xs-12">
            <button type="button" id="showModal" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Nuevo</button>
        </div>
    </div>
    
    <div class="form-group">
        {!!Form::label('razon', 'Razón Social:', ['class'=>'col-md-3 control-label'])!!}
        <div class="col-md-9">
            {!!Form::text('razon', null,['class'=>'form-control', 'placeholder'=>'Nombre o Razon Social', 'disabled'])!!}
        </div>
    </div>
    
    <div class="form-group">
        {!!Form::label('factura', 'Factura:', ['class'=>'col-md-3 control-label'])!!}
        <div class="col-md-9">
            {!!Form::text('factura', null,['class'=>'form-control', 'placeholder'=>'Número de Factura'])!!}
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        {!!Form::label('unidad', 'Solicitante:', ['class'=>'col-sm-3 control-label'])!!}
        <div class="col-sm-9">
            <select id="unidad" name="unidad" class="form-control">
            @foreach($unidads as $uni)
            	<option value={{$uni['id']}}>{{$uni['denominacion']}}</option>
            @endforeach	
        	</select>
        </div>
    </div>
    
    <div class="form-group">
        {!!Form::label('categoria', 'Cat Prog:', ['class'=>'col-md-3 control-label'])!!}
        <div class="col-md-9 col-xs-12">
            <select id="categoria" name="categoria" class="form-control">
                <option value=''>--Seleccionar--</option>
            @foreach($categorias as $cat)
            	<option value={{$cat['id']}}>{{$cat['cat_prog']}} {{$cat['cat_prog_desc']}}</option>
            @endforeach	
        	</select>
        </div>
    </div>
    
    <div class="form-group">
        {!!Form::label('observacion', 'Observaciones:', ['class'=>'col-sm-3 control-label'])!!}
        <div class="col-sm-9">
            {!!Form::textarea('observacion',null, ['class'=>'form-control', 'rows'=>5])!!}
        </div>
    </div>
</div>

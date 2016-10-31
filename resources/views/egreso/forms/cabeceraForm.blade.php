<div class="col-md-6">
    <div class="form-group">
        {!!Form::label('solicitud', 'Solicitud :', ['class'=>'col-md-3 control-label'])!!}
        <div class="col-md-9">
            <input type="text" class="form-control" value=<?php echo date( "d/m/Y", strtotime($solicitud->fecha_solicitud));?> id="solicitud" name="solicitud" disabled>
        </div>
    </div>
    <div class="form-group">
        {!!Form::label('fecha', 'Fecha salida:', ['class'=>'col-md-3 control-label'])!!}
        <div class="col-md-9">
            <input type="text" class="form-control" value=<?php echo date('d/m/Y')?> id="fecha" name="fecha" disabled>
        </div>
    </div>
    <div class="form-group">
        {!!Form::label('categoria', 'Programa:', ['class'=>'col-md-3 control-label'])!!}
        <div class="col-md-9">
            <input type="text" class="form-control" value=<?php echo $categoria->cat_prog?> id="categoria" name="categoria" disabled>
        </div>
    </div>
    
</div>
<div class="col-md-6">
    <?php
    $user = \DB::table('users')->where('id',$solicitud->user_id)->get();
    ?>
    <div class="form-group">
        {!!Form::label('usuario', 'Usuario:', ['class'=>'col-md-3 control-label'])!!}
        <div class="col-md-9">
            <input type="text" class="form-control" value=<?php echo $user[0]->us;?> disabled>
        </div>
    </div>
    <?php
    $uni = \DB::table('usuunis')->where('user_id',$solicitud->user_id)->join('unidads','unidads.id','=','usuunis.unidad_id')->get();
    ?>
    <div class="form-group">
        {!!Form::label('unidad', 'Unidad:', ['class'=>'col-md-3 control-label'])!!}
        <div class="col-md-9">
            <input type="text" class="form-control" value="<?php echo $uni[0]->denominacion; ?>" disabled>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <input type="text" class="form-control" value="<?php echo $categoria->cat_prog_desc?>" id="descrip" name="descrip" disabled>
        </div>
    </div>
</div>
<input type="text" id="solicitud" name="solicitud" value="<?php echo $solicitud->id;?>" hidden>
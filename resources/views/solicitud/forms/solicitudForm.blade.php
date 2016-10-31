<div class="col-md-6">
    <div class="form-group">
        {!!Form::label('fecha', 'Fecha:', ['class'=>'col-md-3 control-label'])!!}
        <div class="col-md-9">
            <input type="text" class="form-control" value=<?php echo date('Y-m-d')?> id="fecha" name="fecha" disabled>
        </div>
    </div>
    <div class="form-group">
        {!!Form::label('categoria', 'Cat Prog:', ['class'=>'col-md-3 control-label'])!!}
        <div class="col-md-9 col-xs-12">
            <select id="categoria" name="categoria" class="form-control">
                <option value=''>--Seleccionar--</option>
            @foreach($categorias as $cat)
            	<option value={{$cat['id']}}>{{$cat['cat_prog']}} - {{$cat['cat_prog_desc']}}</option>
            @endforeach	
        	</select>
        </div>
    </div>
    
</div>
<div class="col-md-6">
    <div class="form-group">
        {!!Form::label('usuario', 'Usuario:', ['class'=>'col-md-3 control-label'])!!}
        <div class="col-md-9">
            <input type="text" class="form-control" value="<?php echo Auth::user()->nombre.' '.Auth::user()->paterno.' '.Auth::user()->materno; ?>" disabled>
        </div>
    </div>
    <?php
    $uni = \DB::table('usuunis')->where('user_id',Auth::user()->id)->join('unidads','unidads.id','=','usuunis.unidad_id')->get();
    ?>
    <div class="form-group">
        {!!Form::label('unidad', 'Unidad:', ['class'=>'col-md-3 control-label'])!!}
        <div class="col-md-9">
            <input type="text" class="form-control" value="<?php echo $uni[0]->denominacion; ?>" disabled>
        </div>
    </div>
</div>

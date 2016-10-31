@extends('layouts.'.Auth::user()->tipo)

@section('contenido')

<div class="col-md-6 col-md-offset-3">
    <div class="panel panel-default cuadro">
		<div class="panel-heading">
		    <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> EDITAR PARTIDA</h3>
		</div>
		<div class="panel-body">

		    {!!Form::model($partida,['route'=>['partida.update', $partida->id], 'method'=>'PUT', 'class'=>'form-horizontal'])!!}
		        @include('partida.forms.partidaForm')
		        
		        <div class="form-group">
		        	{!!Form::label('categoria_id', 'Categoria:', ['class'=>'col-sm-3 control-label'])!!}
			        <div class="col-sm-9">
			            <select id="categoria_id" name="categoria_id" class="form-control">
			            @foreach($categorias as $cat)
			                @if($partida->categoria_id==$cat->id)
			            		<option value={{$cat['id']}} selected>{{$cat['cat_prog']}} {{$cat['cat_prog_desc']}}</option>
			            	@else
			            		<option value={{$cat['id']}}>{{$cat['cat_prog']}} {{$cat['cat_prog_desc']}}</option>
			            	@endif
			            @endforeach	
			        	</select>
			        </div>
		        </div>
		        
		        @if($partida->vigente==1)
			        <div class="form-group">
					    {!!Form::label('vigente', 'Vigente:', ['class'=>'col-sm-3 control-label'])!!}
					    <div class="col-sm-9">
					        {!!Form::checkbox('vigente', true, true);!!}
					    </div>
					</div>
					@else
					<div class="form-group">
					    {!!Form::label('vigente', 'Vigente', ['class'=>'col-sm-3 control-label'])!!}
					    <div class="col-sm-9">
					        {!!Form::checkbox('vigente', true, false);!!}
					    </div>
					</div>
				@endif
			        
		        <div class="form-group">
			    	<div class="col-sm-offset-3 col-sm-9">
			    		{!!Form::submit('ACTUALIZAR',['class'=>'btn btn-primary'])!!}
			    	</div>
			    </div>
		    {!!Form::close()!!}
		</div>
	</div>
</div>

@stop
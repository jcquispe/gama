@extends('layouts.'.Auth::user()->tipo)

@section('contenido')

<div class="col-md-6 col-md-offset-3">
    <div class="panel panel-default cuadro">
		<div class="panel-heading">
		    <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> EDITAR USUARIO</h3>
		</div>
		<div class="panel-body">

		    {!!Form::model($user,['route'=>['usuario.update', $user->id], 'method'=>'PUT', 'class'=>'form-horizontal'])!!}
		        @include('usuario.forms.userForm')
		        
		        <div class="form-group">
		        	{!!Form::label('unidad', 'Dependencia:', ['class'=>'col-sm-3 control-label'])!!}
			        <div class="col-sm-9">
			            <select id="unidad" name="unidad" class="form-control">
			            @foreach($unidads as $uni)
			            	@if($uni->id==$user->unidad_id)
			            		<option value={{$uni['id']}} selected>{{$uni['denominacion']}}</option>
			            	@else
			            		<option value={{$uni['id']}}>{{$uni['denominacion']}}</option>
			            	@endif
			            @endforeach	
			        	</select>
			        </div>
		        </div>
			        
		        @if($user->vigente==1)
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
				
				{!!Form::text('uid',null,['hidden'=>'hidden'])!!}
				
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
@extends('layouts.'.Auth::user()->tipo)

@section('contenido')

	    <div class="panel panel-default cuadro">
			  <div class="panel-heading">
			    <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> PARTIDA NUEVA</h3>
			  </div>
			  <div class="panel-body">
	    
			    {!!Form::open(['route'=>'partida.store', 'method'=>'POST', 'class'=>'form-horizontal'])!!}
			        @include('partida.forms.partidaForm')

                    <div class="form-group">
			        	{!!Form::label('categoria', 'Categoria:', ['class'=>'col-sm-3 control-label'])!!}
				        <div class="col-sm-9">
				            <select id="categoria" name="categoria" class="form-control">
				            @foreach($categorias as $cat)
				            	<option value={{$cat['id']}}>{{$cat['cat_prog']}} {{$cat['cat_prog_desc']}}</option>
				            @endforeach	
				        	</select>
				        </div>
			        </div>
			        
			        <div class="form-group">
				    	<div class="col-sm-offset-3 col-sm-9">
				    		{!!Form::submit('GUARDAR',['class'=>'btn btn-primary'])!!}
				    	</div>
				    </div>
			    {!!Form::close()!!}
			</div>
		</div>

@stop

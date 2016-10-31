@extends('layouts.'.Auth::user()->tipo)

@section('contenido')

@include('alerts.success')
@include('alerts.error')

    <div class="cuadro panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><span class="glyphicon glyphicon-list"></span> CATEGORÍAS PROGRAMÁTICAS</h3>
        </div>
        <div class="panel-body">
            <!--a href="/categoria/create" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Nuevo</a-->
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>COD CAT</th>
                            <th>CAT PROG</th>
                            <th>COD FTE</th>
                            <th>FTE</th>
                            <th>COD ORG</th>
                            <th>ORG</th>
                            <th>ACTIVO</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach($categorias as $cat)
                        <tr>
                            <td>{{$cat->cat_prog}}</td>
                            <td>{{$cat->cat_prog_desc}}</td>
                            <td>{{$cat->fte}}</td>
                            <td>{{$cat->fte_desc}}</td>
                            <td>{{$cat->org}}</td>
                            <td>{{$cat->org_desc}}</td>
                             @if($cat->vigente==1)
                                <td><img src="img/yes.png" width=30></td>
                            @else
                                <td><img src="img/no.png" width=30></td>
                            @endif
                            <td>
                                {!!link_to_route('categoria.edit', $title = 'Editar', $parameters = $cat->id, $attributes = ['class'=>'btn btn-primary izquerda'])!!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>

@stop


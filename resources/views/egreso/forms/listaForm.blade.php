<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><span class="glyphicon glyphicon-list"></span> DETALLE DE EGRESO</h3>
    </div>
    <div class="panel-body">
        <!--{!!Form::button('NUEVO',['class'=>'btn btn-default', 'id'=>'add'])!!}-->
        <input type="text" id="indice" name="indice" value="0" hidden>
        <div class="table-responsive">
            <table id="egreso">
    			<thead>
    				<tr>
    				    <th hidden>ID</th>
    					<th >PARTIDA</th>
    					<th >PRODUCTO</th>
    					<th >MEDIDA</th>
    					<th width="10%" style="font-size:11px;">SOLICITADO</th>
    					<th width="10%" style="font-size:11px;">DESPACHADO</th>
    				</tr>
    			</thead>
    			<tbody id="tcuerpo">
    			    <?php $ind = 0;?>
    				@foreach($soldetas as $sol)
    				<tr>
    				    <td hidden><input type="text" name="id{{$ind}}" id="id{{$ind}}" value="<?php echo $sol->id?>"></td>
    					<td ><input type="text" name="partida{{$ind}}" id="partida{{$ind}}" value="<?php echo $sol->codigo.' - '.$sol->desc;?>" style="width:95%" disabled></td>
    					<td ><input type="text" name="prodcuto{{$ind}}" id="producto{{$ind}}" value="<?php echo $sol->descripcion?>" style="width:95%" disabled></td>
    					<td ><input type="text" name="unidad{{$ind}}" id="unidad{{$ind}}" value={{$sol->unidad}} style="width:95%" disabled></td>
    					<td ><input type="text" name="solicitado{{$ind}}" id="solicitado{{$ind}}" value={{$sol->cantidad_solicitada}} class="solicitado" style="width:95%" disabled></td>
    					<td ><input type="text" name="despachado{{$ind}}" id="despachado{{$ind}}" value="0" style="width:95%" class="despachado"></td>
    				</tr>
    				<?php $ind = $ind+1;?>
    				@endforeach
    				
    			</tbody>
    		</table>
        </div>
    </div>
</div>


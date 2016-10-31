<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><span class="glyphicon glyphicon-list"></span> DETALLE DE INGRESOS</h3>
    </div>
    <div class="panel-body">
        <!--{!!Form::button('NUEVO',['class'=>'btn btn-default', 'id'=>'add'])!!}-->
        <input type="text" id="indice" name="indice" value="0" hidden>
        <div class="table-responsive">
            <table class="tablew" id="ingreso">
    			<thead>
    				<tr>
    					<th >PARTIDA</th>
    					<th >PRODUCTO</th>
    					<th >MEDIDA</th>
    					<th >CANTIDAD</th>
    					<th style="font-size:12px">C.UNIDAD</th>
    					<th style="font-size:12px">C.TOTAL</th>
    				</tr>
    			</thead>
    			<tbody id="tcuerpo">
    				<tr>
    					<td ><select class="partida" name="partida0" id="0"><option value="">-- Partida --</option></select></td>
    					<td ><select class="producto" name="producto0" id="producto0"><option value="">--Producto--</option></select></td>
    					<td ><input type="text" name="unidad0" id="unidad0" disabled></td>
    					<td ><input type="text" name="cantidad0" id="cantidad0" value="0" class="cantidad"></td>
    					<td ><input type="text" name="costou0" id="costou0" value="0" class="costo"></td>
    					<td ><input type="text" name="costot0" id="costot0" class="total" disabled></td>
    				</tr>
    				
    				<tr>
    					<td><select class="partida" name="partida1" id="1"><option value="">-- Partida --</option></select></td>
    					<td><select class="producto" name="producto1" id="producto1"><option value="">--Producto--</option></select></td>
    					<td><input type="text" name="unidad1" id="unidad1" disabled></td>
    					<td><input type="text" name="cantidad1" id="cantidad1" value="0" class="cantidad"></td>
    					<td><input type="text" name="costou1" id="costou1" value="0" class="costo"></td>
    					<td><input type="text" name="costot1" id="costot1" class="total" disabled></td>
    				</tr>
    				
    				<tr>
    					<td><select class="partida" name="partida2" id="2"><option value="">-- Partida --</option></select></td>
    					<td><select class="producto" name="producto2" id="producto2"><option value="">--Producto--</option></select></td>
    					<td><input type="text" name="unidad2" id="unidad2" disabled></td>
    					<td><input type="text" name="cantidad2" id="cantidad2" value="0" class="cantidad"></td>
    					<td><input type="text" name="costou2" id="costou2" value="0" class="costo"></td>
    					<td><input type="text" name="costot2" id="costot2" class="total" disabled></td>
    				</tr>
    				
    				<tr>
    					<td><select class="partida" name="partida3" id="3"><option value="">-- Partida --</option></select></td>
    					<td><select class="producto" name="producto3" id="producto3"><option value="">--Producto--</option></select></td>
    					<td><input type="text" name="unidad3" id="unidad3" disabled></td>
    					<td><input type="text" name="cantidad3" id="cantidad3" value="0" class="cantidad"></td>
    					<td><input type="text" name="costou3" id="costou3" value="0" class="costo"></td>
    					<td><input type="text" name="costot3" id="costot3" class="total" disabled></td>
    				</tr>
    				
    				<tr>
    					<td><select class="partida" name="partida4" id="4"><option value="">-- Partida --</option></select></td>
    					<td><select class="producto" name="producto4" id="producto4"><option value="">--Producto--</option></select></td>
    					<td><input type="text" name="unidad4" id="unidad4" disabled></td>
    					<td><input type="text" name="cantidad4" id="cantidad4" value="0" class="cantidad"></td>
    					<td><input type="text" name="costou4" id="costou4" value="0" class="costo"></td>
    					<td><input type="text" name="costot4" id="costot4" class="total" disabled></td>
    				</tr>
    				
    				<tr>
    					<td><select class="partida" name="partida5" id="5"><option value="">-- Partida --</option></select></td>
    					<td><select class="producto" name="producto5" id="producto4"><option value="">--Producto--</option></select></td>
    					<td><input type="text" name="unidad5" id="unidad5" disabled></td>
    					<td><input type="text" name="cantidad5" id="cantidad5" value="0" class="cantidad"></td>
    					<td><input type="text" name="costou5" id="costou5" value="0" class="costo"></td>
    					<td><input type="text" name="costot5" id="costot5" class="total" disabled></td>
    				</tr>
    				
    				<tr>
    					<td><select class="partida" name="partida6" id="6"><option value="">-- Partida --</option></select></td>
    					<td><select class="producto" name="producto6" id="producto6"><option value="">--Producto--</option></select></td>
    					<td><input type="text" name="unidad6" id="unidad6" disabled></td>
    					<td><input type="text" name="cantidad6" id="cantidad6" value="0" class="cantidad"></td>
    					<td><input type="text" name="costou6" id="costou6" value="0" class="costo"></td>
    					<td><input type="text" name="costot6" id="costot6" class="total" disabled></td>
    				</tr>
    				
    				<tr>
    					<td><select class="partida" name="partida7" id="7"><option value="">-- Partida --</option></select></td>
    					<td><select class="producto" name="producto7" id="producto7"><option value="">--Producto--</option></select></td>
    					<td><input type="text" name="unidad7" id="unidad7" disabled></td>
    					<td><input type="text" name="cantidad" id="cantidad4" value="0" class="cantidad"></td>
    					<td><input type="text" name="costou7" id="costou7" value="0" class="costo"></td>
    					<td><input type="text" name="costot7" id="costot7" class="total" disabled></td>
    				</tr>
    				
    				<tr>
    					<td><select class="partida" name="partida8" id="8"><option value="">-- Partida --</option></select></td>
    					<td><select class="producto" name="producto8" id="producto8"><option value="">--Producto--</option></select></td>
    					<td><input type="text" name="unidad8" id="unidad8" disabled></td>
    					<td><input type="text" name="cantidad8" id="cantidad8" value="0" class="cantidad"></td>
    					<td><input type="text" name="costou8" id="costou8" value="0" class="costo"></td>
    					<td><input type="text" name="costot8" id="costot8" class="total" disabled></td>
    				</tr>
    				
    				<tr>
    					<td><select class="partida" name="partida9" id="9"><option value="">-- Partida --</option></select></td>
    					<td><select class="producto" name="producto9" id="producto9"><option value="">--Producto--</option></select></td>
    					<td><input type="text" name="unidad9" id="unidad9" disabled></td>
    					<td><input type="text" name="cantidad9" id="cantidad9" value="0" class="cantidad"></td>
    					<td><input type="text" name="costou9" id="costou9" value="0" class="costo"></td>
    					<td><input type="text" name="costot9" id="costot9" class="total" disabled></td>
    				</tr>
    				
    				<tr>
    					<td><select class="partida" name="partida10" id="10"><option value="">-- Partida --</option></select></td>
    					<td><select class="producto" name="producto10" id="producto10"><option value="">--Producto--</option></select></td>
    					<td><input type="text" name="unidad10" id="unidad10" disabled></td>
    					<td><input type="text" name="cantidad10" id="cantidad10" value="0" class="cantidad"></td>
    					<td><input type="text" name="costou10" id="costou10" value="0" class="costo"></td>
    					<td><input type="text" name="costot10" id="costot10" class="total" disabled></td>
    				</tr>
    				
    				<tr>
    					<td><select class="partida" name="partida11" id="11"><option value="">-- Partida --</option></select></td>
    					<td><select class="producto" name="producto11" id="producto11"><option value="">--Producto--</option></select></td>
    					<td><input type="text" name="unidad11" id="unidad11" disabled></td>
    					<td><input type="text" name="cantidad11" id="cantidad11" value="0" class="cantidad"></td>
    					<td><input type="text" name="costou11" id="costou11" value="0" class="costo"></td>
    					<td><input type="text" name="costot11" id="costot11" class="total" disabled></td>
    				</tr>
    				
    				<tr>
    					<td><select class="partida" name="partida12" id="12"><option value="">-- Partida --</option></select></td>
    					<td><select class="producto" name="producto12" id="producto12"><option value="">--Producto--</option></select></td>
    					<td><input type="text" name="unidad12" id="unidad12" disabled></td>
    					<td><input type="text" name="cantidad12" id="cantidad12" value="0" class="cantidad"></td>
    					<td><input type="text" name="costou12" id="costou12" value="0" class="costo"></td>
    					<td><input type="text" name="costot12" id="costot12" class="total" disabled></td>
    				</tr>
    				
    				<tr>
    					<td><select class="partida" name="partida13" id="13"><option value="">-- Partida --</option></select></td>
    					<td><select class="producto" name="producto13" id="producto13"><option value="">--Producto--</option></select></td>
    					<td><input type="text" name="unidad13" id="unidad13" disabled></td>
    					<td><input type="text" name="cantidad13" id="cantidad13" value="0" class="cantidad"></td>
    					<td><input type="text" name="costou13" id="costou13" value="0" class="costo"></td>
    					<td><input type="text" name="costot13" id="costot13" class="total" disabled></td>
    				</tr>
    				
    				<tr>
    					<td><select class="partida" name="partida14" id="14"><option value="">-- Partida --</option></select></td>
    					<td><select class="producto" name="producto14" id="producto14"><option value="">--Producto--</option></select></td>
    					<td><input type="text" name="unidad14" id="unidad14" disabled></td>
    					<td><input type="text" name="cantidad14" id="cantidad14" value="0" class="cantidad"></td>
    					<td><input type="text" name="costou14" id="costou14" value="0" class="costo"></td>
    					<td><input type="text" name="costot14" id="costot14" class="total" disabled></td>
    				</tr>
    				
    				<tr>
    					<td><select class="partida" name="partida15" id="15"><option value="">-- Partida --</option></select></td>
    					<td><select class="producto" name="producto15" id="producto15"><option value="">--Producto--</option></select></td>
    					<td><input type="text" name="unidad15" id="unidad15" disabled></td>
    					<td><input type="text" name="cantidad15" id="cantidad15" value="0" class="cantidad"></td>
    					<td><input type="text" name="costou15" id="costou15" value="0" class="costo"></td>
    					<td><input type="text" name="costot15" id="costot15" class="total" disabled></td>
    				</tr>
    				
    				<tr>
    					<td><select class="partida" name="partida16" id="16"><option value="">-- Partida --</option></select></td>
    					<td><select class="producto" name="producto16" id="producto16"><option value="">--Producto--</option></select></td>
    					<td><input type="text" name="unidad16" id="unidad16" disabled></td>
    					<td><input type="text" name="cantidad16" id="cantidad16" value="0" class="cantidad"></td>
    					<td><input type="text" name="costou16" id="costou16" value="0" class="costo"></td>
    					<td><input type="text" name="costot16" id="costot16" class="total" disabled></td>
    				</tr>
    				
    				<tr>
    					<td><select class="partida" name="partida17" id="17"><option value="">-- Partida --</option></select></td>
    					<td><select class="producto" name="producto17" id="producto17"><option value="">--Producto--</option></select></td>
    					<td><input type="text" name="unidad17" id="unidad17" disabled></td>
    					<td><input type="text" name="cantidad17" id="cantidad17" value="0" class="cantidad"></td>
    					<td><input type="text" name="costou17" id="costou17" value="0" class="costo"></td>
    					<td><input type="text" name="costot17" id="costot17" class="total" disabled></td>
    				</tr>
    				
    				<tr>
    					<td><select class="partida" name="partida18" id="18"><option value="">-- Partida --</option></select></td>
    					<td><select class="producto" name="producto18" id="producto18"><option value="">--Producto--</option></select></td>
    					<td><input type="text" name="unidad18" id="unidad18" disabled></td>
    					<td><input type="text" name="cantidad18" id="cantidad18" value="0" class="cantidad"></td>
    					<td><input type="text" name="costou18" id="costou18" value="0" class="costo"></td>
    					<td><input type="text" name="costot18" id="costot18" class="total" disabled></td>
    				</tr>
    				
    				<tr>
    					<td><select class="partida" name="partida19" id="19"><option value="">-- Partida --</option></select></td>
    					<td><select class="producto" name="producto19" id="producto19"><option value="">--Producto--</option></select></td>
    					<td><input type="text" name="unidad19" id="unidad19" disabled></td>
    					<td><input type="text" name="cantidad19" id="cantidad19" value="0" class="cantidad"></td>
    					<td><input type="text" name="costou19" id="costou19" value="0" class="costo"></td>
    					<td><input type="text" name="costot19" id="costot19" class="total" disabled></td>
    				</tr>
    			</tbody>
    		</table>
        </div>
    </div>
</div>


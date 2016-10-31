<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><span class="glyphicon glyphicon-list"></span> DETALLE DE SOLICITUD</h3>
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
    					<th >DISPONIBLE</th>
    					<th >SOLICITADO</th>
    				</tr>
    			</thead>
    			<tbody id="tcuerpo">
    				<tr>
    					<td ><select class="partida" name="partida0" id="0"><option value="">-- Partida --</option></select></td>
    					<td ><select class="productox" name="producto0" id="producto0"><option value="">--Producto--</option></select></td>
    					<td ><input type="text" name="unidad0" id="unidad0" disabled></td>
    					<td ><input type="text" name="disponible0" id="disponible0" readOnly="true"></td>
    					<td ><input type="text" name="solicitado0" id="solicitado0" value="0" class="solicitado"></td>
    					
    				</tr>
    				
    				<tr>
    					<td><select class="partida" name="partida1" id="1"><option value="">-- Partida --</option></select></td>
    					<td><select class="productox" name="producto1" id="producto1"><option value="">--Producto--</option></select></td>
    					<td><input type="text" name="unidad1" id="unidad1" disabled></td>
    					<td ><input type="text" name="disponible1" id="disponible1" readOnly="true"></td>
    					<td><input type="text" name="solicitado1" id="solicitado1" value="0" class="solicitado"></td>
    					
    				</tr>
    				
    				<tr>
    					<td><select class="partida" name="partida2" id="2"><option value="">-- Partida --</option></select></td>
    					<td><select class="productox" name="producto2" id="producto2"><option value="">--Producto--</option></select></td>
    					<td><input type="text" name="unidad2" id="unidad2" disabled></td>
    					<td ><input type="text" name="disponible2" id="disponible2" readOnly="true"></td>
    					<td><input type="text" name="solicitado2" id="solicitado2" value="0" class="solicitado"></td>
    					
    				</tr>
    				
    				<tr>
    					<td><select class="partida" name="partida3" id="3"><option value="">-- Partida --</option></select></td>
    					<td><select class="productox" name="producto3" id="producto3"><option value="">--Producto--</option></select></td>
    					<td><input type="text" name="unidad3" id="unidad3" disabled></td>
    					<td ><input type="text" name="disponible3" id="disponible3" readonly="readonly"></td>
    					<td><input type="text" name="solicitado3" id="solicitado3" value="0" class="solicitado"></td>
    					
    				</tr>
    				
    				<tr>
    					<td><select class="partida" name="partida4" id="4"><option value="">-- Partida --</option></select></td>
    					<td><select class="productox" name="producto4" id="producto4"><option value="">--Producto--</option></select></td>
    					<td><input type="text" name="unidad4" id="unidad4" disabled></td>
    					<td ><input type="text" name="disponible4" id="disponible4" readonly="readonly"></td>
    					<td><input type="text" name="solicitado4" id="solicitado4" value="0" class="solicitado"></td>
    					
    				</tr>

                    <tr>
                        <td><select class="partida" name="partida5" id="5"><option value="">-- Partida --</option></select></td>
                        <td><select class="productox" name="producto5" id="producto5"><option value="">--Producto--</option></select></td>
                        <td><input type="text" name="unidad5" id="unidad5" disabled></td>
                        <td ><input type="text" name="disponible5" id="disponible5" readonly="readonly"></td>
                        <td><input type="text" name="solicitado5" id="solicitado5" value="0" class="solicitado"></td>
                        
                    </tr>

                    <tr>
                        <td><select class="partida" name="partida6" id="6"><option value="">-- Partida --</option></select></td>
                        <td><select class="productox" name="producto6" id="producto6"><option value="">--Producto--</option></select></td>
                        <td><input type="text" name="unidad6" id="unidad6" disabled></td>
                        <td ><input type="text" name="disponible6" id="disponible6" readonly="readonly"></td>
                        <td><input type="text" name="solicitado6" id="solicitado6" value="0" class="solicitado"></td>
                        
                    </tr>

                    <tr>
                        <td><select class="partida" name="partida7" id="7"><option value="">-- Partida --</option></select></td>
                        <td><select class="productox" name="producto7" id="producto7"><option value="">--Producto--</option></select></td>
                        <td><input type="text" name="unidad7" id="unidad7" disabled></td>
                        <td ><input type="text" name="disponible7" id="disponible7" readonly="readonly"></td>
                        <td><input type="text" name="solicitado7" id="solicitado7" value="0" class="solicitado"></td>
                        
                    </tr>

                    <tr>
                        <td><select class="partida" name="partida8" id="8"><option value="">-- Partida --</option></select></td>
                        <td><select class="productox" name="producto8" id="producto8"><option value="">--Producto--</option></select></td>
                        <td><input type="text" name="unidad8" id="unidad8" disabled></td>
                        <td ><input type="text" name="disponible8" id="disponible8" readonly="readonly"></td>
                        <td><input type="text" name="solicitado8" id="solicitado8" value="0" class="solicitado"></td>
                        
                    </tr>

                    <tr>
                        <td><select class="partida" name="partida9" id="9"><option value="">-- Partida --</option></select></td>
                        <td><select class="productox" name="producto9" id="producto9"><option value="">--Producto--</option></select></td>
                        <td><input type="text" name="unidad9" id="unidad9" disabled></td>
                        <td ><input type="text" name="disponible9" id="disponible9" readonly="readonly"></td>
                        <td><input type="text" name="solicitado9" id="solicitado9" value="0" class="solicitado"></td>
                        
                    </tr>
    				
    			</tbody>
    		</table>
        </div>
    </div>
</div>


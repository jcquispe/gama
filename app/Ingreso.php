<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model {

	protected $table = 'ingresos';
	
	protected $fillable = ['cod', 'fecha_ingreso', 'observacion', 'anulado', 'fecha_anulado', 'motivo_anulado', 'user_id', 'inventario_id', 'unidad_id', 'categoria_id', 'proveedor_id', 'factura'];

}

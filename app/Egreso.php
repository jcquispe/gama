<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Egreso extends Model {

	protected $table = 'egresos';
	protected $fillable = ['cod', 'fecha_egreso', 'solicitud_id', 'observacion', 'anulado', 'fecha_anulado', 'user_id', 'inventario_id'];

}

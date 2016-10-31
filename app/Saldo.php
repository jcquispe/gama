<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Saldo extends Model {

	protected $table = 'saldos';
	
	protected $fillable = ['inventario_id', 'producto_id', 'cantidad', 'user_id', 'estado_saldo'];
}

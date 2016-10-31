<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Soldeta extends Model {

	protected $table = 'soldetas';
	
	protected $fillable = ['solicitud_id', 'producto_id', 'cantidad_solicitada', 'anulado', 'cantidad_despachada'];

}

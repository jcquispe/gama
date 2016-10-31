<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Partida extends Model {

	protected $table = 'partidas';
	
	protected $fillable = ['codigo', 'descripcion', 'categoria_id', 'vigente'];

}

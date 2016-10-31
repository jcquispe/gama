<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model {

	protected $table = 'productos';
	
	protected $fillable = ['descripcion', 'unidad', 'partida_cod', 'partida_desc', 'vigente'];

}

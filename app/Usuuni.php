<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuuni extends Model {

	protected $table = 'usuunis';
	
	protected $fillable = ['user_id', 'unidad_id', 'vigente'];

}

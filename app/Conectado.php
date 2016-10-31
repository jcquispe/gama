<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Conectado extends Model {

	protected $table = 'conectados';
	
	protected $fillable = ['ip', 'estado', 'user_id'];

}

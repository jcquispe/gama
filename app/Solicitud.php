<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model {

	protected $table = 'solicituds';
	
	protected $fillable = ['numero', 'fecha_solicitud', 'anulado', 'fecha_anulado', 'motivo_anulado', 'user_id', 'categoria_id', 'estado', 'fecha_atendido'];

}

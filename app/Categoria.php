<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model {

	protected $table = 'categorias';
	
	protected $fillable = ['cat_prog', 'cat_prog_desc', 'fte', 'fte_desc', 'org', 'org_desc', 'vigente'];

}

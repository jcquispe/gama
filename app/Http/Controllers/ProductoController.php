<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Producto;
use App\Ingdeta;
use App\Soldeta;
use Redirect;
use Session;
use Auth;
use Illuminate\Http\Request;

class ProductoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$id = $_GET['id'];
		$unidad = Producto::find($id);
		$in = Ingdeta::where('producto_id',$id)->where('anulado', FALSE)->sum('cantidad');
		$out = Soldeta::where('producto_id',$id)->where('anulado', FALSE)->sum('cantidad_despachada');
		if($in == NULL)
			$in = 0;
		if($out == NULL)
			$out = 0;
		$total = $in - $out;
		$uni = array(
				'medida' => $unidad->unidad,
				'disponible' => $total
			);
		return response()->json($uni);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}

<?php namespace App\Http\Controllers;

use App\Categoria;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Producto;
use App\Partida;
use Redirect;
use Session;
use Auth;
use Illuminate\Http\Request;

class InsumoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(!Auth::user())
			return Redirect::to('/');

		if(Auth::user()->tipo!='almacen' && Auth::user()->tipo!='solicitud'){
			return Redirect::to('logout');
		}
		$insumos = Producto::All();
		return view('insumo.index', compact('insumos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if(!Auth::user())
			return Redirect::to('/');

		if(Auth::user()->tipo!='almacen'){
			return Redirect::to('logout');
		}
		//$categorias = Categoria::where('vigente',TRUE)->orderBy('cat_prog')->get();
		$partidas = Partida::where('vigente', TRUE)->orderBy('codigo')->distinct('codigo')->get(array('codigo', 'descripcion'));

		//echo '<pre>';print_r($partidas);die;
		return view('insumo.create', compact('partidas'));

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		Producto::create([
			'descripcion' => $this->acentos(strtoupper($request['descripcion'])),
			'unidad' => $request['unidad'],
			'partida_cod' => $request['partida'],
			'partida_desc' => $request['descrip'],
			'vigente' => true,
			]);
		
		Session::flash('message', 'Insumo registrado correctamente');
		return Redirect::to('/insumo');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$par = $_GET['id'];
		//$part = Partida::find($par);
		$productos = Producto::where('partida_cod', '=', Partida::find($par)->codigo)->get();
		if($productos){
			$res = array();
			foreach($productos as $pro){
				$aux = array(
					'id' => $pro->id,
					'codigo' => $pro->descripcion
					);
			$res[] = $aux;
			}
			return response()->json($res);
		}
		else{
			return response()->json('');
		}
	}
	
	/*public function medida($id)
	{
		$id = $_GET['id'];
		$unidad = Producto::find($id);
		echo $unidad;die;
		$uni = array(
				'medida' => $unidad->unidad
			);
		return response()->json($uni);
		
	}*/

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
	
	public function acentos($val)
	{
		$res = str_replace(['á','é','í','ó','ú','ñ'],['Á','É','Í','Ó','Ú','Ñ'],$val);
		return $res; 
	}

}

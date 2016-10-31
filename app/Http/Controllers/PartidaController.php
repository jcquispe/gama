<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Partida;
use App\Categoria;
use Redirect;
use Session;
use Auth;
use Illuminate\Http\Request;

class PartidaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(!Auth::user())
			return Redirect::to('/');

		if(Auth::user()->tipo!='admin'){
			return Redirect::to('logout');
		}
		$partidas = Partida::All();
		return view('partida.index', compact('partidas'));
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

		if(Auth::user()->tipo!='admin'){
			return Redirect::to('logout');
		}
		$categorias = Categoria::All();
		return view('partida.create', compact('categorias'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		Partida::create([
			'codigo' => $request['codigo'],
			'descripcion' => $this->acentos(strtoupper($request['descripcion'])),
			'categoria_id' => $request['categoria'],
			'vigente' => true,
			]);
		
		Session::flash('message', 'Partida registrada correctamente');
		return Redirect::to('/partida');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
			$cat = $_GET['id'];
			$partidas = Partida::where('categoria_id', '=', $cat)->get();
			if($partidas){
				$res = array();
				foreach($partidas as $par){
					$aux = array(
						'id' => $par->id,
						'codigo' => $par->codigo,
						'descripcion'=>$par->descripcion
						);
				$res[] = $aux;
				}
				//print_r(json_encode($res));die;
				return response()->json($res);
			}
			else{
				return response()->json('');
			}
		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if(!Auth::user())
			return Redirect::to('/');
		
		if(Auth::user()->tipo!='admin'){
			return Redirect::to('logout');
		}
		$partida = Partida::find($id);
		$categorias = Categoria::All();
		return view('partida.edit',['partida'=>$partida, 'categorias'=>$categorias]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$partida = Partida::find($id);
		$partida->fill($request->all());
		if($request->vigente)
			$partida['vigente'] = true;
		else
			$partida['vigente'] = false;
		$partida->save();
		
		Session::flash('message', 'Partida actualizada correctamente');
		return Redirect::to('/partida');
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

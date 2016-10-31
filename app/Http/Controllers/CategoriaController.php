<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Categoria;
use Redirect;
use Session;
use Auth;
use Illuminate\Http\Request;

class CategoriaController extends Controller {

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
		//$categorias = Categoria::All();
		$categorias = Categoria::where('vigente', '=', true)->get();
		return view('categoria.index', compact('categorias'));
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
		return view('categoria.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		Categoria::create([
			'cat_prog' => $request['cat_prog'],
			'cat_prog_desc' => $this->acentos(strtoupper($request['cat_prog_desc'])),
			'fte' => $request['fte'],
			'fte_desc' => $this->acentos(strtoupper($request['fte_desc'])),
			'org' => $request['org'],
			'org_desc' => $thid->acentos(strtoupper($request['org_desc'])),
			'vigente' => true,
			]);
		
		Session::flash('message', 'Categoría registrada correctamente');
		return Redirect::to('/categoria');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
		$categoria = Categoria::find($id);
		return view('categoria.edit',['categoria'=>$categoria]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$categoria = Categoria::find($id);
		$categoria->fill($request->all());
		if($request->vigente)
			$categoria['vigente'] = true;
		else
			$categoria['vigente'] = false;
		$categoria->save();
		
		Session::flash('message', 'Categoría actualizada correctamente');
		return Redirect::to('/categoria');
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

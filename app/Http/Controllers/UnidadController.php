<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unidad;
use Redirect;
use Session;
use Auth;
use Illuminate\Http\Request;

class UnidadController extends Controller {

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
		$unidads = Unidad::All();
		return view('unidad.index', compact('unidads'));
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
		$unidads = Unidad::All();
		return view('unidad.create', compact('unidads'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		Unidad::create([
			'denominacion' => $request['denominacion'],
			'sigla' => strtoupper($request['sigla']),
			'dependencia' => $request['dependencia'],
			'vigente' => true,
			]);
		
		Session::flash('message', 'Unidad registrada correctamente');
		return Redirect::to('/unidad');
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
		$unidad = Unidad::find($id);
		$unidads = Unidad::All();
		return view('unidad.edit',['unidad'=>$unidad, 'unidads'=>$unidads]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$unidad = Unidad::find($id);
		$unidad->fill($request->all());
		if($request->vigente)
			$unidad['vigente'] = true;
		else
			$unidad['vigente'] = false;
		$unidad->save();
		
		Session::flash('message', 'Unidad actualizada correctamente');
		return Redirect::to('/unidad');
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

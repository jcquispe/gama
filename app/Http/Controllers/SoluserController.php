<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Soluser;
use App\Unidad;
use Illuminate\Http\Request;
use Auth;
use Session;
use Redirect;
class SoluserController extends Controller {

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
		$solusers = Soluser::where('procesado', '=', false)->get();
		return view('soluser.index', compact('solusers'));
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
	public function store(Request $request)
	{
		$usu = Soluser::create([
				'nombre' => $request['nombre'],
				'ci' => $request['ci'].' '.$request['exp'],
				'dependencia' => $request['dependencia'],
				'correo' => $request['email'],
				'procesado' => false,
				]);
		
		Session::flash('message', 'Solicitud procesada');
		return Redirect::to('/');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$soluser = Soluser::find($id);
		$soluser['procesado'] = true;
		$soluser->save();
		
		Session::flash('message-error', 'Solicitud rechazada');
		return Redirect::to('/soluser');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$soluser = Soluser::find($id);
		$soluser['procesado'] = true;
		$soluser->save();
		
		if(!Auth::user())
			return Redirect::to('/');
		
		if(Auth::user()->tipo!='admin'){
			return Redirect::to('logout');
		}
		$unidads = Unidad::All();
		return view('soluser.edit', compact('unidads', 'soluser'));
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

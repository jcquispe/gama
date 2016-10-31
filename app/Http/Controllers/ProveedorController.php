<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Proveedor;
use Redirect;
use Session;
use Auth;
use Illuminate\Http\Request;

class ProveedorController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(!Auth::user())
			return Redirect::to('/');

		if(Auth::user()->tipo!='almacen'){
			return Redirect::to('logout');
		}
		$proveedores = Proveedor::All();
		return view('proveedor.index', compact('proveedores'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('proveedor.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if($request->ajax()){
			Proveedor::create([
			'razon_social' => $this->acentos(strtoupper($request['nom'])),
			'nit' => $request['nit'],
			'telefono' => $request['tel'],
			'correo' => $request['cor'],
			'vigente' => true,
			]);
			return response()->json(["mensaje" => "creado"]);
		}
		else{
			Proveedor::create([
			'razon_social' => $this->acentos(strtoupper($request['razon_social'])),
			'nit' => $request['nit'],
			'telefono' => $request['telefono'],
			'correo' => $request['correo'],
			'vigente' => true,
			]);
		
			Session::flash('message', 'Proveedor registrado correctamente');
			return Redirect::to('/proveedor');
		}
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
		$proveedor = Proveedor::find($id);
		//echo $unidad;die;
		$pro = array(
				'nombre' => $proveedor->razon_social
			);
		return response()->json($pro);
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
		
		if(Auth::user()->tipo!='almacen'){
			return Redirect::to('logout');
		}
		$proveedor = Proveedor::find($id);
		return view('proveedor.edit', compact ('proveedor'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$proveedor = Proveedor::find($id);
		$proveedor->fill($request->all());
		if($request->vigente)
			$proveedor['vigente'] = true;
		else
			$proveedor['vigente'] = false;
		$proveedor->save();
		
		Session::flash('message', 'Proveedor actualizado correctamente');
		return Redirect::to('/proveedor');
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

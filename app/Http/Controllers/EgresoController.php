<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Soldeta;
use App\Solicitud;
use App\Categoria;
use App\Egreso;
use App\Inventario;
use Redirect;
use Session;
use Auth;
use DateTime;
use Illuminate\Http\Request;

class EgresoController extends Controller {

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
		
		$vigente = \DB::table('inventarios')->whereNull('cierre')->select('id')->get();
		if($vigente){
			$vig = $vigente[0]->id;
		}
		else{
			$vig = 0;
		}
		$egresos = \DB::table('egresos as e')
			            ->join('solicituds as s', 's.id', '=', 'e.solicitud_id')
			            ->join('users as u', 'u.id', '=', 'e.user_id')
			            ->join('usuunis as n', 'n.user_id', '=', 'u.id')
			            ->join('unidads as d', 'd.id', '=', 'n.unidad_id')
			            ->join('categorias as c', 'c.id', '=', 's.categoria_id')
			            ->select('e.id', 'e.cod', 'e.fecha_egreso', 's.numero', 's.fecha_solicitud', 'c.cat_prog', 'u.us','d.denominacion', 'e.inventario_id')
			            //->where('e.inventario_id', '=', $vig)
			            ->where('e.anulado',false)
			            ->get();
		//echo '<pre>';print_r($vig);die;
		$inventarios = Inventario::All();
		return view('egreso.index', compact('egresos', 'inventarios', 'vig'));
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
		$vigente = \DB::table('inventarios')->whereNull('cierre')->select('id')->get();
		if($vigente){
			$vig = $vigente[0]->id;
			
			$num = 0;
			//echo ($request['producto'.$num]);die;
			$eg = Egreso::create([
						'cod' => Egreso::All()->max('cod')+1,
						'fecha_egreso' => date('Y-m-d'),
						'solicitud_id' =>$request['solicitud'],
						'observacion' => $this->acentos(strtoupper($request['observacion'])),
						'anulado' => false,
						'fecha_anulado' => date('Y-m-d'),
						'user_id' => Auth::user()->id,
						'inventario_id' => $vig,
						]);
			
			
			while($request['id'.$num]!=null){
				$soldet = Soldeta::find($request['id'.$num]);	
				$soldet['cantidad_despachada'] = $request['despachado'.$num];
				$soldet->save();
				$num++;	
			}

			$soli = Solicitud::find($request['solicitud']);
			$soli->estado = 'ATENDIDO';
			$soli->fecha_atendido = date('Y-m-d H:i:s');
			$soli->save();
			
			Session::flash('message', 'Egreso registrado correctamente');
			return Redirect::to('/egreso/documento?cod='.$eg->id);
		}
		else{
			Session::flash('message', 'No se tiene un inventario activo');
			return Redirect::to('/inventario/create');
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

		if(Auth::user()->tipo!='almacen'){
			return Redirect::to('logout');
		}
		
		$solicitud = Solicitud::find($id);
		$categoria = Categoria::find($solicitud->categoria_id);
		$soldetas = \DB::table('soldetas as s')
					->where('solicitud_id', $id)
					->join('productos as p','p.id', '=', 's.producto_id')
					->select('s.id', 's.cantidad_solicitada', 'p.descripcion', 'p.unidad', 'p.partida_cod as codigo', 'p.partida_desc as desc')
					->get();
		//echo '<pre>';print_r($solicitud->id);die;
		return view('egreso.edit', compact('solicitud', 'categoria', 'soldetas'));
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
	
	public function solicitudes()
	{
		if(!Auth::user())
			return Redirect::to('/');

		if(Auth::user()->tipo!='almacen'){
			return Redirect::to('logout');
		}
		$egresos = \DB::table('egresos')->select('solicitud_id')->get();
		$lista = array();
		foreach($egresos as $egr){
			$lista[] = $egr->solicitud_id;
		}
		//echo '<pre>';print_r($lista);die;
		$solicitudes = \DB::table('solicituds')
			->join('users', 'users.id', '=', 'solicituds.user_id')
			->join('categorias', 'categorias.id', '=', 'solicituds.categoria_id')
            ->select('solicituds.id', 'solicituds.numero', 'solicituds.fecha_solicitud', 'users.us', 'categorias.cat_prog')
        	->where('solicituds.anulado','=',false)
        	->whereNotIn('solicituds.id', $lista)
        	->orderBy('solicituds.id', 'desc')
            ->get();
		return view('egreso.solicitudes', compact('solicitudes'));
	}

	public function documento(){
		//$partidas = Partida::find($id);
		$id = $_GET['cod'];
		$egreso = \DB::table('egresos')->where('egresos.id',$id)
				->join('solicituds', 'solicituds.id', '=', 'egresos.solicitud_id')
				->join('inventarios', 'inventarios.id', '=', 'egresos.inventario_id')
				->join('categorias', 'categorias.id', '=', 'solicituds.categoria_id')
				->select('egresos.id', 'egresos.cod', 'egresos.fecha_egreso', 'egresos.observacion', 'solicituds.id as solid', 'solicituds.numero', 'solicituds.fecha_solicitud', 'inventarios.descripcion', 'categorias.cat_prog', 'categorias.cat_prog_desc')
				->get();

		$solicitud = Solicitud::find($id);
		$detalles = \DB::table('soldetas')->where('soldetas.solicitud_id',$egreso[0]->solid)
				   ->join('productos', 'productos.id','=','soldetas.producto_id')
				   ->select('soldetas.id', 'productos.partida_cod as codigo', 'productos.descripcion', 'productos.unidad', 'soldetas.cantidad_solicitada', 'soldetas.cantidad_despachada')
				   ->get();
		$egreso = $egreso[0];
		//echo'<pre>';print_r($egreso);die;
		return view('egreso.documento', compact('egreso', 'detalles'));
		
	}
	
	public function acentos($val)
	{
		$res = str_replace(['á','é','í','ó','ú','ñ'],['Á','É','Í','Ó','Ú','Ñ'],$val);
		return $res; 
	}

}

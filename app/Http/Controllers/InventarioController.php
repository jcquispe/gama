<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Ingreso;
use App\Ingdeta;
use App\Soldeta;
use App\Saldo;
use App\Inventario;
use App\Producto;
use Redirect;
use Session;
use Auth;
use DateTime;
use Illuminate\Http\Request;

class InventarioController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		/*$vigente = \DB::table('inventarios')->whereNull('cierre')->select('id', 'descripcion', 'inicio', 'cierre')->get();
		if($vigente){
			$vig = $vigente[0]->id;
		}
		else{
			$vig = 0;
		}
		if($vig != 0){
			$ingresos = \DB::table('ingresos')
						->where('inventario_id', $vig)
						->where('anulado', false)
						->select('id')
						->get();
			$toting = 0;
			foreach($ingresos as $ing){
				$ingdetas = \DB::table('ingdetas')
						->where('ingreso_id', $ing->id)
						->select('costo_total')
						->get();
				foreach($ingdetas as $idet){
					$toting = $toting + $idet->costo_total;
				}
			}
			
			$egresos = \DB::table('egresos')
						->where('inventario_id', $vig)
						->where('anulado', false)
						->select('id')
						->get();
			$toting = 0;
			foreach($ingresos as $ing){
				$ingdetas = \DB::table('ingdetas')
						->where('ingreso_id', $ing->id)
						->select('costo_total')
						->get();
				foreach($ingdetas as $idet){
					$toting = $toting + $idet->costo_total;
				}
			}
			//echo $toting;die;
			return view('inventario.index', compact('toting', 'vigente'));	
		}
		else{
			return view('/bienalmacen');	
		}*/

		$inventarios = Inventario::All();
		$inversion = array();
		foreach($inventarios as $inv){
			$toting = 0;
			$ingresos = Ingreso::where('inventario_id',$inv->id)->where('anulado', FALSE)->select('id')->get();
			 
			foreach($ingresos as $ingr){
				$totpar = Ingdeta::where('anulado', FALSE)->where('ingreso_id', $ingr->id)->sum('costo_total');	 
				$toting = $toting + $totpar;   
			}
			$aux['inventario_id'] = $inv->id;
			$aux['total'] = $toting;

			$inversion[] = $aux;
		}


		//echo'<pre>';print_r($inventarios);die;
		return view('inventario.index', compact('inventarios', 'inversion'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('inventario.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//$proding = Ingdeta::where('anulado',FALSE)->groupBy('producto_id')->select('id')->get();

		$proding = Ingdeta::groupBy('producto_id')
					->where('anulado', FALSE)
				    ->selectRaw('sum(cantidad) as cant, producto_id')->get();
				    //->lists('cant','producto_id');

		$prodegr = Soldeta::groupBy('producto_id')
					->where('anulado', FALSE)
					->selectRaw('sum(cantidad_despachada) as desp, producto_id')->get();
					//->lists('desp', 'producto_id');
		
		$prodsal = array();
		$num = 0;
		foreach ($proding as $ping) {
			foreach($prodegr as $pegr){
				$aux = array();
				if($ping->producto_id == $pegr->producto_id){
					
					$aux['producto_id'] = $ping->producto_id;
					$aux['saldo'] = $ping->cant - $pegr->desp;
					$num = $num+1;
				}
				if($aux)
					$prodsal[] = $aux;

			}
		}

		//echo '<pre>'; print_r($prodsal);die;
		$anterior = Inventario::where('cierre', NULL)->get();
		$anterior = $anterior[0];

		
		if($anterior){
			foreach($prodsal as $psal){
				Saldo::create([
					'inventario_id' => $anterior->id,
					'producto_id' => $psal['producto_id'],
					'cantidad' => $psal['saldo'],
					'user_id' => Auth::user()->id,
					'estado_saldo' => 'SALDO'
					]);
			}
			$anterior->cierre = date('Y-m-d H:i:s');
			$anterior->save();
		}
			
		Inventario::create([
			'descripcion' => $this->acentos(strtoupper($request['descripcion'])),
			'inicio' => date('Y-m-d H:i:s')
			]);
		
		Session::flash('message', 'Inventario registrado correctamente');
		return Redirect::to('/inventario');
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		if(!Auth::user())
			return Redirect::to('/');

		if(Auth::user()->tipo!='almacen'){
			return Redirect::to('logout');
		}
		
		$productos = Producto::where('vigente','=',true)->select('id', 'descripcion', 'unidad')->get();
		$disponible = array();
		foreach($productos as $prod){
			$total = Ingdeta::where('producto_id',$prod->id)->where('anulado', false)->sum('cantidad')-
					 Soldeta::where('producto_id',$prod->id)->where('anulado', false)->sum('cantidad_despachada');
			//echo $total;
			$fila = [$prod->id, $prod->descripcion, $prod->unidad, (string)$total];
			$disponible[] = $fila;
		}
		
		return view('inventario.show', compact('disponible'));
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

	public function acentos($val)
	{
		$res = str_replace(['á','é','í','ó','ú','ñ'],['Á','É','Í','Ó','Ú','Ñ'],$val);
		return $res; 
	}

}

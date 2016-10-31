<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Unidad;
use App\Usuuni;
use App\Soluser;
use Redirect;
use Session;
use Auth;
use Illuminate\Http\Request;

class UsuarioController extends Controller {

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
		//$users = User::All();
		$users = \DB::table('users')
	            ->join('usuunis', 'users.id', '=', 'usuunis.user_id')
	            ->join('unidads', 'unidads.id', '=', 'usuunis.unidad_id')
	            ->select('users.id', 'users.paterno', 'users.materno', 'users.nombre', 'users.us', 'users.ci',
	            	     'users.exp', 'users.tipo', 'users.vigente','unidads.sigla')
	            ->get();
		return view('usuario.index', compact('users'));
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
		return view('usuario.create', compact('unidads'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$hay = User::where('ci', '=', $request['ci'])->get();
		$nick = User::where('us', '=', $request['us'])->get();
		if(sizeof($hay) > 0){
			//echo 'hay CI';die;
			Session::flash('message-error', 'El numero de CI que intenta registrar ya existe');
		}
		elseif(sizeof($nick) > 0){
			//echo 'hay US';die;
			Session::flash('message-error', 'El nombre de usuario que intenta registrar ya existe');
		}
		else{
			//echo 'exito';die;
			$usu = User::create([
				'nombre' => $request['nombre'],
				'paterno' => $request['paterno'],
				'materno' => $request['materno'],
				'ci' => $request['ci'],
				'exp' => $request['exp'],
				'us' => $request['us'],
				'password' => $request['password'],
				'tipo' =>$request['tipo'],
				'vigente' => true,
				])->id;
		
		Usuuni::create([
			'user_id' => $usu,
			'unidad_id'=> $request['unidad_id'],
			'vigente' => true,
			]);
		
		Session::flash('message', 'Usuario registrado correctamente');
		}
		return Redirect::to('/usuario');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
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
		$unidads = Unidad::All();
		$user = \DB::table('users')
            ->join('usuunis', 'users.id', '=', 'usuunis.user_id')
            ->select('users.id', 'users.paterno', 'users.materno', 'users.nombre', 'users.us', 'users.password', 'users.ci',
            	     'users.exp', 'users.tipo', 'users.vigente', 'usuunis.unidad_id', 'usuunis.id as uid')
        	->where('users.id','=',$id)
            ->get();
		return view('usuario.edit',['user'=>$user[0], 'unidads'=>$unidads]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$user = User::find($id);
		$usuuni = Usuuni::find($request->uid);

		$user->fill($request->all());
		if($request->vigente)
			$user['vigente'] = true;
		else
			$user['vigente'] = false;
		$user->save();
		$usuuni['unidad_id'] = $request->unidad;
		$usuuni->save();
		Session::flash('message', 'Usuario actualizado correctamente');
		return Redirect::to('/usuario');
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
	
	public function campass(Request $request)
	{
		$user = User::find($request['use']);
		
		if($request['nuevap'] == $request['validarp']){

			if (\Hash::check($request['actualp'], $user->password)) {
				$user['password'] = $request['nuevap'];
				$user->save();
				echo 'bien';
				Session::flash('message', 'Contraseña cambiada correctamente');
				return Redirect::to('/ajustes');		
			}
			else{
				Session::flash('message-error', 'La contraseña vigente no coicide, intentelo nuevamente');
				return Redirect::to('/ajustes');
			}
		}
		else{
			Session::flash('message-error', 'La contraseña no coiciden, intentelo nuevamente');
			return Redirect::to('/ajustes');
		}
	
	}

}

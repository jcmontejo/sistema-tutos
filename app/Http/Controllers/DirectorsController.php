<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateDirectorsRequest;
use App\Models\Directors;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use App\User;
use App\Models\Finalreport;
use Hash;
use App\Role;
use Alert;
use Mail;

class DirectorsController extends AppBaseController
{	
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the Post.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$query = Directors::query();
		$columns = Schema::getColumnListing('$TABLE_NAME$');
		$attributes = array();

		foreach($columns as $attribute){
			if($request[$attribute] == true)
			{
				$query->where($attribute, $request[$attribute]);
				$attributes[$attribute] =  $request[$attribute];
			}else{
				$attributes[$attribute] =  null;
			}
		};

		$directors = $query->get();

		return view('directors.index')
		->with('directors', $directors)
		->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Directors.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('directors.create');
	}

	/**
	 * Store a newly created Directors in storage.
	 *
	 * @param CreateDirectorsRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateDirectorsRequest $request)
	{
		$input = $request->all();
		/**/
		$name = $request->input('name');
		$email = $request->input('email');
        // generar un password
		$random_password = str_random(8);
		$datos['name'] = $name;
		$datos['email'] = $email;
		$datos['password'] = Hash::make($random_password);
		/*Mail*/
		$data['name'] = $name;
		$data['pass'] = $random_password;
		$data['email'] = $email;
		/*Crear usuario de alumno*/
		$usuario = User::create($datos);
		$id = $usuario->id;
		$user = User::find($id);
		$student = Role::find(1);
		$user->attachRole($student);
		$input['user_id'] = $id;
		$input['password'] = $random_password;
		/**/
		$directors = Directors::create($input);

		Alert::success('coordinador dado de alta exitosamente!')->persistent("Cerrar");

		return redirect(route('directors.index'));
	}

	/**
	 * Display the specified Directors.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$directors = Directors::find($id);

		if(empty($directors))
		{
			Alert::error('Coordinador no encontrado en nuestros registros!')->persistent("Cerrar");
			return redirect(route('directors.index'));
		}

		return view('directors.show')->with('directors', $directors);
	}

	/**
	 * Show the form for editing the specified Directors.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$directors = Directors::find($id);

		if(empty($directors))
		{
			Alert::error('Coordinador no encontrado en nuestros registros!')->persistent("Cerrar");
			return redirect(route('directors.index'));
		}

		return view('directors.edit')->with('directors', $directors);
	}

	/**
	 * Update the specified Directors in storage.
	 *
	 * @param  int    $id
	 * @param CreateDirectorsRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateDirectorsRequest $request)
	{
		/** @var Directors $directors */
		$directors = Directors::find($id);

		if(empty($directors))
		{
			Alert::success('Coordinador no encontrado en nuestros registros!')->persistent("Cerrar");
			return redirect(route('directors.index'));
		}

		$directors->fill($request->all());
		$directors->save();

		Alert::info('Coordinador actualizado exitosamente!')->persistent("Cerrar");

		return redirect(route('directors.index'));
	}

	/**
	 * Remove the specified Directors from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Directors $directors */
		$directors = Directors::find($id);

		/*Delete User*/
		$user = $directors->user;
		$user->delete();
		if(empty($directors))
		{
			Alert::success('Coordinador no encontrado en nuestros registros!')->persistent("Cerrar");
			return redirect(route('directors.index'));
		}

		$directors->delete();

		Alert::info('Coordinador eliminado de nuestros registros exitosamente!')->persistent("Cerrar");

		return redirect(route('directors.index'));
	}

	public function finalreport($id)
	{
		$file = Finalreport::find($id);
		dd($file);
	}

}

<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateTutoringRequest;
use App\Models\Tutoring;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use Alert;
use DB;

class TutoringController extends AppBaseController
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
		$query = Tutoring::query();
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

		$tutorings = $query->get();

		return view('tutorings.index')
		->with('tutorings', $tutorings)
		->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Tutoring.
	 *
	 * @return Response
	 */
	public function create()
	{	
		$period = DB::table('periods')->where('status', '=', 'Activo')->first();
		return view('tutorings.create')
		->with('period', $period);
	}

	/**
	 * Store a newly created Tutoring in storage.
	 *
	 * @param CreateTutoringRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateTutoringRequest $request)
	{
		$user = Auth::user();
		$coordinador = $user->director;	
		$input = $request->all();
		$input['directors_id'] = $coordinador->id;

		$tutoring = Tutoring::create($input);

		Alert::success('Programa de Tutorías creado exitosamente!')->persistent("Cerrar");

		return redirect(route('tutorings.index'));
	}

	/**
	 * Display the specified Tutoring.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$tutoring = Tutoring::find($id);

		if(empty($tutoring))
		{
			Alert::error('Programa de Tutorías no encontrado en nuestros registros!');
			return redirect(route('tutorings.index'));
		}

		return view('tutorings.show')->with('tutoring', $tutoring);
	}

	/**
	 * Show the form for editing the specified Tutoring.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tutoring = Tutoring::find($id);
		$period = DB::table('periods')->where('status', '=', 'Activo')->first();
		if(empty($tutoring))
		{
			Alert::error('Programa de Tutorías no encontrado en nuestros registros!');
			return redirect(route('tutorings.index'));
		}

		return view('tutorings.edit')
		->with('tutoring', $tutoring)
		->with('period', $period);
	}

	/**
	 * Update the specified Tutoring in storage.
	 *
	 * @param  int    $id
	 * @param CreateTutoringRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateTutoringRequest $request)
	{
		/** @var Tutoring $tutoring */
		$tutoring = Tutoring::find($id);

		if(empty($tutoring))
		{
			Alert::error('Programa de Tutorías no encontrado en nuestros registros!');
			return redirect(route('tutorings.index'));
		}

		$tutoring->fill($request->all());
		$tutoring->save();

		Alert::info('Programa de Tutorías actualizado exitosamente!');

		return redirect(route('tutorings.index'));
	}

	/**
	 * Remove the specified Tutoring from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Tutoring $tutoring */
		$tutoring = Tutoring::find($id);

		if(empty($tutoring))
		{
			Alert::error('Programa de Tutorías no encontrado en nuestros registros!');
			return redirect(route('tutorings.index'));
		}

		$tutoring->delete();

		Alert::info('Programa de Tutorías eliminado exitosamente!');

		return redirect(route('tutorings.index'));
	}
}

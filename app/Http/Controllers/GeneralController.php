<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateGeneralRequest;
use App\Models\General;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use Auth;
use Alert;
use DB;

class GeneralController extends AppBaseController
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
		$query = General::query();
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

		$generals = $query->get();

		return view('generals.index')
		->with('generals', $generals)
		->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new General.
	 *
	 * @return Response
	 */
	public function create()
	{	$director = Auth::user()->director;
		$period = DB::table('periods')->where('status', '=', 'Activo')->first();
		return view('generals.create')
		->with('director', $director)
		->with('period', $period);
	}

	/**
	 * Store a newly created General in storage.
	 *
	 * @param CreateGeneralRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateGeneralRequest $request)
	{	
		$user = Auth::user();
		$coordinador = $user->director;	
		$input = $request->all();
		$input['directors_id'] = $coordinador->id;
		$general = General::create($input);

		//Flash::message('Programa General creado exitosamente.');
		Alert::success('Programa General creado exitosamente!')->persistent("Cerrar");
		return redirect(route('generals.index'));
	}

	/**
	 * Display the specified General.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$general = General::find($id);

		if(empty($general))
		{
			//Flash::error('General not found');
			Alert::error('Programa General no encontrado en nuestros registros!');
			return redirect(route('generals.index'));
		}

		return view('generals.show')->with('general', $general);
	}

	/**
	 * Show the form for editing the specified General.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$general = General::find($id);
		$director = Auth::user()->director;
		$period = DB::table('periods')->where('status', '=', 'Activo')->first();
		if(empty($general))
		{
			Alert::error('Programa General no encontrado en nuestros registros!');
			return redirect(route('generals.index'));
		}

		return view('generals.edit')
		->with('general', $general)
		->with('director', $director)
		->with('period', $period);
	}

	/**
	 * Update the specified General in storage.
	 *
	 * @param  int    $id
	 * @param CreateGeneralRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateGeneralRequest $request)
	{
		/** @var General $general */
		$general = General::find($id);

		if(empty($general))
		{
			Alert::error('Programa General no encontrado en nuestros registros!');
			return redirect(route('generals.index'));
		}

		$general->fill($request->all());
		$general->save();

		Alert::info('Programa General actualizado exitosamente!');

		return redirect(route('generals.index'));
	}

	/**
	 * Remove the specified General from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var General $general */
		$general = General::find($id);

		if(empty($general))
		{
			Alert::error('Programa General no encontrado en nuestros registros!');
			return redirect(route('generals.index'));
		}

		$general->delete();

		//Flash::message('General deleted successfully.');
		Alert::info('Programa General eliminado exitosamente!');
		return redirect(route('generals.index'));
	}
}

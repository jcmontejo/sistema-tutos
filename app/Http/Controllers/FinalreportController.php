<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateFinalreportRequest;
use App\Models\Finalreport;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use Auth;
use Alert;
use DB;

class FinalreportController extends AppBaseController
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
		$query = Finalreport::query();
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

		$finalreports = $query->get();

		return view('finalreports.index')
		->with('finalreports', $finalreports)
		->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Finalreport.
	 *
	 * @return Response
	 */
	public function create()
	{	
		$period = DB::table('periods')->where('status', '=', 'Activo')->first();
		return view('finalreports.create')
		->with('period', $period);
	}

	/**
	 * Store a newly created Finalreport in storage.
	 *
	 * @param CreateFinalreportRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateFinalreportRequest $request)
	{	
		$user = Auth::user();
		$coordinador = $user->director;	
		$input = $request->all();
		$input['directors_id'] = $coordinador->id;
		$finalreport = Finalreport::create($input);

		Alert::success('Informe Final de Tutorias creado exitosamente!')->persistent("Cerrar");

		return redirect(route('finalreports.index'));
	}

	/**
	 * Display the specified Finalreport.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$finalreport = Finalreport::find($id);

		if(empty($finalreport))
		{
			Alert::error('Informe no encontrado en nuestros registros!');
			return redirect(route('finalreports.index'));
		}

		return view('finalreports.show')->with('finalreport', $finalreport);
	}

	/**
	 * Show the form for editing the specified Finalreport.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$finalreport = Finalreport::find($id);
		$period = DB::table('periods')->where('status', '=', 'Activo')->first();

		if(empty($finalreport))
		{
			Alert::error('Informe no encontrado en nuestros registros!');
			return redirect(route('finalreports.index'));
		}

		return view('finalreports.edit')
		->with('finalreport', $finalreport)
		->with('period', $period);
	}

	/**
	 * Update the specified Finalreport in storage.
	 *
	 * @param  int    $id
	 * @param CreateFinalreportRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateFinalreportRequest $request)
	{
		/** @var Finalreport $finalreport */
		$finalreport = Finalreport::find($id);

		if(empty($finalreport))
		{
			Alert::error('Informe no encontrado en nuestros registros!');
			return redirect(route('finalreports.index'));
		}

		$finalreport->fill($request->all());
		$finalreport->save();

		Alert::info('Informe actualizado exitosamente!');

		return redirect(route('finalreports.index'));
	}

	/**
	 * Remove the specified Finalreport from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Finalreport $finalreport */
		$finalreport = Finalreport::find($id);

		if(empty($finalreport))
		{
			Alert::error('Informe no encontrado en nuestros registros!');
			return redirect(route('finalreports.index'));
		}

		$finalreport->delete();

		Alert::info('Informe eliminado exitosamente!');

		return redirect(route('finalreports.index'));
	}
}

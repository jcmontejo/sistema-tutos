<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateIndividualRequest;
use App\Models\Individual;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use Alert;
use DB;
use Auth;

class IndividualController extends AppBaseController
{

	/**
	 * Display a listing of the Post.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$query = Individual::query();
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

        $individuals = $query->get();

        return view('individuals.index')
            ->with('individuals', $individuals)
            ->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Individual.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('individuals.create');
	}

	/**
	 * Store a newly created Individual in storage.
	 *
	 * @param CreateIndividualRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateIndividualRequest $request)
	{	
		$user = Auth::user();
		$tutor = $user->tutor;
		$docent = $tutor->fullname;
		$period = DB::table('periods')->where('status', '=', 'Activo')->first();
		$name_period = $period->name;
		$general = DB::table('generals')->where('school_cycle', '=', $name_period)->first();

        $input = $request->all();
        $input['docent'] = $docent;
        $input['objective_general'] = $general->general_objective;
		$individual = Individual::create($input);

		Alert::success('Programa Individual creado exitosamente!')->persistent("Cerrar");

		return redirect(route('individuals.index'));

	}

	/**
	 * Display the specified Individual.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$individual = Individual::find($id);

		if(empty($individual))
		{
			Flash::error('Individual not found');
			return redirect(route('individuals.index'));
		}

		return view('individuals.show')->with('individual', $individual);
	}

	/**
	 * Show the form for editing the specified Individual.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$individual = Individual::find($id);

		if(empty($individual))
		{
			Flash::error('Individual not found');
			return redirect(route('individuals.index'));
		}

		return view('individuals.edit')->with('individual', $individual);
	}

	/**
	 * Update the specified Individual in storage.
	 *
	 * @param  int    $id
	 * @param CreateIndividualRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateIndividualRequest $request)
	{
		/** @var Individual $individual */
		$individual = Individual::find($id);

		if(empty($individual))
		{
			Flash::error('Individual not found');
			return redirect(route('individuals.index'));
		}

		$individual->fill($request->all());
		$individual->save();

		Flash::message('Individual updated successfully.');

		return redirect(route('individuals.index'));
	}

	/**
	 * Remove the specified Individual from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Individual $individual */
		$individual = Individual::find($id);

		if(empty($individual))
		{
			Flash::error('Individual not found');
			return redirect(route('individuals.index'));
		}

		$individual->delete();

		Flash::message('Individual deleted successfully.');

		return redirect(route('individuals.index'));
	}
}

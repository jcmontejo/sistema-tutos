<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateExerciseRequest;
use App\Models\Exercise;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use Alert;

class ExerciseController extends AppBaseController
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
		$query = Exercise::query();
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

        $exercises = $query->get();

        return view('exercises.index')
            ->with('exercises', $exercises)
            ->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Exercise.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('exercises.create');
	}

	/**
	 * Store a newly created Exercise in storage.
	 *
	 * @param CreateExerciseRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateExerciseRequest $request)
	{
        $input = $request->all();

		$exercise = Exercise::create($input);

		Alert::success('Actividad agregada exitosamente!')->persistent("Cerrar");

		 return redirect()->back();
	}

	/**
	 * Display the specified Exercise.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$exercise = Exercise::find($id);

		if(empty($exercise))
		{
			Flash::error('Exercise not found');
			return redirect(route('exercises.index'));
		}

		return view('exercises.show')->with('exercise', $exercise);
	}

	/**
	 * Show the form for editing the specified Exercise.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$exercise = Exercise::find($id);

		if(empty($exercise))
		{
			Flash::error('Exercise not found');
			return redirect(route('exercises.index'));
		}

		return view('exercises.edit')->with('exercise', $exercise);
	}

	/**
	 * Update the specified Exercise in storage.
	 *
	 * @param  int    $id
	 * @param CreateExerciseRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateExerciseRequest $request)
	{
		/** @var Exercise $exercise */
		$exercise = Exercise::find($id);

		if(empty($exercise))
		{
			Flash::error('Exercise not found');
			return redirect(route('exercises.index'));
		}

		$exercise->fill($request->all());
		$exercise->save();

		Flash::message('Exercise updated successfully.');

		return redirect(route('exercises.index'));
	}

	/**
	 * Remove the specified Exercise from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Exercise $exercise */
		$exercise = Exercise::find($id);

		if(empty($exercise))
		{
			Flash::error('Exercise not found');
			return redirect(route('exercises.index'));
		}

		$exercise->delete();

		Flash::message('Exercise deleted successfully.');

		return redirect(route('exercises.index'));
	}
}

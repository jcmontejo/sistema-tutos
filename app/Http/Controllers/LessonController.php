<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateLessonRequest;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use Alert;
use Auth;

class LessonController extends AppBaseController
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
		$query = Lesson::query();
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

        $lessons = $query->get();

        return view('lessons.index')
            ->with('lessons', $lessons)
            ->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Lesson.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('lessons.create');
	}

	/**
	 * Store a newly created Lesson in storage.
	 *
	 * @param CreateLessonRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateLessonRequest $request)
	{
        $input = $request->all();
        $user = Auth::user();
        $tutor = $user->tutor;
        $input['tutors_id'] = $tutor->id;
		$lesson = Lesson::create($input);

		Alert::success('Sesión guardada exitosamente!')->persistent("Cerrar");

		return redirect(route('lessons.index'));
	}

	/**
	 * Display the specified Lesson.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$lesson = Lesson::find($id);

		if(empty($lesson))
		{
			Alert::error('Sesión no encontrada en nuestros registros!')->persistent("Cerrar");
			return redirect(route('lessons.index'));
		}

		return view('lessons.show')->with('lesson', $lesson);
	}

	/**
	 * Show the form for editing the specified Lesson.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$lesson = Lesson::find($id);

		if(empty($lesson))
		{
			Alert::error('Sesión no encontrada en nuestros registros!')->persistent("Cerrar");
			return redirect(route('lessons.index'));
		}

		return view('lessons.edit')->with('lesson', $lesson);
	}

	/**
	 * Update the specified Lesson in storage.
	 *
	 * @param  int    $id
	 * @param CreateLessonRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateLessonRequest $request)
	{
		/** @var Lesson $lesson */
		$lesson = Lesson::find($id);

		if(empty($lesson))
		{
			Alert::error('Sesión no encontrada en nuestros registros!')->persistent("Cerrar");
			return redirect(route('lessons.index'));
		}

		$lesson->fill($request->all());
		$lesson->save();

		Alert::info('Sesión actualizada exitosamente!')->persistent("Cerrar");

		return redirect(route('lessons.index'));
	}

	/**
	 * Remove the specified Lesson from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Lesson $lesson */
		$lesson = Lesson::find($id);

		if(empty($lesson))
		{
			Alert::error('Sesión no encontrada en nuestros registros!')->persistent("Cerrar");
			return redirect(route('lessons.index'));
		}

		$lesson->delete();

		Alert::info('Sesión eliminada exitosamente!')->persistent("Cerrar");

		return redirect(route('lessons.index'));
	}
}

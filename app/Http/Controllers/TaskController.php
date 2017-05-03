<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use Alert;

class TaskController extends AppBaseController
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
		$query = Task::query();
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

        $tasks = $query->get();

        return view('tasks.index')
            ->with('tasks', $tasks)
            ->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Task.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('tasks.create');
	}

	/**
	 * Store a newly created Task in storage.
	 *
	 * @param CreateTaskRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateTaskRequest $request)
	{
        $input = $request->all();

		$task = Task::create($input);

		Alert::success('Tarea enviada exitosamente!')->persistent("Cerrar");

		return redirect()->back();
	}

	/**
	 * Display the specified Task.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$task = Task::find($id);

		if(empty($task))
		{
			Alert::error('Tarea no encontrada en nuestros registros!')->persistent("Cerrar");
			return redirect(route('tasks.index'));
		}

		return view('tasks.show')->with('task', $task);
	}

	/**
	 * Show the form for editing the specified Task.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$task = Task::find($id);

		if(empty($task))
		{
			Alert::error('Tarea no encontrada en nuestros registros!')->persistent("Cerrar");
			return redirect(route('tasks.index'));
		}

		return view('tasks.edit')->with('task', $task);
	}

	/**
	 * Update the specified Task in storage.
	 *
	 * @param  int    $id
	 * @param CreateTaskRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateTaskRequest $request)
	{
		/** @var Task $task */
		$task = Task::find($id);

		if(empty($task))
		{
			Alert::error('Tarea no encontrada en nuestros registros!')->persistent("Cerrar");
			return redirect(route('tasks.index'));
		}

		$task->fill($request->all());
		$task->save();

		Alert::info('Tarea actualizada exitosamente!')->persistent("Cerrar");


		return redirect(route('tasks.index'));
	}

	/**
	 * Remove the specified Task from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Task $task */
		$task = Task::find($id);

		if(empty($task))
		{
			Alert::error('Tarea no encontrada en nuestros registros!')->persistent("Cerrar");
			return redirect(route('tasks.index'));
		}

		$task->delete();

		Alert::info('Tarea eliminada exitosamente!')->persistent("Cerrar");

		return redirect(route('tasks.index'));
	}
}

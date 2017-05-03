<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateTutorsRequest;
use App\Models\Tutors;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use Hash;
use App\User;
use App\Role;
use App\Models\Student;
use App\Models\Activity;
use Alert;
use Mail;
use Auth;

class TutorsController extends AppBaseController
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
		$query = Tutors::query();
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

		$tutors = $query->get();

		return view('tutors.index')
		->with('tutors', $tutors)
		->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Tutors.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('tutors.create');
	}

	/**
	 * Store a newly created Tutors in storage.
	 *
	 * @param CreateTutorsRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateTutorsRequest $request)
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
		$student = Role::find(2);
		$user->attachRole($student);
		$input['user_id'] = $id;
		$input['password'] = $random_password;
		/**/
		$tutors = Tutors::create($input);

		Mail::send('mails.welcome', ['data' => $data], function($mail) use($data){
                $mail->subject('Te proporcionamos las credeciales de acceso al sistema');
                $mail->to($data['email'], $data['name'], $data['pass']);
            });

		Alert::success('Tutor dado de alta exitosamente!')->persistent("Cerrar");

		return redirect(route('tutors.index'));
	}

	/**
	 * Display the specified Tutors.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$tutors = Tutors::find($id);

		if(empty($tutors))
		{
			Alert::error('Tutor no encontrado en nuestros registros!')->persistent("Cerrar");
			return redirect(route('tutors.index'));
		}

		return view('tutors.show')->with('tutors', $tutors);
	}

	/**
	 * Show the form for editing the specified Tutors.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tutors = Tutors::find($id);

		if(empty($tutors))
		{
			Alert::error('Tutor no encontrado en nuestros registros!')->persistent("Cerrar");
			return redirect(route('tutors.index'));
		}

		return view('tutors.edit')->with('tutors', $tutors);
	}

	/**
	 * Update the specified Tutors in storage.
	 *
	 * @param  int    $id
	 * @param CreateTutorsRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateTutorsRequest $request)
	{
		/** @var Tutors $tutors */
		$tutors = Tutors::find($id);

		if(empty($tutors))
		{
			Alert::error('Tutor no encontrado en nuestros registros!')->persistent("Cerrar");
			return redirect(route('tutors.index'));
		}

		$tutors->fill($request->all());
		$tutors->save();

		Alert::info('Tutor actualizado exitosamente!')->persistent("Cerrar");

		return redirect(route('tutors.index'));
	}

	/**
	 * Remove the specified Tutors from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Tutors $tutors */
		$tutors = Tutors::find($id);

		/*Delete User*/
		$user = $tutors->user;
		$user->delete();
		/*End*/

		if(empty($tutors))
		{
			Alert::error('Tutor no encontrado en nuestros registros!')->persistent("Cerrar");
			return redirect(route('tutors.index'));
		}

		$tutors->delete();

		Alert::info('Tutor eliminado de nuestros registros!')->persistent("Cerrar");

		return redirect(route('tutors.index'));
	}

	public function tutor($id)
	{
		$tutor = Tutors::find($id);
		$students = $tutor->students;

		return view('tutors.view-students',array('user' => Auth::user()))
		->with('students', $students);
	}

	public function addtask($id)
	{
		$student = Student::find($id);
		return view('tasks.create',array('user' => Auth::user()))
		->with('student', $student);
	}

	public function tasksend($id)
	{
		$student = Student::find($id);
		$tasks = $student->tasks;
		return view('tutors.view-tasks-sends')
		->with('tasks', $tasks);
	}

	public function addcomment($id)
	{
		$student = Student::find($id);
		return view('comments.create',array('user' => Auth::user()))
		->with('student', $student);
	}

	public function exercise($id)
	{
		$tutor = Tutors::find($id);
		$students = $tutor->students;

		return view('tutors.view-students-to-exercise',array('user' => Auth::user()))
		->with('students', $students);
	}

	public function addexercise($id)
	{
		$student = Student::find($id);
		$activities = Activity::pluck('title', 'id');
		return view('exercises.create',array('user' => Auth::user()))
		->with('student', $student)
		->with('activities', $activities);
	}

	public function viewlesson($id)
	{
		$tutor = Tutors::find($id);
		$lessons = $tutor->lessons;
		return view('tutors.view-lessons')
		->with('lessons', $lessons)
		->with('tutor', $tutor);
	}
}

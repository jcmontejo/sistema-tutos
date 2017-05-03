<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateStudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use Hash;
use App\User;
use App\Role;
use App\Models\Tutors;
use App\Models\Task;
use Alert;
use Mail;
use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


class StudentController extends AppBaseController
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
		
		$query = Student::query();
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

		$students = $query->get();

		return view('students.index')
		->with('students', $students)
		->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Student.
	 *
	 * @return Response
	 */
	public function create()
	{	
		$tutors = Tutors::pluck('name', 'id');
		return view('students.create')
		->with('tutors', $tutors);
	}

	/**
	 * Store a newly created Student in storage.
	 *
	 * @param CreateStudentRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateStudentRequest $request)
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
		$student = Role::find(3);
		$user->attachRole($student);
		$input['user_id'] = $id;
		$input['password'] = $random_password;
		/**/
		$student = Student::create($input);

		Mail::send('mails.welcome', ['data' => $data], function($mail) use($data){
			$mail->subject('Te proporcionamos las credeciales de acceso al sistema');
			$mail->to($data['email'], $data['name'], $data['pass']);
		});


		Alert::success('Alumno dado de alta exitosamente!')->persistent("Cerrar");

		return redirect(route('students.index'));
	}

	/**
	 * Display the specified Student.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$student = Student::find($id);

		if(empty($student))
		{
			Alert::error('Alumno no encontrado en nuestros registros!')->persistent("Cerrar");
			return redirect(route('students.index'));
		}

		return view('students.show')->with('student', $student);
	}

	/**
	 * Show the form for editing the specified Student.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$student = Student::find($id);
		$tutors = Tutors::pluck('name', 'id');
		if(empty($student))
		{
			Alert::error('Alumno no encontrado en nuestros registros!')->persistent("Cerrar");
			return redirect(route('students.index'));
		}

		return view('students.edit')->with('student', $student)->with('tutors', $tutors);
	}

	/**
	 * Update the specified Student in storage.
	 *
	 * @param  int    $id
	 * @param CreateStudentRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateStudentRequest $request)
	{
		/** @var Student $student */
		$student = Student::find($id);

		if(empty($student))
		{
			Alert::error('Alumno no encontrado en nuestros registros!')->persistent("Cerrar");
			return redirect(route('students.index'));
		}

		$student->fill($request->all());
		$student->save();

		Alert::info('Alumno actualizado exitosamente!')->persistent("Cerrar");

		return redirect(route('students.index'));
	}

	/**
	 * Remove the specified Student from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Student $student */
		$student = Student::find($id);

		/*Delete User*/
		$user = $student->user;
		$user->delete();
		/*End*/

		if(empty($student))
		{
			Alert::error('Alumno no encontrado en nuestros registros!')->persistent("Cerrar");
			return redirect(route('students.index'));
		}

		$student->delete();

		Alert::info('Alumno eliminado de nuestros registros!')->persistent("Cerrar");

		return redirect(route('students.index'));
	}

	public function getMunicipalities(Request $request, $id)
	{
		if($request->ajax()){
			$municipalities = Municipality::municipios($id); 
			return response()->json($municipalities);
		}
	}

	public function viewtasks($id)
	{
		$student = Student::find($id);
		$tasks = $student->tasks;

		return view('students.view-tasks',array('user' => Auth::user()))
		->with('tasks', $tasks);
	}

	public function sendtask($id)
	{
		$task = Task::find($id);
		return view('students.upload',array('user' => Auth::user()))
		->with('task', $task);
	}

	public function upload(Request $request)
	{			
		$user = Auth::user();
		$student = $user->student;
		$tasks = $student->tasks;
		$task_id = $request->input('task_id');
		$task = Task::find($task_id);
		      $destinationPath = 'uploads/tasks'; // upload path
		      $extension = Input::file('task')->getClientOriginalExtension(); // getting task extension
		      $fileName = rand(11111,99999).'.'.$extension; // renameing task
		      Input::file('task')->move($destinationPath, $fileName); // uploading file to given path
		      if ($task) {
		      	if (empty($task->file)) {
		      		$task->file = $fileName;
		      		$task->save();
		      		Alert::success('Tarea enviada exitosamente!')->persistent("Cerrar");
		      		return Redirect::back();
		      	}else{
		      		// sending back with message
		      		Alert::error('Ya has subido tu tarea anteriormente, ya no puedes modificarla!')->persistent("Cerrar");
		      		return Redirect::back();
		      	}
		      	
		      }
		      
		  }

		}

<?php

Route::get('/', function () {
   $user = Auth::user();
   if (empty($user)) {
    return view('welcome');
}else{
    return view('home');
}
});

Route::auth();

Route::get('/profile', 'Usercontroller@profile');

Route::post('/profile', 'Usercontroller@update_avatar');

Route::get('/home', 'HomeController@index');

/*Routes for Student*/
Route::resource('students', 'StudentController');

Route::get('students/{id}/delete', [
    'as' => 'students.delete',
    'uses' => 'StudentController@destroy',
    ]);

Route::get('view-tasks/{id}', [
    'as' => 'view.tasks',
    'uses' => 'StudentController@viewtasks',
    ]);

Route::get('send-task/{id}',  [
    'as' => 'send.task',
    'uses' => 'StudentController@sendtask',
    ]);

Route::post('apply/upload', 'StudentController@upload');

Route::get('view-news/', function() {
    $news = DB::select('select * from news where status = ?', ['Activo']);
    return view('news.view-news')
    ->with('news', $news);
});

Route::get('view-activities/', function() {
    $activities = DB::select('select * from activities where status = ?', ['Activo']);
    return view('probando')
    ->with('activities', $activities);
});

Route::get('view-activities-suggested/', function() {
    return view('activities-suggested');
});

Route::get('advances/{id}', function($id) {
    $user = App\User::find($id);
    $student = $user->student;
    $tasks = $student->tasks;
    $comments = $student->comments;
    return view('students.advances')
    ->with('tasks', $tasks)
    ->with('comments', $comments);
});
/*End*/

/*Routes for Tutor*/
Route::resource('tutors', 'TutorsController');

Route::get('tutors/{id}/delete', [
    'as' => 'tutors.delete',
    'uses' => 'TutorsController@destroy',
    ]);

Route::get('view-students/{id}',[
    'as' => 'students.tutor',
    'uses' => 'TutorsController@tutor',
    ]);

Route::get('exercise/{id}',[
    'as' => 'students.exercise',
    'uses' => 'TutorsController@exercise',
    ]);

Route::get('add-task/{id}',[
    'as' => 'add.task',
    'uses' => 'TutorsController@addtask',
    ]);

Route::get('add-exercise/{id}',[
    'as' => 'add.addexercise',
    'uses' => 'TutorsController@addexercise',
    ]);

Route::get('view-tasks-send/{id}',[
    'as' => 'view.tasksend',
    'uses' => 'TutorsController@tasksend',
    ]);

Route::get('add-comment/{id}',[
    'as' => 'add.comment',
    'uses' => 'TutorsController@addcomment',
    ]);

Route::get('users/{id}',[
    'as' => 'view.lessons',
    'uses' => 'TutorsController@viewlesson',
    ]);
/*End*/

/*Routes director*/
Route::resource('directors', 'DirectorsController');

Route::get('directors/{id}/delete', [
    'as' => 'directors.delete',
    'uses' => 'DirectorsController@destroy',
    ]);

Route::get('download-final-report/{id}', [
    'as' => 'download.finalreport',
    'uses' => 'DirectorsController@finalreport',
    ]);

Route::get('/finalreport/{id}', function($id){
    $data = App\Models\Finalreport::find($id);
    $pdf = PDF::loadView('pdf.finalreport', array('data' => $data))->setPaper('a4', 'landscape');
    return $pdf->download('Informe Final de Tutorías.pdf');
    //return view('testpdf')->with('data', $data);
});

Route::get('/generalreport/{id}', function($id){
    $data = App\Models\General::find($id);
    $items = DB::select('select * from items where general_id = ?', [$id]);
    $pdf = PDF::loadView('pdf.general', array('data' => $data, 'items' => $items))->setPaper('a4', 'landscape');
    return $pdf->download('Programa General de Tutorías.pdf');
    //return view('testpdf')->with('data', $data);
});

Route::get('/individualreport/{id}', function($id){
    $data = App\Models\Individual::find($id);
    $items = DB::select('select * from itemindividuals where individual_id = ?', [$id]);
    $pdf = PDF::loadView('pdf.individual', array('data' => $data, 'items' => $items))->setPaper('a4', 'landscape');
    return $pdf->download('Programa Individual de Tutorías.pdf');
    //return view('testpdf')->with('data', $data);
});

Route::get('/tutorialreport/{id}', function($id){
    $data = App\Models\Tutorialreport::find($id);
    $paper_size = array(0,0,360,360);
    $pdf = PDF::loadView('testpdf', array('data' => $data))->setPaper('a4','landscape');
    return $pdf->download('Programa General de Tutorías.pdf');
    //return view('testpdf')->with('data', $data);
});

Route::get('tutoring/{id}', function($id) {
    $data = App\Models\Tutoring::find($id);
    $items = App\Models\Student::all();
    $pdf = PDF::loadView('pdf.tutoring', array('data' => $data, 'items' => $items))->setPaper('a4', 'landscape');
    return $pdf->download('Programa de Tutorías.pdf');
});

Route::get('conformation/{id}', function($id) {
    $data = App\Models\Conformation::find($id);
    $pdf = PDF::loadView('pdf.conformation', array('data' => $data))->setPaper('a4');
    return $pdf->download('Acta de Conformación.pdf');
});

Route::get('/testpdf', function() {
    $pdf = PDF::loadView('probando')->setPaper('a4', 'landscape');
    return $pdf->download('probando.pdf');
});

Route::get('test/', function() {
    $student = App\Models\Student::find(15);
    
});

Route::get('activate/{id}/news', [
    'as' => 'activate.news',
    'uses' => 'NewsController@activate',
    ]);

Route::get('desactivate/{id}/news', [
    'as' => 'desactivate.news',
    'uses' => 'NewsController@desactivate',
    ]);

Route::get('activate/{id}/activity', [
    'as' => 'activate.activity',
    'uses' => 'ActivityController@activate',
    ]);

Route::get('desactivate/{id}/activity', [
    'as' => 'desactivate.activity',
    'uses' => 'ActivityController@desactivate',
    ]);
/*End*/
Route::get('/roles', function() {
    $owner = new App\Role();
    $owner->name         = 'coordinador';
    $owner->display_name = 'Usuario Coordinador'; // optional
    $owner->description  = 'Coordinador del sistema de tutorias con permisos de crear'; // optional
    $owner->save();

    $admin = new App\Role();
    $admin->name         = 'tutor';
    $admin->display_name = 'Usuario Tutor'; // optional
    $admin->description  = 'Tutor de alumnos del sistema de tutorias'; // optional
    $admin->save();

    $admin = new App\Role();
    $admin->name         = 'alumno';
    $admin->display_name = 'Usuario Alumno'; // optional
    $admin->description  = 'Alumno que recibe tutorias'; // optional
    $admin->save();
});

/*Obtener municipios de estados*/
Route::get('students/ajax-municipality/{id}','StudentController@getMunicipalities');


Route::resource('generals', 'GeneralController');

Route::get('generals/{id}/delete', [
    'as' => 'generals.delete',
    'uses' => 'GeneralController@destroy',
    ]);


Route::resource('items', 'ItemController');

Route::get('items/{id}/delete', [
    'as' => 'items.delete',
    'uses' => 'ItemController@destroy',
    ]);

Route::get('add-item/{id}', [
    'as' => 'add.item',
    'uses' => 'TutorialsController@add',
    ]);

Route::get('add-itemindividual/{id}', [
    'as' => 'add.itemindividual',
    'uses' => 'TutorialsController@additemindividual',
    ]);

Route::resource('finalreports', 'FinalreportController');

Route::get('finalreports/{id}/delete', [
    'as' => 'finalreports.delete',
    'uses' => 'FinalreportController@destroy',
    ]);


Route::resource('tutorings', 'TutoringController');

Route::get('tutorings/{id}/delete', [
    'as' => 'tutorings.delete',
    'uses' => 'TutoringController@destroy',
    ]);


Route::resource('periods', 'PeriodController');

Route::get('periods/{id}/delete', [
    'as' => 'periods.delete',
    'uses' => 'PeriodController@destroy',
    ]);

Route::get('activate/{id}/period', [
    'as' => 'activate.period',
    'uses' => 'PeriodController@activate',
    ]);

Route::get('desactivate/{id}/period', [
    'as' => 'desactivate.period',
    'uses' => 'PeriodController@desactivate',
    ]);


Route::resource('tasks', 'TaskController');

Route::get('tasks/{id}/delete', [
    'as' => 'tasks.delete',
    'uses' => 'TaskController@destroy',
    ]);


Route::resource('conformations', 'ConformationController');

Route::get('conformations/{id}/delete', [
    'as' => 'conformations.delete',
    'uses' => 'ConformationController@destroy',
    ]);


Route::resource('news', 'NewsController');

Route::get('news/{id}/delete', [
    'as' => 'news.delete',
    'uses' => 'NewsController@destroy',
    ]);


Route::resource('activities', 'ActivityController');

Route::get('activities/{id}/delete', [
    'as' => 'activities.delete',
    'uses' => 'ActivityController@destroy',
    ]);


Route::resource('tutorialreports', 'TutorialreportController');

Route::get('tutorialreports/{id}/delete', [
    'as' => 'tutorialreports.delete',
    'uses' => 'TutorialreportController@destroy',
    ]);


Route::resource('comments', 'CommentController');

Route::get('comments/{id}/delete', [
    'as' => 'comments.delete',
    'uses' => 'CommentController@destroy',
    ]);

Route::get('updatepassword', function() {
    return view('update');
});

Route::post('change', 'TutorialsController@change');

Route::get('pass', function() {
    $user = App\User::find(11);
    $user->password = Hash::make('secret');
    $user->save();
    echo "Updated";
});

Route::resource('exercises', 'ExerciseController');

Route::get('exercises/{id}/delete', [
    'as' => 'exercises.delete',
    'uses' => 'ExerciseController@destroy',
    ]);


Route::resource('individuals', 'IndividualController');

Route::get('individuals/{id}/delete', [
    'as' => 'individuals.delete',
    'uses' => 'IndividualController@destroy',
    ]);


Route::resource('itemindividuals', 'ItemindividualController');

Route::get('itemindividuals/{id}/delete', [
    'as' => 'itemindividuals.delete',
    'uses' => 'ItemindividualController@destroy',
    ]);


Route::resource('lessons', 'LessonController');

Route::get('lessons/{id}/delete', [
    'as' => 'lessons.delete',
    'uses' => 'LessonController@destroy',
    ]);

Route::get('view-lessons', function(){
    $user = Auth::user();
    $tutor = $user->tutor;
    $lessons = $tutor->lessons;

    $pdf = PDF::loadView('pdf.lessons', array('lessons' => $lessons))->setPaper('a4');
    return $pdf->download('calendario de sesiones.pdf');

});



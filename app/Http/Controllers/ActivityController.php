<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateActivityRequest;
use App\Models\Activity;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use Alert;
use DB;
use Image;

class ActivityController extends AppBaseController
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
		$query = Activity::query();
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

        $activities = $query->get();

        return view('activities.index')
            ->with('activities', $activities)
            ->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Activity.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('activities.create');
	}

	/**
	 * Store a newly created Activity in storage.
	 *
	 * @param CreateActivityRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateActivityRequest $request)
	{	
		/*Handle the user upload avatar*/
		if ($request->hasFile('image')) {
			$image = $request->file('image');
			$filename = time() . '.' . $image->getClientOriginalExtension();
			Image::make($image)->resize(500,200)->save(public_path('/uploads/activities/' . $filename));

		}
        $input = $request->all();
        $input['image'] = $filename;

		$activity = Activity::create($input);

		Alert::success('Actividad creada exitosamente!')->persistent("Cerrar");

		return redirect(route('activities.index'));
	}

	/**
	 * Display the specified Activity.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$activity = Activity::find($id);

		if(empty($activity))
		{
			Alert::error('Actividad no encontrada en nuestros registros!');
			return redirect(route('activities.index'));
		}

		return view('activities.show')->with('activity', $activity);
	}

	/**
	 * Show the form for editing the specified Activity.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$activity = Activity::find($id);

		if(empty($activity))
		{
			Alert::error('Actividad no encontrada en nuestros registros!');
			return redirect(route('activities.index'));
		}

		return view('activities.edit')->with('activity', $activity);
	}

	/**
	 * Update the specified Activity in storage.
	 *
	 * @param  int    $id
	 * @param CreateActivityRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateActivityRequest $request)
	{
		/** @var Activity $activity */
		$activity = Activity::find($id);

		if(empty($activity))
		{
			Alert::error('Actividad no encontrada en nuestros registros!');
			return redirect(route('activities.index'));
		}

		$activity->fill($request->all());
		$activity->save();

		Alert::info('Actividad actualizada exitosamente!');

		return redirect(route('activities.index'));
	}

	/**
	 * Remove the specified Activity from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Activity $activity */
		$activity = Activity::find($id);

		if(empty($activity))
		{
			Alert::error('Actividad no encontrada en nuestros registros!');
			return redirect(route('activities.index'));
		}

		$activity->delete();

		Alert::info('Actividad actualizada exitosamente!');

		return redirect(route('activities.index'));
	}


	public function activate($id)
	{	
		$activate = 'Activo';
		$activity = Activity::find($id);
		if ($activity) {
			$activity->status = $activate;
			$activity->save();
		}
		Alert::success('Actividad activada exitosamente!')->persistent("Cerrar");

		return redirect(route('activities.index'));
	}

	public function desactivate($id)
	{	
		$desactivate = 'Inactivo';
		$activity = Activity::find($id);
		if ($activity) {
			$activity->status = $desactivate;
			$activity->save();
		}
		Alert::success('Actividad desactivada exitosamente!')->persistent("Cerrar");

		return redirect(route('activities.index'));
	}
}

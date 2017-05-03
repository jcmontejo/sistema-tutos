<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateTutorialreportRequest;
use App\Models\Tutorialreport;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use Alert;
use DB;

class TutorialreportController extends AppBaseController
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
		$query = Tutorialreport::query();
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

        $tutorialreports = $query->get();

        return view('tutorialreports.index')
            ->with('tutorialreports', $tutorialreports)
            ->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Tutorialreport.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('tutorialreports.create');
	}

	/**
	 * Store a newly created Tutorialreport in storage.
	 *
	 * @param CreateTutorialreportRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateTutorialreportRequest $request)
	{
        $input = $request->all();

		$tutorialreport = Tutorialreport::create($input);

		Alert::success('Informe del programa de tutorías creado exitosamente!')->persistent("Cerrar");

		return redirect(route('tutorialreports.index'));
	}

	/**
	 * Display the specified Tutorialreport.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$tutorialreport = Tutorialreport::find($id);

		if(empty($tutorialreport))
		{
			Alert::error('Informe no encontrado en nuestros registros!')->persistent("Cerrar");
			return redirect(route('tutorialreports.index'));
		}

		return view('tutorialreports.show')->with('tutorialreport', $tutorialreport);
	}

	/**
	 * Show the form for editing the specified Tutorialreport.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tutorialreport = Tutorialreport::find($id);

		if(empty($tutorialreport))
		{
			Alert::error('Informe no encontrado en nuestros registros!')->persistent("Cerrar");
			return redirect(route('tutorialreports.index'));
		}

		return view('tutorialreports.edit')->with('tutorialreport', $tutorialreport);
	}

	/**
	 * Update the specified Tutorialreport in storage.
	 *
	 * @param  int    $id
	 * @param CreateTutorialreportRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateTutorialreportRequest $request)
	{
		/** @var Tutorialreport $tutorialreport */
		$tutorialreport = Tutorialreport::find($id);

		if(empty($tutorialreport))
		{
			Alert::error('Informe no encontrado en nuestros registros!')->persistent("Cerrar");
			return redirect(route('tutorialreports.index'));
		}

		$tutorialreport->fill($request->all());
		$tutorialreport->save();

		Alert::info('Informe actualizado exitosamente');

		return redirect(route('tutorialreports.index'));
	}

	/**
	 * Remove the specified Tutorialreport from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Tutorialreport $tutorialreport */
		$tutorialreport = Tutorialreport::find($id);

		if(empty($tutorialreport))
		{
			Alert::error('Informe no encontrado en nuestros registros!')->persistent("Cerrar");
			return redirect(route('tutorialreports.index'));
		}

		$tutorialreport->delete();

		Alert::info('Informe eliminado exitosamente');

		return redirect(route('tutorialreports.index'));
	}
}

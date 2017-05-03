<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateConformationRequest;
use App\Models\Conformation;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use Alert;

class ConformationController extends AppBaseController
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
		$query = Conformation::query();
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

        $conformations = $query->get();

        return view('conformations.index')
            ->with('conformations', $conformations)
            ->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Conformation.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('conformations.create');
	}

	/**
	 * Store a newly created Conformation in storage.
	 *
	 * @param CreateConformationRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateConformationRequest $request)
	{
        $input = $request->all();

		$conformation = Conformation::create($input);

		Alert::success('Acta de Conformación creada exitosamente!')->persistent("Cerrar");

		return redirect(route('conformations.index'));
	}

	/**
	 * Display the specified Conformation.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$conformation = Conformation::find($id);

		if(empty($conformation))
		{
			Alert::error('Acta de Conformación no encontrada en nuestros registros!');
			return redirect(route('conformations.index'));
		}

		return view('conformations.show')->with('conformation', $conformation);
	}

	/**
	 * Show the form for editing the specified Conformation.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$conformation = Conformation::find($id);

		if(empty($conformation))
		{
			Alert::error('Acta de Conformación no encontrada en nuestros registros!');
			return redirect(route('conformations.index'));
		}

		return view('conformations.edit')->with('conformation', $conformation);
	}

	/**
	 * Update the specified Conformation in storage.
	 *
	 * @param  int    $id
	 * @param CreateConformationRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateConformationRequest $request)
	{
		/** @var Conformation $conformation */
		$conformation = Conformation::find($id);

		if(empty($conformation))
		{
			Alert::error('Acta de Conformación no encontrada en nuestros registros!');
			return redirect(route('conformations.index'));
		}

		$conformation->fill($request->all());
		$conformation->save();

		Alert::info('Acta de Conformación no actualizada exitosamente!');

		return redirect(route('conformations.index'));
	}

	/**
	 * Remove the specified Conformation from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Conformation $conformation */
		$conformation = Conformation::find($id);

		if(empty($conformation))
		{
			Alert::error('Acta de Conformación no encontrada en nuestros registros!');
			return redirect(route('conformations.index'));
		}

		$conformation->delete();

		Alert::info('Acta de Conformación eliminada de nuestros registros!');

		return redirect(route('conformations.index'));
	}
}

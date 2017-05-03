<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateItemindividualRequest;
use App\Models\Itemindividual;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use Alert;
use DB;

class ItemindividualController extends AppBaseController
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
		$query = Itemindividual::query();
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

        $itemindividuals = $query->get();

        return view('itemindividuals.index')
            ->with('itemindividuals', $itemindividuals)
            ->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Itemindividual.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('itemindividuals.create');
	}

	/**
	 * Store a newly created Itemindividual in storage.
	 *
	 * @param CreateItemindividualRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateItemindividualRequest $request)
	{
        $input = $request->all();

		$itemindividual = Itemindividual::create($input);

		Alert::success('Elemento agregado exitosamente!')->persistent("Cerrar");

		return redirect(route('itemindividuals.index'));
	}

	/**
	 * Display the specified Itemindividual.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$itemindividual = Itemindividual::find($id);

		if(empty($itemindividual))
		{
			Flash::error('Itemindividual not found');
			return redirect(route('itemindividuals.index'));
		}

		return view('itemindividuals.show')->with('itemindividual', $itemindividual);
	}

	/**
	 * Show the form for editing the specified Itemindividual.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$itemindividual = Itemindividual::find($id);

		if(empty($itemindividual))
		{
			Flash::error('Itemindividual not found');
			return redirect(route('itemindividuals.index'));
		}

		return view('itemindividuals.edit')->with('itemindividual', $itemindividual);
	}

	/**
	 * Update the specified Itemindividual in storage.
	 *
	 * @param  int    $id
	 * @param CreateItemindividualRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateItemindividualRequest $request)
	{
		/** @var Itemindividual $itemindividual */
		$itemindividual = Itemindividual::find($id);

		if(empty($itemindividual))
		{
			Flash::error('Itemindividual not found');
			return redirect(route('itemindividuals.index'));
		}

		$itemindividual->fill($request->all());
		$itemindividual->save();

		Flash::message('Itemindividual updated successfully.');

		return redirect(route('itemindividuals.index'));
	}

	/**
	 * Remove the specified Itemindividual from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Itemindividual $itemindividual */
		$itemindividual = Itemindividual::find($id);

		if(empty($itemindividual))
		{
			Flash::error('Itemindividual not found');
			return redirect(route('itemindividuals.index'));
		}

		$itemindividual->delete();

		Flash::message('Itemindividual deleted successfully.');

		return redirect(route('itemindividuals.index'));
	}
}

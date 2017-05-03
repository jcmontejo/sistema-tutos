<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateItemRequest;
use App\Models\Item;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;

class ItemController extends AppBaseController
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
		$query = Item::query();
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

		$items = $query->get();

		return view('items.index')
		->with('items', $items)
		->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Item.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('items.create');
	}

	/**
	 * Store a newly created Item in storage.
	 *
	 * @param CreateItemRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateItemRequest $request)
	{
		$input = $request->all();

		$item = Item::create($input);

		Flash::message('Item saved successfully.');

		return redirect(route('items.index'));
	}

	/**
	 * Display the specified Item.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$item = Item::find($id);

		if(empty($item))
		{
			Flash::error('Item not found');
			return redirect(route('items.index'));
		}

		return view('items.show')->with('item', $item);
	}

	/**
	 * Show the form for editing the specified Item.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$item = Item::find($id);

		if(empty($item))
		{
			Flash::error('Item not found');
			return redirect(route('items.index'));
		}

		return view('items.edit')->with('item', $item);
	}

	/**
	 * Update the specified Item in storage.
	 *
	 * @param  int    $id
	 * @param CreateItemRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateItemRequest $request)
	{
		/** @var Item $item */
		$item = Item::find($id);

		if(empty($item))
		{
			Flash::error('Item not found');
			return redirect(route('items.index'));
		}

		$item->fill($request->all());
		$item->save();

		Flash::message('Item updated successfully.');

		return redirect(route('items.index'));
	}

	/**
	 * Remove the specified Item from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Item $item */
		$item = Item::find($id);

		if(empty($item))
		{
			Flash::error('Item not found');
			return redirect(route('items.index'));
		}

		$item->delete();

		Flash::message('Item deleted successfully.');

		return redirect(route('items.index'));
	}
}

<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Item;
use App\Http\Requests\ItemRequest;
use \Auth, \Redirect, \Validator, \Input, \Session;
use Illuminate\Http\Request;

class ItemController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Auth::check())
		{
			$items = Item::all();
			return view('item.index')->with('item', $items);
		} 
		else
		{
			return Redirect::to('/auth/login');
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if (Auth::check())
		{
			return view('item.create');
		} 
		else
		{
			return Redirect::to('/auth/login');
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ItemRequest $request)
	{
		if (Auth::check())
		{
		    $items = new Item;
            $items->upc_ean_isbn = Input::get('upc_ean_isbn');
            $items->item_name = Input::get('item_name');
            $items->size = Input::get('size');
            $items->description = Input::get('description');
            $items->cost_price = Input::get('cost_price');
            $items->selling_price = Input::get('selling_price');
            $items->quantity = Input::get('quantity');
            $items->save();
            // process avatar
            $image = $request->file('avatar');
			if(!empty($image)) {
				$avatarName = 'item' . $items->id . '.' . 
				$request->file('avatar')->getClientOriginalExtension();

				$request->file('avatar')->move(
				base_path() . '/public/images/items/', $avatarName
				);

				$itemAvatar = Item::find($items->id);
				$itemAvatar->avatar = $avatarName;
	            $itemAvatar->save();
        	}
            Session::flash('message', 'You have successfully added item');
            return Redirect::to('items');
	    }
    	else
		{
			return Redirect::to('/auth/login');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if (Auth::check())
		{
			$items = Item::find($id);
	        return view('item.edit')
	            ->with('item', $items);
        }
        else
		{
			return Redirect::to('/auth/login');
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(ItemRequest $request, $id)
	{
		if (Auth::check())
		{
            $items = Item::find($id);
            $items->upc_ean_isbn = Input::get('upc_ean_isbn');
            $items->item_name = Input::get('item_name');
            $items->size = Input::get('size');
            $items->description = Input::get('description');
            $items->cost_price = Input::get('cost_price');
            $items->selling_price = Input::get('selling_price');
            $items->quantity = Input::get('quantity');
            $items->save();
            // process avatar
            $image = $request->file('avatar');
			if(!empty($image)) {
				$avatarName = 'item' . $id . '.' . 
				$request->file('avatar')->getClientOriginalExtension();

				$request->file('avatar')->move(
				base_path() . '/public/images/items/', $avatarName
				);

				$itemAvatar = Item::find($id);
				$itemAvatar->avatar = $avatarName;
	            $itemAvatar->save();
        	}
            Session::flash('message', 'You have successfully updated item');
            return Redirect::to('items');
		}
		else
		{
			return Redirect::to('/auth/login');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if (Auth::check())
		{
			$items = Item::find($id);
	        $items->delete();

	        Session::flash('message', 'You have successfully deleted item');
	        return Redirect::to('items');
		}
		else
		{
			return Redirect::to('/auth/login');
		}
	}

	public function inventory($id)
	{
		if (Auth::check())
		{
			$items = Item::find($id);
			return view('item.inventory')
	            ->with('item', $items);
		}
		else
		{
			return Redirect::to('/auth/login');
		}
	}

}

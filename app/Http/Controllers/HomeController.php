<?php namespace App\Http\Controllers;

use App\Item, App\Customer, App\Sale;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$items = Item::count();
		$customers = Customer::count();
		$sales = Sale::count();
		return view('home')
			->with('items', $items)
			->with('customers', $customers)
			->with('sales', $sales);
	}

}

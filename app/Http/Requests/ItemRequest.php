<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use \Response;
class ItemRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		$image = $this->avatar;
		if(empty($image))
			return true;
		else 
			return false;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'item_name' => 'required',
			'cost_price' => 'required',
			'selling_price' => 'required',
			'avatar' => 'mimes:jpeg,bmp,png'
		];
	}

	public function forbiddenResponse()
    {
        return Response::make('Sorry!',403);
    }

}

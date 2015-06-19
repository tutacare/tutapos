<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use \Response;
class SupplierRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'company_name' => 'required',
			'email' => 'email',
			'avatar' => 'mimes:jpeg,bmp,png'
		];
	}

	public function forbiddenResponse()
    {
        return Response::make('Sorry!',403);
    }

    public function messages()
    {
        return [
            'avatar.mimes' => 'Not a valid file type. Valid types include jpeg, bmp and png.'
        ];
    }

}

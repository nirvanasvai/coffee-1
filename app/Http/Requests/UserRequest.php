<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
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
			'name' => 'required|string|max:255',
			'email' => [
				'required',
				'string',
				'email',
				'max:255',
			],
			'role'=>'required',
			'password' => 'nullable|string|min:6|confirmed',
			'confirm_password' => ['same:password'],
		];
    }
    
    public function messages()
	{
		return [
			
			'password.confirmed' => 'Пароли не совпадают',
			'confirm_password.same' => 'Пароли не совпадают',
			'role.required'=>'Выберите роль'
		];
	}
}

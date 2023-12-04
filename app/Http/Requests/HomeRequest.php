<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeRequest extends FormRequest
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
        $rules = [
            'email' => 'required|email',
            'name' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required_with:password|same:password'
        ];

        // if (!$this->routeIs('admin')) {
        //     unset($rules['name']);
        //     unset($rules['confirmPassword']);
        // }
        // if (!$this->routeIs('user')) {
        //     unset($rules['name']);
        //     unset($rules['confirmPassword']);
        // }

        return $rules;

    }
        /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [];
    }
}


	// if($request->is('/admin-reg')) {
		// 	$this->userAdmin();
		// }elseif($request->is('/user-reg')) {
		// 	$this->userAdmin();
		// }

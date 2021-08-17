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
            //
            'name'=>'required|string',
            'username'=>'required|string',
            'email'=>'required|email|unique:users',
            'roles'=>'required',
            'is_active'=>'required',
        ];
    }

    public function messages(){
        return[
            'email.required'=> 'E-mail is required',
            'name.required' => 'Name is required',
            'username.required' => 'Username is required',
            'is_active.required' => 'Status is required',
        ];
    }
}

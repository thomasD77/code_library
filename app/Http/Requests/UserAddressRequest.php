<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAddressRequest extends FormRequest
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
            'street'=>'required|string',
            'number'=>'required|integer',
            'postbox'=>'required|integer',
            'city'=>'required',
            'country'=>'required',
        ];
    }

    public function messages(){
        return[
            'street.required'=> 'Street is required',
            'number.required' => 'Number is required',
            'postbox.required' => 'Postbox is required',
            'city.required' => 'City is required',
            'country.required' => 'Country is required',
        ];
    }
}

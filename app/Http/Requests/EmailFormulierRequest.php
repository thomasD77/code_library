<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailFormulierRequest extends FormRequest
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
            'email'=>'required|email',
            'body'=>'required',
            'subject'=>'required',
        ];
    }

    public function messages(){
        return[
            'name.required' => 'Name is required',
            'email.required'=> 'E-mail is required',
            'body.required' => 'Message is required',
            'subject.required' => 'Subject is required',
        ];
    }
}

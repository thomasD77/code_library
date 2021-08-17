<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsletterRequest extends FormRequest
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
            'title'=>'required',
            'body'=>'required',
            'photo_id' => 'required'
        ];
    }

    public function messages(){
        return[
            'title.required'=> 'The Title is required',
            'photo_id.required' => 'Photo is required',
            'body.required' => 'The Description is required',
        ];
    }
}

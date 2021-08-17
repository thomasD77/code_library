<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostEditRequest extends FormRequest
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
            'postcategory_id'=>'required',
            'body'=>'required',
        ];
    }

    public function messages(){
        return[
            'title.required'=> 'The Title is required',
            'postcategory_id.required' => 'The Category is required',
            'body.required' => 'The Description is required',
        ];
    }
}

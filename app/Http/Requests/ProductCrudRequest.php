<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCrudRequest extends FormRequest
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
            'productcategories'=>'required',
            'brand_id'=>'required',
            'body'=>'required',
            'long_description'=>'required',
            'tec_sheet'=>'required',
        ];
    }

    public function messages(){
        return[
            'name.required'=> 'Name is required',
            'productcategories.required'=> 'Category is required',
            'brand_id.required'=> 'Brand is required',
            'body.required'=> 'Description is required',
            'long_description.required'=> 'Long description is required',
            'tec_sheet.required'=> 'Tec Sheet is required',
            'tag_id.required'=> 'Tag is required',
        ];
    }
}

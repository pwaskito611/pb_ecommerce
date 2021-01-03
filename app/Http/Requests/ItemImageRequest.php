<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemImageRequest extends FormRequest
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
            //'image' => 'image|dimensions:ratio=4/5|required',
            'id' => 'numeric|required',
            'image' => 'image|required',
        ];

       
    }

  
}

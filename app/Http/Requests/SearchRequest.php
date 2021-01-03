<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
            'search' => 'max:50',
            'category' => 'max:50',
            'price' => 'in:0-99999999999,0-100,100-500,1000-10000,10000-20000,20000-9999999',
            'orderby' => 'in:Default,LowToHigh,HighToLow,Newness,Popular,Rating',
        ];
    }
}

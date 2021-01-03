<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'id' => 'numeric',
            'title' => 'string|required',
            'on_sell' => 'in:0,1|required',
            'price' => 'integer|required',
            'information' => 'string|required',
            'description' => 'string|required',
            'category' => 'string|required',
            'discount' => 'numeric|required|min:0|max:100',
            'color-1' => 'in:red',
            'color-2' => 'in:orange',
            'color-3' => 'in:yellow',
            'color-4' => 'in:green',
            'color-5' => 'in:blue',
            'color-6' => 'in:purple',
            'color-7' => 'in:pink',
            'color-8' => 'in:black',
            'color-9' => 'in:white',
        ];
    }
}

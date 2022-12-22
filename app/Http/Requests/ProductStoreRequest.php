<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' =>['required','string'],
            'slug' =>['required','string'],
            'image' =>['required','image'],
            'category_id' =>['required','integer'],
            'quantity' =>['required','string'],
            'cost_of_good' =>['required','string'],
            'selling_price' =>['required','string'],
            'tax' =>['required','string'],
            'short_description' =>['required','string'],
            'status' =>['required','boolean'],
            'trending' =>['required','boolean'],
            'description' =>['nullable','string'],
            'meta_title' =>['nullable','string'],
            'meta_description' =>['nullable','string'],
            'meta_keyword' =>['nullable','string'],
        ];
    }
}

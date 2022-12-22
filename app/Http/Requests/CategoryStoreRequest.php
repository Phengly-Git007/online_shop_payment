<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' =>['required','string','max:100'],
            'slug' =>['required','string','max:100'],
            'image'=>['required','image'],
            'description' =>['nullable','string'],
            'status' => ['required','boolean'],
            'popular' => ['required','boolean'],
            'meta_title' =>['required','string'],
            'meta_desc' =>['required','string'],
            'meta_keyword' =>['required','string'],
        ];
    }
}

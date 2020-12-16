<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'author' => 'required',
            'category' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório.'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nome',
            'author' => 'autor',
            'category' => 'categoria'
        ];
    }
}

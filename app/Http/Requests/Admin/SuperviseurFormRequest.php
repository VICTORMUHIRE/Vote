<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SuperviseurFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name"=>["required","string",'min:2'],
            "matricule"=>["required","integer",'min:16000'],
            "email"=>["required","email","unique:superviseurs",'min:8'],
            "password"=>["required","string","password"],
            'faculte_id'=>['required','integer']
        ];
    }
}

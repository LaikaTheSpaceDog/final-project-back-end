<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class WordRequest extends FormRequest
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
            "word" => ["required", "string", "max:100", "unique:words"],
            "definition" => ["required", "string", "max:1000"],
            "liked" => ["boolean"],
            "links" => ["array"]
        ];
    }
}

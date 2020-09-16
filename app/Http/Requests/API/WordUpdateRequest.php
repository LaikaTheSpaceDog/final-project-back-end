<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class WordUpdateRequest extends FormRequest
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
            "word" => ["string", "max:100", "unique:words"],
            "definition" => ["string", "max:1000"],
            "liked" => ["boolean"],
            "links" => ["array"]
        ];
    }
}

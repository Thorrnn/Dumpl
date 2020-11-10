<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $_POST['id'];
        return [
            'title' => 'required|min:5|max:100|string',
            'name' => 'required|min:3|max:20|string',
            'age' => 'required| numeric',
            'sex' => 'required',
            'email' => ['required','max:255', 'string','email',  Rule::unique('users')->ignore('id')],
            'password' => 'nullable|string|min:3|max:20|confirmed'
        ];
    }
}

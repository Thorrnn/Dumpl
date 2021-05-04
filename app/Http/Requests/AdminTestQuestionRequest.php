<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminTestQuestionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id = $_POST['id'];
        return [
            'title' => 'required|min:3|max:100|string',

        ];
    }

    public function messages()
    {
        return [
            'title.min' => 'Минимальная длина названия 3 символов',
        ];
    }
}

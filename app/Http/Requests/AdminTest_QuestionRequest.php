<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminTest_QuestionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id = $_POST['id'];
        return [
            'title' => 'required|min:5|max:100|string',

        ];
    }

    public function messages()
    {
        return [
            'title.min' => 'Минимальная длина названия 5 символов',
        ];
    }
}

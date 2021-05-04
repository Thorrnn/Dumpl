<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminTestRequest extends FormRequest
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
        $id = $_POST['id'];
        return [
            'title' => 'required|min:3|max:100|string',
            'annotation' => 'required|min:3|max:254|string',

        ];
    }

    public function messages()
    {
        return [
            'title.min' => 'Минимальная длина названия 3 символов',
            'annotation.min' => 'Минимальная длина описания 3 символов',
        ];
    }
}

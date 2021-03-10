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
            'title' => 'required|min:5|max:100|string',
            'info' => 'required|min:5|max:254|string',

        ];
    }

    public function messages()
    {
        return [
            'title.min' => 'Минимальная длина названия 5 символов',
            'info.min' => 'Минимальная длина описания 5 символов',
        ];
    }
}

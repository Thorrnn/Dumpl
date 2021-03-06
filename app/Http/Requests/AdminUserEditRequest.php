<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminUserEditRequest extends FormRequest
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
            'surname' => 'required|min:3|max:20|string',
            'name' => 'required|min:3|max:20|string',
            'age' => 'required| numeric',
            'sex' => 'required',
            'email' => ['required','max:255', 'string','email',  Rule::unique('users')->ignore('id')],
            'password' => 'nullable|string|min:3|max:20|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'login.min' => 'Минимальная длина логина 3 символа',
            'email.unique' => 'Этот email уже зарегистрирован',
            'password.confirmed' => 'Пароли не совпадают'
        ];
    }
}

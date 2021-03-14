<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class UserSurveyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
}

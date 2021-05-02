<?php


namespace App\Models\User;


use Illuminate\Database\Eloquent\Model;

class SurveyQuestionAnswers extends Model
{
    protected $fillable = [
        'id', 'answer', 'question_number', 'user_id', 'status', 'answer_id'
    ];
}

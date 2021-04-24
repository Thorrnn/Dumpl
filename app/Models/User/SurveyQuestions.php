<?php


namespace App\Models\User;


use Illuminate\Database\Eloquent\Model;

class SurveyQuestions extends Model
{
    protected $fillable = [
        'id', 'title', 'survey_id', 'type'
    ];

}

<?php


namespace App\Models\User;


use Illuminate\Database\Eloquent\Model;

class SurveyAnswer extends Model
{
    protected $fillable = [
        'id', 'survey_id', 'user_id'
    ];
}

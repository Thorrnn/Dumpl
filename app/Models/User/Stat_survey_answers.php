<?php


namespace App\Models\User;


use Illuminate\Database\Eloquent\Model;

class Stat_survey_answers extends Model
{
    protected $fillable = [
        'answer_id', 'average', 'min', 'max', 'sum'
    ];
}

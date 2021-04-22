<?php


namespace App\Models\User;


use Illuminate\Database\Eloquent\Model;

class Survey_Question_Answers extends Model
{
    protected $fillable = [
        'id', 'answer', 'question_id', 'user_id', 'status'
    ];
}

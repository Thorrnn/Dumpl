<?php


namespace App\Models\User;


use Illuminate\Database\Eloquent\Model;

class TestAnswer extends Model
{
    protected $fillable = [
        'id', 'test_id', 'user_id', 'count_questions', 'right_answers', 'percent_right', 'reading_time','status'
    ];
}

<?php


namespace App\Models\Admin;


use Illuminate\Database\Eloquent\Model;

class TestAnswer extends Model
{
    protected $fillable = [
        'id', 'test_id', 'user_id', 'status'
    ];
}

<?php


namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class TestQuestion extends Model
{
    protected $fillable = [
        'title', 'option_correct','option_a', 'option_b', 'option_v', 'test_id'
    ];
}

<?php


namespace App\Models\Admin;


use Illuminate\Database\Eloquent\Model;

class Test_Questions extends Model
{
    protected $fillable = [
        'title', 'option_correct','option_a', 'option_b', 'option_v', 'test_id'
    ];
    public function test()
    {
        return $this->belongsTo(Test::class);
    }
}

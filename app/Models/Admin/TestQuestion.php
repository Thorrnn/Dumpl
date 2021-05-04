<?php


namespace App\Models\Admin;


use Illuminate\Database\Eloquent\Model;

class TestQuestion extends Model
{
    protected $fillable = [
        'title', 'option_correct','option_a', 'option_b', 'option_c', 'test_id'
    ];
    public function test()
    {
        return $this->belongsTo(Tests::class);
    }
}

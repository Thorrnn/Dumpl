<?php


namespace App\Models\Admin;


use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = [
        'title', 'info', 'status'
    ];
}

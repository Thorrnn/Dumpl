<?php


namespace App\Models\Admin;


use Illuminate\Database\Eloquent\Model;

class Tests extends Model
{
    protected $fillable = [
        'title', 'info', 'status'
    ];
}

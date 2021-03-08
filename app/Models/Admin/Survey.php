<?php


namespace App\Models\Admin;


use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = [
        'info', 'status'
    ];
}

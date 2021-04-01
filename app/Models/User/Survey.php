<?php


namespace App\Models\User;


use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = [
        'info', 'id', 'title', 'annotation'
    ];


}

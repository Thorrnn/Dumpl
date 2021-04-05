<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class User extends Model
{

    use SoftDeletes;
    use Notifiable;

    protected $fillable = [
        'id',
        'name',
        'surname',
        'login',
        'email',
        'fieldActivity',
        'sex',
        'age',
        'education',
        'aboutMyself',
        'password',
        'remember_token',
    ];

    protected $hidden = [

    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



}

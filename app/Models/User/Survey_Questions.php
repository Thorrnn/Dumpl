<?php


namespace App\Models\User;


use Illuminate\Database\Eloquent\Model;

class Survey_Questions extends Model
{
    protected $fillable = [
        'id', 'title', 'survey_id', 'type'
    ];

}

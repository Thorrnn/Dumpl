<?php


namespace App\Models\Admin;


use Illuminate\Database\Eloquent\Model;

class Tests extends Model
{
    protected $fillable = [
        'id', 'title', 'annotation', 'article_id', 'status', 'type_id'
    ];
}

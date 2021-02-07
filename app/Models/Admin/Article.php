<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title', 'body', 'annotation', 'info', 'annotation', 'status', 'author_id', 'fieldsArticles'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

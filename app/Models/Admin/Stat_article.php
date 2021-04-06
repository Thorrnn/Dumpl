<?php


namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Stat_article extends Model
{
    protected $fillable = [
        'sentences', 'words', 'letter', 'ColemanLiauIndex', 'ARI', 'article_id'
    ];
}

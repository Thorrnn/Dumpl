<?php


namespace App\Models\Admin;


use Illuminate\Database\Eloquent\Model;

class Survey_Questions extends Model
{
    protected $fillable = [
        'title', 'type', 'survey_id'
    ];
    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
}

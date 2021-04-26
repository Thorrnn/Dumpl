<?php


namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Model;

class SurveyQuestion extends Model
{
    protected $fillable = [
        'title', 'type', 'survey_id', 'id'
    ];
    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
}

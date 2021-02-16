<?php


namespace App\Models\Admin;


use Illuminate\Database\Eloquent\Model;

class Survey_Questions extends Model
{
    protected $fillable = [
        'title', 'status'
    ];
    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
}

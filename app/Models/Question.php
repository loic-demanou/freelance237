<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable =['job_id', 'question_title'];

    public function job()
    {
        return $this->belongsTo('App\Models\Job');
    }

}

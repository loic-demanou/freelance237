<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Job extends Model
{

    use HasFactory;
    use Notifiable;

    protected $fillable=['title', 'description', 'price', 'status', 'user_id'];

    // public function scopeSearch($field, $string)
    // {
    //     return $string ? $this->where('title', 'like', '%'.$string. '%'): $this;
    // }

    public function scopeOnline($query)
    {
        return $query->where('status', 1);
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function proposals()
    {
        return $this->hasMany('App\Models\Proposal')->latest();
    }

    public function likes()
    {
        return $this->belongsToMany('App\Models\User');
    }

    public function isLiked()
    {
        if (auth()->check()) {
            return auth()->user()->likes->contains('id', $this->id);
        }
    }
}

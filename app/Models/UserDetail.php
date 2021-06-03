<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;
    protected $fillable = ['fullname', 'email', 'address', 'phone', 'user_id', 'summary'];

    // public function user()
    // {
    //     return $this->BelongsTo('App\Models\User');
    // }

}


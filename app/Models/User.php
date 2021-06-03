<?php

namespace App\Models;

use App\Models\Conversation;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends \TCG\Voyager\Models\User
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'presentation',
        'description',
        'rate',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\Role');
    }

    public function jobs()
    {
        return $this->hasMany('App\Models\Job')->latest();
    }

    public function proposals()
    {
        return $this->hasMany('App\Models\Proposal')->latest();
    }

    public function conversations()
    {
        return Conversation::where(function($q) {
            return $q->where('to', $this->id)
            ->orWhere('from', $this->id);
        });
    }

    public function getConversationsAttribute()
    {
        return $this->conversations()->get();
    }

    public function likes()
    {
        return $this->belongsToMany('App\Models\Job');
    }

    public function detail()
    {
        return $this->hasOne('App\Models\UserDetail');
    }

    public function education()
    {
        return $this->hasMany('App\Models\Education');

    }

    public function experiences()
    {
        return $this->hasMany('App\Models\Experience');

    }

    public function skills()
    {
        return $this->hasMany('App\Models\Skill');

    }

}

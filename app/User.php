<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function papers($paper = null) {
        if($paper) {
            return $this->hasMany('App\Paper')->find($paper);
        }
        return $this->hasMany('App\Paper');
    }

    public function sources() {
        return $this->hasMany('App\Source');
    }

    public function evidence() {
        return $this->hasMany('App\Evidence');
    }

    public function analyses() {
        return $this->hasMany('App\Analysis');
    }

    public function arguments() {
        return $this->hasMany('App\Argument');
    }

    public function outlines() {
        return $this->hasMany('App\Outline');
    }

    public function paragraphs() {
        return $this->hasMany('App\Paragraph');
    }

}

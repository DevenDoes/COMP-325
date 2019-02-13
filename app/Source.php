<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function insights() {
        return $this->hasMany('App\Insight');
    }

    public function evidence() {
        return $this->hasManyThrough('App\Evidence', 'App\Insight');
    }

    public function review() {
        return $this->hasOne('App\Review');
    }

}

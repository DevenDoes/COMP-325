<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insight extends Model
{

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function source() {
        return $this->belongsTo('App\Source');
    }

    public function evidence() {
        return $this->hasMany('App\Evidence');
    }

}

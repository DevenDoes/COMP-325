<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insight extends Model
{

    protected $fillable = ['user_id', 'source_id', 'idea'];

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

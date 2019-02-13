<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evidence extends Model
{

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function insight() {
        return $this->belongsTo('App\Insight');
    }

}

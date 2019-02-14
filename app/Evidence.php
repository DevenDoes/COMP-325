<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evidence extends Model
{

    protected $fillable = ['user_id', 'insight_id', 'quote', 'location'];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function insight() {
        return $this->belongsTo('App\Insight');
    }

}

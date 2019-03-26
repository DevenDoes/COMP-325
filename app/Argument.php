<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Argument extends Model
{
    protected $fillable = ['paper_id', 'content'];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function paper() {
        return $this->belongsTo('App\Paper');
    }

    public function analyses() {
        return $this->belongsToMany('App\Analysis')->using('App\AnalysisArgument');
    }

    public function outlines() {
        return $this->belongsToMany('App\Outline')->using('App\ArgumentOutline');
    }
}

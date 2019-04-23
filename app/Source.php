<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    protected $fillable = ['user_id', 'paper_id', 'title', 'authors', 'location', 'type', 'medium'];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function paper() {
        return $this->belongsTo('App\Paper');
    }

    public function evidence() {
        return $this->hasMany('App\Evidence')->latest();
    }

    public function path() {
        return $this->paper->path() . "/sources/{$this->id}";
    }
}

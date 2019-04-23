<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    protected $fillable = ['user_id', 'title', 'course', 'style', 'prompt'];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function sources() {
        return $this->hasMany('App\Source')->latest();
    }

    public function evidence() {
        return $this->hasMany('App\Evidence')->latest();
    }

    public function analyses() {
        return $this->hasMany('App\Analysis')->with('evidence')->latest();
    }

    public function arguments() {
        return $this->hasMany('App\Argument')->with('analyses')->latest();
    }

    public function outlines() {
        return $this->hasMany('App\Outline')->latest();
    }

    public function paragraphs() {
        return $this->hasMany('App\Paragraph');
    }

    public function path() {
        return "/papers/{$this->id}";
    }
}

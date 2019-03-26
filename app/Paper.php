<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    protected $fillable = ['title', 'course', 'style', 'prompt'];

    public function user() {
        return $this->belongsTo('App\User');
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

    public function path() {
        return "/papers/{$this->id}";
    }
}

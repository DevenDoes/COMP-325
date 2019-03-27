<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outline extends Model
{
    protected $fillable = ['user_id', 'paper_id', 'thesis'];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function paper() {
        return $this->belongsTo('App\Paper');
    }

    public function arguments() {
        return $this->belongsToMany('App\Argument')->using('App\ArgumentOutline');
    }

    public function paragraphs() {
        return $this->hasMany('App\Paragraph');
    }

    public function path() {
        return $this->paper->path() . "/outlines/{$this->id}";
    }
}

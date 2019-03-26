<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evidence extends Model
{
    protected $fillable = ['user_id', 'paper_id', 'source_id', 'content', 'location', 'type'];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function paper() {
        return $this->belongsTo('App\Paper');
    }

    public function source() {
        return $this->belongsTo('App\Source');
    }

    public function analyses() {
        return $this->belongsToMany('App\Analysis')->using('App\AnalysisEvidence');
    }

    public function path() {
        return $this->source->path() . "/evidence/{$this->id}";
    }
}

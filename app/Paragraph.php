<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paragraph extends Model
{
    protected $fillable = ['paper_id', 'outline_id', 'topic'];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function paper() {
        return $this->belongsTo('App\Paper');
    }

    public function outline() {
        return $this->belongsTo('App\Outline');
    }

    public function analyses() {
        return $this->belongsToMany('App\Analysis')->using('App\AnalysisParagraph');
    }
}

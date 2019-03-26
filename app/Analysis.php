<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Analysis extends Model
{
    protected $fillable = ['paper_id', 'content'];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function paper() {
        return $this->belongsTo('App\Paper');
    }

    public function evidence() {
        return $this->belongsToMany('App\Evidence')->using('App\AnalysisEvidence');
    }

    public function arguments() {
        return $this->belongsToMany('App\Argument')->using('App\AnalysisArgument');
    }

    public function paragraphs() {
        return $this->belongsToMany('App\Paragraph')->using('App\AnalysisParagraph');
    }
}

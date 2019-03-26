<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EarlyAccess extends Model
{
    protected $fillable = ['firstname', 'lastname', 'email', 'grade'];
}

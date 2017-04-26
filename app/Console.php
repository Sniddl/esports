<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Console extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function players()
    {
        return $this->belongsToMany('App\Player');
    }
}

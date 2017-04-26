<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function consoles()
    {
        return $this->belongsToMany('App\Console')->withPivot('username')->withTrashed();
    }

    public function games()
    {
        return $this->belongsToMany('App\Game')->withTrashed();
    }

    public function socials()
    {
        return $this->belongsToMany('App\Social')->withPivot('url')->withTrashed();
    }
}

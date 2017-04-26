<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
  protected $fillable = [
      'name',
  ];

  public static function hex($val) {
    $json = json_decode(Color::where('name', $val)->first()->json);
    return $json->hex;
  }
}

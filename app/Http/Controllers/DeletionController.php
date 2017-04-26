<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeletionController extends Controller
{
    public function things (Request $r) {
      $class = "\App\\$r->type";
      $o = $class::find($r->id);
      $o->delete();
    }
}

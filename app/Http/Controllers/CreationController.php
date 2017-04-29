<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Game;
use \App\Console;
use \App\Player;
use \App\Social;
use Image;
use \App\Color;
use App\Discord;

class CreationController extends Controller
{
    public function things(Request $r, $thing) {

      // This should be moved to a helper file eventually
      function upload_image($path, $prefix, $storage_path, $width, $height){
        $extention = $path->getClientOriginalExtension();
        $filename = $prefix.'_' . date("jFYhis") . '.' . $extention;
        Image::make($path)->fit($width,$height)->save(public_path($storage_path . $filename));
        return $storage_path.$filename;
      }

      $name = $thing.'-input';

      $this->validate($r, [
        $name => 'required|unique:'.strtolower($thing).'s,name|max:255',
      ]);

      //create a new class from the variable
      $class = "\App\\$thing";
      $c = new $class;
      $c->name = $r->$name;
      if ($thing === 'Player'){
        $c->avatar = upload_image($r->file('avatar'), $c->name, '/img/uploads/', 300,300);
      }
      $c->save();
      if ($thing === 'Player'){
        foreach ($r->consoles as $console) {
          $cons = Console::find($console);
          $username = 'console-'.$cons->id;
          $c->consoles()->save($cons, ['username' => $r->$username]);
        }

        foreach ($r->games as $id) {
          $game = Game::find($id);
          $c->games()->save($game);
        }

        foreach ($r->socials as $id) {
          $social = Social::find($id);
          $username = 'social-'.$social->id;
          $c->socials()->save($social, ['username' => $r->$username]);
        }
      }
      return back();
    }




    public function colors (Request $r) {
      foreach($r->all() as $key => $input){
        if ($key != '_token'){
          $c = Color::firstOrNew([
            'name' => $key
          ]);
          $c->json = $r->$key;
          $c->save();
        }
      }
      return back();
    }



    public function discordToggle(Request $r) {
      $d = Discord::find(1); // set discord as on
      $d->status = $r->toggle;
      $d->save();
      return response()->json($d);
    }

    public function discordInit(Request $r) {
      $d = Discord::find(2); // set discord as registered
      $d->status = true;
      $d->save();
      return response()->json($d);
    }
}

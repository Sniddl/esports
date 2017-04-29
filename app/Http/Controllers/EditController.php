<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Console;
use App\Game;
use App\Social;
use App\Player;
class EditController extends Controller
{
    public function player(Request $r, $thing) {

      // dd(Player::find(1)->pivot);
      $name = $thing.'-input';

      $this->validate($r, [
        $name => 'required|max:255',
      ]);

      $class = "\App\\$thing";
      $c = $class::find($r->id);

      if ($thing == 'Player'){
        $c->name = $r->$name;
        $c->save();

        $c->socials()->detach();
        $c->consoles()->detach();
        $c->games()->detach();

        foreach ($r->consoles as $console) {
          $cons = Console::find($console);
          $username = 'console-'.$console;
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
      $c->save();
      return back();
    }
}

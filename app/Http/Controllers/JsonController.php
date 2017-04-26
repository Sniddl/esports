<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Game;
use App\Console;
use App\Player;
use App\Social;
use stdClass;

class JsonController extends Controller
{
  public function app()
  {
      $data = [
        "games" => Game::get(),
        "consoles" => Console::get(),
        "players" => Player::get(),
        "socials" => Social::get()
      ];
      foreach ($data['players'] as $player) {
        $player->consoles = $player->consoles()->get();
        $player->games = $player->games()->get();
        $player->socials = $player->socials()->get();
      }
      return $data;
  }

  public function discordRoles() {
    $r = json_decode(Redis::get('discord-roles'));
    return response()->json($r);
  }
}

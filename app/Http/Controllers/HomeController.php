<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\Console;
use App\Player;
use App\Color;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($file = 'players')
    {
        $data = [
          "games" => Game::get(),
          "consoles" => Console::get(),
          "players" => Player::get()
        ];
        if ($file == 'colors') {
          $data["colors"] = Color::get();
        }
        if ($file == 'discord') {
          $data["discordOn"] = DB::table('discord')->find(1)->status;
          $data["discordRegistered"] = DB::table('discord')->find(2)->status;
        }
        return view("dashboard.$file", compact('data', 'data'));
    }
}

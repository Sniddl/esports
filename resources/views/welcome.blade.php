@extends('layouts.app')

@section('content')


<div class="container">

    <div class="row">
          <div class="col-md-8 pull-right clearfix">
            <div class="input-group">
              <input type="text" class="form-control color-foreground" :placeholder="sortType" v-on:keyup="search">
              <div class="input-group-btn">
                <button type="button" class="btn btn-default color-foreground" v-on:click="sortType = 'Console'">Console</button>
                <button type="button" class="btn btn-default color-foreground" v-on:click="sortType = 'Game'">Game</button>
                <button type="button" class="btn btn-default color-foreground" v-on:click="sortType = 'Player'">Player</button>
              </div>
            </div>
          </div>
    </div>



    <br>

    <div class="row" v-if="loading == false">
      <center>
      <player v-for="player in filtered.players"
              :name="player.name"
              :num = "player.id"
              :consoles="player.consoles"
              :games="player.games"
              :socials="player.socials"
              :image="player.avatar"
              :key='player.id'></player>
      </center>
    </div>
    <div class="row" v-else>
      <center>
        <pulse-loader></pulse-loader>
      </center>
    </div>
</div>
@endsection

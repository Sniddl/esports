@extends('home')
@section('panel')


<div class="panel panel-default">
  <div class="panel-heading color-panel-headers">Games
    <button class="btn btn-sm btn-primary pull-right"
            type="submit"
            data-toggle="modal"
            data-target="#games-modal">
            Add Game
    </button>
  </div>
  <ul class="list-group">
    <Editable-List v-for="(game, index) in games" :obj="game" :key="game.id" :index="index" v-on:remove="games.splice(index,1)"></Editable-List>
  </ul>
</div>


@endsection

@extends('home')
@section('panel')

<div class="panel panel-default">
  <div class="panel-heading color-panel-headers" >Players

    @if ( count($data['games']) > 0 && count($data['consoles']) > 0 )
    <button class="btn btn-sm btn-primary pull-right"
            type="submit"
            data-toggle="modal"
            data-target="#players-modal">
            Add Player
    </button>
    @else
    <button class="btn btn-sm btn-primary pull-right"
            type="submit"
            data-toggle="modal"
            data-target="#players-modal"
            disabled="">
            Add Player
    </button>
    @endif

  </div>
  <ul class="list-group">
    <Editable-List v-for="(player, index) in players" :obj="player" :key="player.id" v-on:remove="players.splice(index,1)"></Editable-List>
  </ul>
</div>

@endsection

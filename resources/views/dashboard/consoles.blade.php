@extends('home')
@section('panel')

<div class="panel panel-default">
  <div class="panel-heading color-panel-headers">Consoles
    <button class="btn btn-sm btn-primary pull-right"
            type="submit"
            data-toggle="modal"
            data-target="#games-modal">
            Add Console
    </button>
  </div>
  <ul class="list-group">
  <Editable-List v-for="(console, index) in consoles" :obj="console" :key="console.id" v-on:remove="consoles.splice(index,1)"></Editable-List>
  </ul>
</div>


@endsection

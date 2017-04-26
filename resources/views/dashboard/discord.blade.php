@extends('home')
@section('panel')

<!-- <form class="" action="index.html" method="post" v-if="{{!$data['discordRegistered']}}"> -->


  <discord-register discord-on="{{$data['discordOn']}}" discord-register="{{$data['discordRegistered']}}"></discord-register>
  <!-- <discord-register discordOn="cows" egister="cats"></discord-register> -->

<!-- </form> -->



@endsection

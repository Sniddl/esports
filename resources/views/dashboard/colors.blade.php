@extends('home')
@section('panel')



<div class="panel panel-default">
  <form class="" action="/colors" method="post">
    {{csrf_field()}}
    <div class="panel-heading color-panel-headers" >Colors
      <button class="btn btn-sm btn-primary pull-right"
              type="submit">
              Save Colors
      </button>
    </div>
    <ul class="list-group">
      <div class="row" style="padding: 20px 20px 0px">
        @foreach($data['colors'] as $color)
        <?php $json = $color->json?>
        <picker label="{{$color->name}}" color="{{$color->json}}"></picker>
        @endforeach

        <!-- <picker label="Info"></picker>
        <picker label="Success"></picker>
        <picker label="Warning"></picker>
        <picker label="Danger"></picker>
        <picker label="Background"></picker>
        <picker label="Foreground"></picker>
        <picker label="Panel-Headers"></picker>
        <picker label="Accent"></picker> -->
      </div>
    </ul>
  </form>
</div>

@endsection

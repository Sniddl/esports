@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">


        <div class="col-md-3">
            @include('layouts.dash.panel-left')
        </div>

        <div class="col-md-8 ">
            @yield('panel')
        </div>



    </div>
</div>
@endsection

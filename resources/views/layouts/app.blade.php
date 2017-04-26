<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Fear The Gamers</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @if(Request::segment(1) != 'admin')
      @include('layouts.colors')
    @endif
    <style src="https://unpkg.com/vue-multiselect@2.0.0-beta.14/dist/vue-multiselect.min.css"></style>
    <script src="https://use.fontawesome.com/d3ead56ef6.js"></script>
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body class="color-background">
    <div id="app">
        <nav class="navbar navbar-default navbar-fixed-top color-foreground">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button"
                            class="navbar-toggle collapsed color-foreground"
                            data-toggle="collapse"
                            data-target="#app-navbar-collapse"
                            style="padding: 10px 15px;">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand color-foreground" href="{{ url('/') }}">
                        Fear The Gamers
                    </a>
                </div>

                <div class="collapse navbar-collapse color-foreground" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            @if (\App\User::get()->count() == 0)
                            <li><a href="{{ route('register') }}">Register</a></li>
                            @endif
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle color-foreground" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu color-foreground" role="menu">
                                    <li><a href="/admin" class="color-foreground">Admin Panel</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            class="color-foreground"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

          @yield('content')

    </div>

    <!-- Scripts -->
    <script src="http://{{ Request::getHost() }}:6001/socket.io/socket.io.js"></script>
    <script type="text/javascript">
      window.socket = io.connect('http://{{ Request::getHost() }}:6001');
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/sniddl-drop.js') }}"></script>
    <script src="/js/sniddl-ajax.js" charset="utf-8"></script>

    <script>
      window.__SNIDDL_AJAX__ = {
        data: {!! json_encode([
            '_token' => csrf_token(),
        ]) !!}
      };

      socket.on('bot.js', function(data) {
        console.log(data);
      })

    </script>





</body>
</html>

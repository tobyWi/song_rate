<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>
<body>

    <header>

        <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
            
                {{-- Create logo depending on user --}}

                @if(Auth::user() && Auth::user()->is_admin)
                    <a class="navbar-brand" href="{{ url('/') }}">
                        ADMIN
                    </a>
                @endif

                @if(Auth::user() && !Auth::user()->is_admin)
                    <a class="navbar-brand" href="{{ route('user.profile')}} ">               
                        {{Auth::user()->name}}
                    </a>
                @endif
                @guest
                    <a class="navbar-brand" href="/">SONG RATE</a>
                @endguest


            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">

                    {{-- Guest menu --}}

                    {{-- User menu --}}
                    @if(Auth::user() && !Auth::user()->is_admin)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('songs.songsToplist') }}">Toplist</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Artists</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('song.create') }}">Add song</a>
                        </li>
                    @endif

                    {{-- Admin menu --}}
                    @if(Auth::user() && Auth::user()->is_admin)
                        <li class="nav-item">
                            <a class="nav-link" href=" {{route('admin.users.all')}} ">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.songs.all')}}">Songs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=" {{route('admin.categories.all')}} ">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=" {{route('admin.comments.all')}} ">Comments</a>
                        </li>
                        
                    @endif
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @endguest

                </ul>
            </div>
        </nav>

        <div class="jumbotron">

            <div class="container">
                <h1>Song Rate</h1>

                    <blockquote>
                        Share the talent
                    </blockquote>

            </div>

        </div>

    </header>

    

    <main>

        <div class="container">
            <div class="row">
                {{-- Get message from session --}}

                <div class="col-xs-12 status-message">
                    
                    @if(session()->has('msg'))

                        <div class="alert alert-success">

                            {{session()->get('msg')}}

                        </div>

                    @elseif(session()->has('error'))

                    
                        <div class="alert alert-danger">

                            {{session()->get('error')}}

                        </div>
        

                    @endif

                </div>
            </div>

           
                @yield('content')

        </div>

    </main>

</body>
</html>

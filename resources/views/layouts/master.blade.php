<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <!-- Fogli di stile -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- jQuery e plugin JavaScript  -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="{{url('/')}}/js/myScript.js"></script>
        <title>@yield('titolo')</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{route('home')}}">MyPersonal</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        @yield('left_navbar')
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <a href="{{ route('setLang', ['language' => 'en']) }}" class="nav-link"><img src="{{ url('/') }}/immagini/flags/en.png" width="30" class="img-rounded"/></a>
                        <a href="{{ route('setLang', ['language' => 'it']) }}" class="nav-link"><img src="{{ url('/') }}/immagini/flags/it.png" width="24" class="img-rounded"/></a>
                        @auth
                        <li class="nav-item"><a class="nav-link" href="{{ route('profilo')}}"><i>{{strtoupper(Auth::user()->name)}}</i></a></li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" 
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ trans('labels.logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}"><span class="glyphicon glyphicon-user"></span> {{ trans('labels.login') }}</a></li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        @yield('corpo')
    </body>
</html>

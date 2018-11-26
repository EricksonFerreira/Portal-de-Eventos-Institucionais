<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script> -->
    <!-- <script src="{{ asset('js/semantic.min.js') }}"></script> -->
    <link href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/icon.min.css') }}"     rel="stylesheet">
    <link href="{{ asset('css/semantic.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="ui large fixed stackable menu">
            <a href="{{ url('/') }}" class="item">
                <img src="/img/icone/ifpe.png" alt="">
            </a>
             <a href="{{ url('/') }}" class="item">
                <i class="calendar green icon"></i><span style="color: green">Ver Eventos</span>
            </a>
            <div class=" right menu">
                <!-- <div class="item">
                    <div class="ui action input"> 
                        <input type="text" placeholder="Procurar evento">
                        <button class="ui icon green button"><i class="search icon"></i></button>
                    </div>
                </div>
                 -->
        @guest      
                <a href="{{ route('login') }}"class="item">
                    <button class="ui green inverted button">
                        <i class="user icon"></i>{{ __('Login') }}
                    </button>
                </a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}"class="item">
                    <button class="ui green inverted button">
                        <i class="user icon"></i>{{ __('Registro') }}
                    </button>
                </a>
                @endif

            </div>
        </div>

        @else
        <?php $id = Auth::user()->id;?>
        
                <a href="{{url("/evento/{$id}/meuseventos")}}" class="item">
                <i class="calendar green icon"></i><span style="color: green">Meus Eventos</span>
            </a>
        <div class="item">  
            <button class="ui green inverted button">
                <i class="user icon"></i>{{ Auth::user()->name }}
            </button>
        </div>                            

        <a href="{{ route('logout') }}"class="item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <button class="ui green inverted button">
                {{ __('Logout') }}
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form> 

            </button>
        </a>


    </div>
        @endguest
</div>

<main class="py-4">
    @yield('content')
</main>
</body>
</html>

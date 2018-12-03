<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/semantic.js') }}"></script>

    @yield('scripts')
    <!-- <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script> -->
    <!-- <script src="{{ asset('js/semantic.min.js') }}"></script> -->
    <!-- <link href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css') }}" rel="stylesheet"> -->

    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="https://fonts.gstatic.com"> -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"> -->

    <!-- Styles -->
    <link href="{{ asset('css/semantic.min.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('css/cards.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('css/background.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body>
    <div id="app">
        <div class="ui large fixed stackable menu">
            <!-- definindo uma imagem de logo -->
            <a href="{{route('evento.index')}}" class="image item">
                <img src="/img/icone/ifpe.png" alt="">
            </a> 
        @guest
              <!-- parte do dropdown -->
        <div class="ui dropdown item" style="color:green">
            <i class="calendar green icon"></i> Eventos
            <i class="dropdown green icon"></i>
            <div class="menu">
              <!-- <a class="item" href="cadastrarEvento.php"><i class="plus green icon"></i>Criar Evento</a> -->
          <!-- <a class="item" href=""><i class="calendar green icon"></i>Meus Eventos</a> -->
              <a class="item" href="index.php"><i class="calendar green icon"></i>Ver Eventos</a>
            </div>
        </div>
        <div class="right menu">
                <a href="{{ route('login') }}"class="item" style="color: green;">
                    <i class="sign in icon"></i>{{ __('Login') }}
                </a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="item" style="color: green;">
                    <i class="ui user plus icon"></i>{{ __('Registro') }}
                </a>
                @endif

            </div>
        </div>

        @else
        <?php $id = Auth::user()->id;?>
        <div class="ui sidebar inverted right vertical menu">
            <center>    
                <div class="item">
                    <img class="ui avatar tiny image" src="/ifpe.jpeg">
                    <h2>{{ Auth::user()->name }}</h2>
                </div>
            </center>
            <div class="item">
              <i class="large mail green icon"></i><p>{{ Auth::user()->email }}</p>
            </div>
            <div class="item">
              <i class="address green large card icon"></i><p>{{ Auth::user()->cpf }}</p>
            </div>
            <div class="item">
              <i class="phone large green icon"></i><p>{{ Auth::user()->telefone }}</p>
            </div>
              <!-- Editar Usuario
            <div class="item">
                <button class="ui green fluid button"><i class="edit icon"></i>Editar dados de usuário</button>
            </div> -->

            <div class="item">
                <!-- <button class="ui red fluid button"><i class="sign-out icon"></i>Sair</button> -->
              <a href="{{ route('logout') }}"class="item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <button class="ui red fluid button">
                <i class="sign-out icon"></i>
                    {{ __('Logout') }}
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </button>
              </a>
            </div>  
        </div> 
        <!-- parte do dropdown -->
        <div class="ui dropdown item" style="color:green">
          <i class="calendar green icon"></i> Eventos
          <i class="dropdown green icon"></i>
          <div class="menu">
              @can('criar-meus-evento')
              <a class="item" href="{{route('evento.create')}}"><i class="plus green icon"></i>Criar Evento</a>
              @endcan
              @can('criar-meus-evento')
                <a class="item" href="{{url("/evento/{$id}/meuseventos")}}"><i class="calendar green icon"></i>Meus Eventos</a>
              @endcan
             <a class="item" href="{{route('evento.index')}}"><i class="calendar green icon"></i>Ver Eventos</a>
          </div>
        </div>
        
        <div class="right menu">
            <a  class="item" style="color: green;" id="user"><i class="ui user icon"></i>{{ Auth::user()->name }}</a>
        </div>
    
    </div>
      <!-- login -->
    
       <!--  <div class="item">
            <button class="ui green inverted button">
                <i class="user icon"></i>{{ Auth::user()->name }}
            </button>
        </div> -->

    <!-- logout -->
    
        <!-- a href="{{ route('logout') }}"class="item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <button class="ui green inverted button">
                {{ __('Logout') }}
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            </button>
        </a>
 -->

        @endguest
</div>
<script>
  $('.dropdown')
      .dropdown({
       on:'hover',
       transition: 'slide down',
     
     });
      $('#user').click(function(){
        $('.ui.sidebar').sidebar('toggle');
      });
</script>
<main class="py-4">
    @yield('content')
</main>
</body>
</html>

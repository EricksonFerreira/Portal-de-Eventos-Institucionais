@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/semantic.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<body style="background-color: #ccc;">
    <div class="column" style="max-width: 450px;margin: 50px auto auto auto;">
        <div class="ui green segment">
            <h2 class="ui teal image header">
                <img src="/img/icone/ifpe.png" class="ui hurger image">
                <div class="content">
                    <span style="color:darkgreen">Acesse agora, Eventos - IFPE</span>
                </div>
            </h2>
        </div>
        <form class="ui form" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="ui large segment">
                <div class="field"><label>Email</label>
                    <div class="ui left icon input">
                        <i class="user green icon"></i>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Seu email" required autofocus>
                        @if ($errors->has('email'))
                           <span role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="field"><label>Senha</label>
                    <div class="ui left icon input">
                        <i class="lock green icon"></i>
                        <input type="password" name="password" placeholder="Senha">
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <button class="ui fluid large green submit button">Login</button>
            </div>
        </form>  
        <div class="ui segment">
            <center>Não tem uma conta?<a href="{{ route('register') }}" style="color: darkgreen;"> Cadastre-se</a></center>
        </div>  
    </div>
</body>  
@endsection

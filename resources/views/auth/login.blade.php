@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="column">
        <div class="ui segment">
            <h2 class="ui teal image header">
                <img src="../img/icone/ifpe.png" class="ui hurger image" style="width: 15%;">
                <div class="content">
                     Acesse agora, Eventos - IFPE
                </div>
            </h2>
        </div>
        <form method="POST" action="{{ route('login') }}" class="ui form">
            @csrf
            <div class="ui stacked large green segment">
                <div class="field">
                    <label for="">Email*</label>
                    <div class="ui left icon input">
                        <i class="user green icon"></i>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Seu email" required autofocus>
                            @if ($errors->has('email'))
                                <span  role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                    </div>
                </div>
                <div class="field">
                    <label for="">Senha*</label>
                    <div class="ui left icon input">
                        <i class="lock green icon"></i>
                        <input id="password" type="password"  placeholder="Senha" name="password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                    </div>
                </div>
                <div class="form-check">
               <!--      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember"> -->
                        <!-- {{ __('Remember Me') }} -->
                    <!-- </label> -->
                    <div class="ui checkbox">
                      <input type="checkbox"  name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} >
                      <label for="remember">{{ __('Remember-Me') }}</label>
                    </div><br><br>
                </div>
                <div class="">
                    <button type="submit" class="ui fluid large inverted green submit button">
                        {{ __('Login') }}
                    </button>
                </div></a>
            </div>
        </form>
        <div class="ui message">
            <center>Não tem uma conta? <a href="{{ route('register') }}" style="color: green;">  Cadastre-se</a></center>
        </div>
      <!--   <div class="ui message">
            <center>Esqueceu a senha? <a href="{{ route('password.request') }}" style="color: green;">  Recuperar a Senha</a></center>
        </div>   -->
    </div>
@endsection

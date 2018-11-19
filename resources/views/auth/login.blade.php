@extends('layouts.app')

@section('content')
<<!-- div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
================================================================================================================
<br><br><br><br>
    <div class="column">
        <div class="ui message">
            <h2 class="ui teal image header">
                <img src="_imagem/_icone/ifpe.png" class="ui hurger image">
                <div class="content">
                     Acesse agora, Eventos - IFPE
                </div>
            </h2>
        </div>
        <form method="POST" action="{{ route('login') }}" class="ui form">
            @csrf
            <div class="ui stacked large green segment">
                <div class="field">
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
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
                <div class="">
                    <button type="submit" class="ui fluid large inverted green submit button">
                        {{ __('Login') }}
                    </button>
                </div></a>
            </div>
        </form>  
        <div class="ui message">
            <center>Não tem uma conta? <a href="{{ route('password.request') }}" style="color: green;">  Cadastre-se</a></center>
        </div>  
    </div>
@endsection

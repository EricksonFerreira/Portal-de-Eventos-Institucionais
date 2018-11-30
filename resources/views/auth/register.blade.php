@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="column">
        <div class="ui message">
            <h2 class="ui teal image header">
                <img src="../img/icone/ifpe.png" class="ui hurger image" style="width: 15%;">
                <div class="content">
                     Cadastre-se, Eventos - IFPE
                </div>
            </h2>
        </div>
        <div class="ui green segment">
            <form method="POST" action="{{ route('register') }}" class="ui form">
                @csrf
                <div class="field">
                    <label for="">Nome*</label>
                    <div class="ui left icon input">
                        <i class="user green icon"></i>
                        <input id="name" type="text" name="name" placeholder="Nome" value="{{ old('name') }}" required autofocus>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                    </div>
                </div>
                <div class="field">
                    <label for="">CPF*</label>
                    <div class="ui left icon input">
                        <i class="key green icon"></i>
                        <input type="text" name="cpf" placeholder="CPF" value="{{ old('cpf') }}"required autofocus>
                         @if ($errors->has('cpf'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cpf') }}</strong>
                                </span>
                            @endif
                    </div>
                </div>
                <div class="two fields">
                    <div class="field"> 
                        <label for="">Email*</label>
                        <div class="ui left icon input">
                            <i class="envelope green icon"></i>
                            <input id="email" type="email" name="email" placeholder="Email" value= "{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                     <div class="field">
                        <label for="">Telefone*</label>
                        <div class="ui left icon input">
                            <i class="phone  green icon"></i>
                            <input id="telefone" type="text" name="telefone" placeholder="Telefone" value="{{ old('telefone') }}"required>
                             @if ($errors->has('telefone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telefone') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div> 
                </div>
                <div class="two fields">
                    <div class="field"> 
                        <label for="">Senha*</label>
                        <div class="ui left icon input">
                            <i class="lock green icon"></i>
                            <input id="password" type="password" name="password" placeholder="Senha" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                    <div class="field">
                        <label for="">Repita a Senha*</label>
                        <div class="ui left icon input">
                            <i class="lock green icon"></i>
                            <input id="password-confirm" type="password" name="password_confirmation" placeholder="Repita a senha" required>
                        </div>
                    </div>
                </div>
                <div class="">
                    <button type="submit" class="ui fluid large inverted green submit button">
                        {{ __('Registro') }}
                    </button>
                </div></a>
            </form>
        </div>
        <div class="ui message">
            <center>Já tem uma conta? <a href="{{ route('login') }}" style="color: #4ee44e;">Faça o login</a></center>
        </div>  
    </div>

    @endsection

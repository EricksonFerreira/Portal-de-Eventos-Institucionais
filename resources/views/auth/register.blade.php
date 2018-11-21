@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

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
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
-----------------------------------------*------------------------------------------
<br><br><br><br>
    <div class="column">
        <div class="ui message">
            <h2 class="ui teal image header">
                <img src="../<img src="" alt="">/icone/ifpe.png" class="ui hurger image">
                <div class="content">
                     Cadastre-se agora, Eventos - IFPE
                </div>
            </h2>
        </div>
        <div class="ui green segment">
            <form method="POST" action="{{ route('register') }}" class="ui form">
                @csrf
                <div class="field">
                    <div class="ui left icon input">
                        <i class="user green icon"></i>
                        <input id="name" type="text" name="name" placeholder="Nome" required autofocus>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                    </div>
                </div>
                <div class="two fields">
                    <div class="field"> 
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
                <!--     <div class="field">
                        <div class="ui left icon input">
                            <i class="phone  green icon"></i>
                            <input id="telefone" type="text" name="telefone" placeholder="Telefone" required>
                        </div>
                    </div> -->
                </div>
                <div class="two fields">
                    <div class="field"> 
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
        <!-- <div class="ui message">
            <center>Já tem uma conta? <a href="login.php" style="color: #4ee44e;">Faça o login</a></center>
        </div>   -->
    </div>
    @endsection

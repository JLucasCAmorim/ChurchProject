@extends('layouts.app')

@section('title', 'Login')

@section('content')
 <div class="section"></div>
<center>
<div class="container">
  <div class="valign-wrapper row login-box">
  <div class="col card hoverable s10 pull-s1 m6 pull-m3 l4 pull-l4" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE; ">
          <div class="panel panel-default">
              <div class="input-field col s12 center">
                <img src="/imagens/jubasma.jpg" alt="" style="height:100px; wight:100px;" class="circle responsive-img valign profile-image-login">
              </div>

                <div class="panel-body">
                    <form class="login-form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class='row'>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <div class="input-field col s12">
                              <i class="material-icons prefix">account_circle</i>

                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                                 <label for="email">Email</label>
                                @if ($errors->has('email'))

                                        <strong class="red-text text-darken-2">{{ $errors->first('email') }}</strong>

                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">


                            <div class="input-field col s12">
                              <i class="material-icons prefix">lock</i>
                                <input id="password" type="password"  name="password" required>
                                  <label for="password" >Senha</label>
                                @if ($errors->has('password'))

                                        <strong class="red-text text-darken-2">{{ $errors->first('password') }}</strong>

                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}/  >
                                <label for="remember">Lembrar-me </label>


                            </div>
                        </div>
                        <div class="section"></div>

                            <div class="row">
                                <button type="submit" class="col s12 btn btn-large waves-effect #1a237e indigo darken-4">
                                    Login
                                </button>


                            </div>
                        </div>
                    </form>
                  </div>
            </div>
        </div>


    </div>
</div>
<a class="pink-text" href="{{ route('password.request') }}">
    Esqueceu sua senha?
</a>
</center>

@endsection

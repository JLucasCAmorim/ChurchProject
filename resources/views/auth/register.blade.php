@extends('layouts.app')

@section('title', 'Registrar')

@section('content')
<div class="container">
    <div class="row">
        <div class="col s12 z-depth-4 card-panel" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                      <div class="row">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                          <div class="input-field col s12">
                            <i class="material-icons prefix">account_circle</i>
                            <label for="name" class="col-md-4 control-label">Name</label>


                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                      </div>
                        <div class="row">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                          <div class="input-field col s12">
                            <i class="material-icons prefix">contact_mail</i>
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                      </div>
                        <div class="row">
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                          <div class="input-field col s12">
                            <i class="material-icons prefix">lock</i>
                            <label for="password" class="col-md-4 control-label">Password</label>
                            <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group">
                          <div class="input-field col s12">
                            <i class="material-icons prefix">lock</i>
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                          </div>
                        </div>
                      </div>
                      <div class="section"></div>

                          <div class="row">
                              <button type="submit" class="col s12 btn btn-large waves-effect indigo">
                                    Registrar-se
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

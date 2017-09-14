@extends('layouts.app')

@section('title', 'Contato')

@section('content')

<div class="container">
  @if(Session::has('success'))
  <div class="card-panel teal lighten-2 white-text">

       {{ Session::get('success') }}
     </div>
  @endif
<div class="row">
<div class="col s12 m6 section">
<h3><i class="mdi-content-send brown-text"></i></h3>
    <h4 class="center">Onde Estamos?</h4>
    <p class="left-align light" style="text-align: justify;">

      Oi. Se você veio até aqui é porque tá afim de bater um papo. Então tá aqui o que você procura:

<p>Facebook: https://www.facebook.com/juventudebsm/</p>
<p>Instagram: https://www.instagram.com/jubasma/</p>
<p>Email: jubasmamaranhão@gmail.com</p>
<p>Whatsapp: 99-982361751</p>
<p>Spotify: jubasmamaranhao</p>

    </p>
</div>

<div class="col s12 m6">
  <h3><i class="mdi-content-send brown-text"></i></h3>
      <h4 class="center">Contate-nos</h4>
{!! Form::open(['route'=>'contactus.store']) !!}
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
{!! Form::label('Nome:') !!}
{!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Entre com seu nome']) !!}
<span class="text-danger">{{ $errors->first('name') }}</span>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
{!! Form::label('Email:') !!}
{!! Form::text('email', old('email'), ['class'=>'form-control', 'placeholder'=>'Entre com o Email']) !!}
<span class="text-danger">{{ $errors->first('email') }}</span>
</div>

<div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
{!! Form::label('Mensagem:') !!}
{!! Form::textarea('message', old('message'), ['class'=>'form-control', 'placeholder'=>'Entre com a mensagem']) !!}
<span class="text-danger">{{ $errors->first('message') }}</span>
</div>

<div class="form-group">
<button class="btn btn-success right">Enviar<i class="material-icons right">send</i></button>
</div>

{!! Form::close() !!}

</div>
</div>
</div>
@endsection

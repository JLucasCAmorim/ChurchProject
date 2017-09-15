@extends('layouts.app')

@section('title', 'Cadastro')

@section('content')

<div class="section"></div>
<div class="container">
  <div class="section">


{!! Form::open(array('route' => 'incricao.store','method'=>'POST')) !!}

     @include('clients.form')

{!! Form::close() !!}
</div>
</div>
@endsection
@include('layouts.partials.back', ['route'=>'clients.index'])

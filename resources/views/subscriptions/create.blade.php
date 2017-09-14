@extends('layouts.app')

@section('title', 'Criando')

@section('content')

<div class="section"></div>

{!! Form::open(array('route' => 'subscriptions.store','method'=>'POST')) !!}

     @include('subscriptions.form')

{!! Form::close() !!}

@endsection
@include('layouts.partials.back', ['route'=>'subscriptions.index'])

@extends('layouts.app')

@section('title', 'Criando')

@section('content')

<div class="section"></div>

{!! Form::open(array('files'=> true,'route' => 'files.store','method'=>'POST')) !!}

     @include('files.form')

{!! Form::close() !!}


@endsection

@include('layouts.partials.back', ['route'=>'files.index'])

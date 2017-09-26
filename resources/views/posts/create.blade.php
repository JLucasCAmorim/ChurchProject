@extends('layouts.app')

@section('title', 'Criando')

@section('content')

<div class="section"></div>
<div class="container">
{!! Form::open(array('route' => 'posts.store','method'=>'POST')) !!}

     @include('posts.form')

{!! Form::close() !!}
</div>
@endsection
@include('layouts.partials.back', ['route'=>'posts.index'])

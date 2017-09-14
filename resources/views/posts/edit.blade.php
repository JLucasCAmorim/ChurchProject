@extends('layouts.app')

 @section('title', 'Editando')

@section('content')
<div class="section"></div>

{!! Form::model($post, ['files'=> true,'method' => 'PATCH','route' => ['posts.update', $post->id]]) !!}

    @include('posts.formedit')

{!! Form::close() !!}

@endsection
@include('layouts.partials.back', ['route'=>'posts.index'])

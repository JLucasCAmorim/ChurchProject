@extends('layouts.app')

 @section('title', 'Mostrando')

@section('content')

<div class="section"></div>
<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Title:</strong>

            {{ $post->title}}

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Content:</strong>

            {{ $post->content}}

        </div>

    </div>

</div>

@endsection
@include('layouts.partials.back', ['route'=>'posts.index'])

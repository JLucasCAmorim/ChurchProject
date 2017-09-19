@extends('layouts.app')

 @section('title', 'Editando')

@section('content')
<div class="section"></div>
@if ($message = Session::get('success'))

<div class="card-panel teal lighten-2 white-text">

    <p>{{ $message }}</p>

</div>

@endif

{!! Form::model($post, ['files'=> true,'method' => 'PATCH','route' => ['posts.update', $post->id]]) !!}

    @include('posts.formedit')

{!! Form::close() !!}

<div class="carousel">
  @foreach ($postimages as $postimage)
  <a class="carousel-item" href="{{ route('postimages.edit',$postimage->id) }}"><img src="/uploads/postimages/{{ $postimage->avatar }}"></a>
  @endforeach
</div>
@include('postimages.create')
@endsection
@include('layouts.partials.back', ['route'=>'posts.index'])

@extends('layouts.app')



@section('content')
<div class="row">
  <div class="container">
  <div class="slider">
    <ul class="slides">
        @foreach($postimages as $postimage)
		     <li><img src="/uploads/postimages/{{ $postimage->avatar }}" alt="{{ $postimage->avatar}}"></li>
         @endforeach
      </ul>
  </div>
      <center>
       <h5>{{ $post->title}}</h5>
     </center>
      <p style="text-align:justify;">{{ $post->content }}</p>

    </div>
  </div>




@endsection

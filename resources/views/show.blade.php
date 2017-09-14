@extends('layouts.app')



@section('content')
<div class="row">
        <div class="col s12 m12 ">
          <div class="card">
            <div class="card-image">
              <center>
		            <img class="responsive-img post-imagem"  src="/uploads/imagens/{{ $post->avatar }}" alt="{{ $post->avatar}}">
              </center>

              </div>
  	<div class="card-content">
       <span class="center card-title">{{ $post->title}}</span>
      <p style="text-align:justify;">{{ $post->content }}</p>
    </div>
  </div>
  </div>


</div>

@endsection

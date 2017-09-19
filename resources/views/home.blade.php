@extends('layouts.app')

@section('content')
<div id="index-banner" class="parallax-container">
@foreach ($files as $file)
	<div class="parallax">
		<img class="resizeimg reponsive-img" src="/uploads/avatars/{{ $file->avatar }}" alt="{{ $file->avatar}}">
	</div>
@endforeach
</div>
<div class="container">
	<div class="section">
		<div class="row">
			<div class="col s12">
				<h3><i class="mdi-content-send brown-text"></i></h3>
				<h4 class="center">Bem Vindo</h4>
				<p class="left-align light" style="text-align: justify;">Bem-vindo ao NOSSO site da JUBASMA! É uma alegria imensa recebê-lo aqui, pois esse site é a realização de um sonho da nossa gestão e não foi fácil. Mas estamos aqui com a casa arrumada, para nos reunirmos, olharmos juntos os álbuns de fotos da nossa grande família, vermos as programações agendadas e claro realizar a inscrição para participarmos de tuuudo juntos. Puxa a cadeira, senta. Vem cá! Pode olhar... Afinal, você é de casa.</p>
				<h4 class="center">Notícias</h4>
				@foreach ($posts as $post)

				  <div class="col s12 m6">
				    <div class="card large">
				      <div class="card-image">
								@foreach ($post->images->slice(0, 1) as $image)
				       	<img class="noticia" src="/uploads/postimages/{{ $image->avatar }}" alt="{{ $image->avatar}}"/>
								@endforeach


							 <span class="card-title">{{ $post->title }}</span>
				     </div>
				      <div class="card-content">

				        <p style="text-align:justify;">{{ str_limit($post->content, $limit = 130, $end = '...')}}</p>
				      </div>
				      <div class="card-action">

				        <a class="blue-text" href="{{ route('show',$post->id) }}">Leia mais...</a>
				      </div>
				    </div>
				  </div>

		
				@endforeach


		</div>
	</div>
</div>



</div>

@endsection

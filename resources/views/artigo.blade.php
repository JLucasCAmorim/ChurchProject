@extends('layouts.app')

@section('title', 'Artigo')

@section('content')
<div class="container">
	<div class="section">
		<div class="row">
			<div class="col s12">
				<h3><i class="mdi-content-send brown-text"></i></h3>
				<h5 class="left-align light" style="text-align: center;">Bem-vindo a nossa pagina de artigos estarão aqui todos os nossos artigos. Aproveite e leia de todos!!</h5>
				<div class="section"></div>
			@foreach ($posts as $post)
					  @if ($post->category == 'artigo')
					<div class="col s12 m6">
						<div class="card large">
							<div class="card-image">
							 <img class="noticia" src="/uploads/imagens/{{ $post->avatar }}" alt="{{ $post->avatar}}"/>
                <span class="card-title">{{ $post->title }}</span>
							</div>
							<div class="card-content">

								<p style="text-align:justify;">{{ str_limit($post->content, $limit = 130, $end = '...')}}</p>
							</div>
							<div class="card-action">

								<a href="{{ route('show',$post->id) }}">Leia mais...</a>
							</div>
						</div>
					</div>

					  @endif
			@endforeach
		</div>
	</div>
</div>
</div>

@endsection

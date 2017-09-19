@extends('layouts.app') @section('content')


@section('title', 'Posts')


@if ($message = Session::get('success'))

<div class="card-panel teal lighten-2 white-text">

    <p>{{ $message }}</p>

</div>

@endif
 <div class="section"></div>


  <div class="row">
    @foreach ($posts as $post)

        <div class="col s12 m6">
          <div class="card large">
            <div class="card-image waves-effect waves-block waves-light">
              @foreach ($post->images->slice(0, 1) as $image)
              <img class="activator noticia" src="/uploads/postimages/{{ $image->avatar }}" alt="{{ $image->avatar}}"/>
              @endforeach
          </div>
           <div class="card-content">
              <span class="card-title activator grey-text text-darken-4">{{ $post->title }}<i class="material-icons right">more_vert</i></span>
              <p>Para ver o conteúdo, por favor, clique na imagem</p>
          </div>
            <div class="card-reveal">
              <span class="card-title activator grey-text text-darken-4">{{ $post->title }}<i class="material-icons right">close</i></span>
              <p style="text-align:justify;">{{ $post->content }}</p>
            </div>
            <div class="card-action">

              <a class="btn btn-primary btn-sm" href="{{ route('posts.edit',$post->id) }}"><i class="small material-icons">edit</i></a> {!!
              Form::open(['method' => 'DELETE','route' => ['posts.destroy', $post->id],'style'=>'display:inline']) !!}

              <button type="submit" style="display: inline;" class="btn btn-danger btn-sm"><i class="small material-icons">delete</i></button>
              {!! Form::close() !!}

            </div>
          </div>
        </div>


    @endforeach
</div>


<div class="fixed-action-btn">
        <a class="btn-floating btn-large red" href="{{ route('posts.create') }}"><i class="small material-icons">add</i></a>

</div>

{!! $posts->render() !!}

@endsection

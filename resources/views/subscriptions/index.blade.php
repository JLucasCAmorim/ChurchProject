@extends('layouts.app') @section('content')


@section('title', 'Eventos')


@if ($message = Session::get('success'))

<div class="card-panel teal lighten-2 white-text">

    <p>{{ $message }}</p>

</div>

@endif
 <div class="section"></div>


  <div class="row">
    <div class="container">


    @foreach ($subscriptions as $subscription)

        <div class="col s12 m6">
          <div class="card medium">
            <div class="card-image waves-effect waves-block waves-light">
             <img class="activator noticia" src="/uploads/events/{{ $subscription->avatar }}" alt="{{ $subscription->avatar}}"/>
          </div>
           <div class="card-content">
              <span class="card-title activator grey-text text-darken-4">{{ $subscription->title }}<i class="material-icons right">more_vert</i></span>
              <p>Para ver o conteúdo, por favor, clique na imagem</p>
          </div>
            <div class="card-reveal">
              <span class="card-title activator grey-text text-darken-4">{{ $subscription->title }}<i class="material-icons right">close</i></span>
              <p style="text-align:justify;">{{ $subscription->description }}</p>
            </div>
            <div class="card-action">

              <a class="btn btn-primary btn-sm" href="{{ route('subscriptions.edit',$subscription->id) }}"><i class="small material-icons">edit</i></a> {!!
              Form::open(['method' => 'DELETE','route' => ['subscriptions.destroy', $subscription->id],'style'=>'display:inline','onsubmit' => 'return confirm("Você tem certeza que deseja excluir esse evento?")']) !!}

              <button type="submit" style="display: inline;" class="btn btn-danger btn-sm"><i class="small material-icons">delete</i></button>
              {!! Form::close() !!}

            </div>
          </div>
        </div>


    @endforeach
      </div>
</div>


<div class="fixed-action-btn">
        <a class="btn-floating btn-large red" href="{{ route('subscriptions.create') }}"><i class="small material-icons">add</i></a>

</div>

{!! $subscriptions->render() !!}

@endsection

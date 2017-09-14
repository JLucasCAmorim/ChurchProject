@extends('layouts.app')



@section('content')
<div class="section"></div>


 <div class="row">
   @foreach ($subscriptions as $subscription)

       <div class="col s12 m6">
         <div class="card large">
           <div class="card-image waves-effect waves-block waves-light">
            <img class="activator noticia" src="/uploads/events/{{ $subscription->avatar }}" alt="{{ $subscription->avatar}}"/>
         </div>
          <div class="card-content">
             <span class="card-title activator grey-text text-darken-4">{{ $subscription->title }}<i class="material-icons right">more_vert</i></span>
             <p>Para saber mais sobre esse evento, por favor, clique na imagem</p>
         </div>
           <div class="card-reveal">
             <span class="card-title activator grey-text text-darken-4">{{ $subscription->title }}<i class="material-icons right">close</i></span>
             <p style="text-align:justify;">{{ $subscription->description }}</p>
           </div>
           <div class="card-action">

             <span>Valor: R${{ $subscription->price }}<a class="secondary-content" href="#">Inscreva-se</a></span>

           </div>
         </div>
       </div>


   @endforeach
</div>

@endsection

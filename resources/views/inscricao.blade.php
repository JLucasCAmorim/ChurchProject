@extends('layouts.app')

@section('title', 'Inscrições')

@section('content')
<div class="section"></div>
@if ($message = Session::get('success'))

<div class="card-panel teal lighten-2 white-text">

    <p>{{ $message }}</p>

</div>

@endif

 <div class="row">
   <div class="container">
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

             <span>Valor: R${{ $subscription->price }}<a class="secondary-content blue-text" href="{{ route('cadastro',$subscription->id) }}">Inscreva-se</a></span>

           </div>
         </div>
       </div>
   @endforeach
</div>

 </div>
 <div class="container">
   <h3><i class="mdi-content-send brown-text"></i></h3>
   <p class="left-align light" style="text-align: center;">Após realizar o pagamento via DEPÓSITO, você deve enviar a foto do comprovante para o nosso e-mail ou whatsapp. Confirmando sua opção de HOSPEDAGEM, pois é LIMITADA!</p>
  <p class="left-align light" style="text-align: center;" >
  <span>CONTA PARA DEPOSITO</span><br/>
  <span>Agencia: 2218</span><br/>
  <span>Conta Corrente: 2111-3</span><br/>
  <span>Associação Batista Sul Maranhense</span><br/>
  </p>
  <p>
    <span><i class="material-icons">call</i> Whatsapp: (99) 98275-1331</span>
    <span class="right"><i class="material-icons">email</i> jubasmamaranhao@gmail.com</span>
  </p>
   <div class="section"></div>
 </div>

@endsection

@extends('layouts.app') @section('content')


@section('title', 'Clientes')


@if ($message = Session::get('success'))

<div class="card-panel teal lighten-2 white-text">

    <p>{{ $message }}</p>

</div>

@endif
<div class="section"></div>


<table class="bordered centered responsive-table">
        <thead>
          <tr>
              <th>Nome</th>
              <th>Igreja</th>
              <th>Polo</th>
              <th>Lider do Polo</th>
              <th>Whatsapp</th>
              <th>Responsavel</th>
              <th>Email</th>
              <th>Idade</th>
              <th>Pastor</th>
              <th>Lider da Juventude</th>
              <th>Estado</th>
              <th>Necessidade</th>
              <th>Evento</th>
              <th colspan="2"></th>
          </tr>
        </thead>

        <tbody>
  @foreach ($clients as $client)

        <tr>
            <td>{{ $client->nome }}</td>
            <td>{{ $client->igreja }}</td>
            <td>{{ $client->polo }}</td>
            <td>{{ $client->liderPolo }}</td>
            <td>{{ $client->whatsapp }}</td>
            <td>{{ $client->responsavel }}</td>
            <td>{{ $client->email }}</td>
            <td>{{ $client->idade }}</td>
            <td>{{ $client->pastor }}</td>
            <td>{{ $client->liderjuventude }}</td>
            <td>{{ $client->estado }}</td>
            @if($client->necessidade == 0)
            <td>Não</td>
            @else
            <td>Sim</td>
            @endif
            <td>{{ $client->title }}</td>
            <td>
            <center>

             <a class="btn btn-primary btn-sm" href="{{ route('clients.edit',$client->id) }}"><i class="small material-icons">edit</i></a>

             {!! Form::open(['method' => 'DELETE','route' => ['clients.destroy', $client->id],'id'=> 'FormDelete','style'=>'display:inline', 'onsubmit' => 'return confirm("Você tem certeza que deseja excluir esse perfil?")']) !!}

             <button type="submit" style="display: inline;" class="btn btn-danger btn-sm"><i class="small material-icons">delete</i></button>

             {!! Form::close() !!}
           </center>
         </td>
          </tr>
          @endforeach
        </tbody>
  </table>




@endsection

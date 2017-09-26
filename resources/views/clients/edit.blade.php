@extends('layouts.app')

 @section('title', 'Editando')

@section('content')
<div class="section"></div>
<div class="container">


{!! Form::model($client, ['files'=> true,'method' => 'PATCH','route' => ['clients.update', $client->id]]) !!}

    @include('clients.formedit')

{!! Form::close() !!}
</div>
@endsection
@include('layouts.partials.back', ['route'=>'clients.index'])

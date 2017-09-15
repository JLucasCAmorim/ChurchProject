@extends('layouts.app')

 @section('title', 'Editando')

@section('content')
<div class="section"></div>

{!! Form::model($client, ['files'=> true,'method' => 'PATCH','route' => ['clients.update', $client->id]]) !!}

    @include('clients.formedit')

{!! Form::close() !!}

@endsection
@include('layouts.partials.back', ['route'=>'clients.index'])

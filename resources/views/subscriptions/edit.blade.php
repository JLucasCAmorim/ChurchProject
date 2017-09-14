@extends('layouts.app')

 @section('title', 'Editando')

@section('content')
<div class="section"></div>

{!! Form::model($subscription, ['files'=> true,'method' => 'PATCH','route' => ['subscriptions.update', $subscription->id]]) !!}

    @include('subscriptions.formedit')

{!! Form::close() !!}

@endsection
@include('layouts.partials.back', ['route'=>'subscriptions.index'])

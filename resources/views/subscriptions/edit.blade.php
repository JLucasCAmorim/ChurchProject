@extends('layouts.app')

 @section('title', 'Editando')

@section('content')
<div class="section"></div>
<div class="container">
{!! Form::model($subscription, ['files'=> true,'method' => 'PATCH','route' => ['subscriptions.update', $subscription->id]]) !!}

    @include('subscriptions.formedit')

{!! Form::close() !!}
</div>
@endsection
@include('layouts.partials.back', ['route'=>'subscriptions.index'])

@extends('layouts.app')

 @section('title', 'Editando')

@section('content')

<div class="section"></div>

{!! Form::model($postimage, ['files'=> true,'method' => 'PATCH','route' => ['postimages.update', $postimage->id]]) !!}

    @include('postimages.formedit')

{!! Form::close() !!}

@endsection

@include('layouts.partials.back', ['route'=>'files.index'])

@extends('layouts.app')

 @section('title', 'Editando')

@section('content')

<div class="section"></div>

{!! Form::model($file, ['files'=> true,'method' => 'PATCH','route' => ['files.update', $file->id]]) !!}

    @include('files.formedit')

{!! Form::close() !!}

@endsection

@include('layouts.partials.back', ['route'=>'files.index'])

@extends('layouts.app')

 @section('title', 'Editando')

@section('content')

<div class="section"></div>
@if ($message = Session::get('success'))

    <div class="card-panel teal lighten-2 white-text">

        <p>{{ $message }}</p>

    </div>
@endif
<div class="container">
{!! Form::model($file, ['files'=> true,'method' => 'PATCH','route' => ['files.update', $file->id]]) !!}

    @include('files.formedit')

{!! Form::close() !!}
</div>
@endsection

@include('layouts.partials.back', ['route'=>'files.index'])

@extends('layouts.app')

 @section('title', 'Editando')

@section('content')

<div class="section"></div>
<div class="container">
{!! Form::model($postimage, ['files'=> true,'method' => 'PATCH','route' => ['postimages.update', $postimage->id]]) !!}

    @include('postimages.formedit')

{!! Form::close() !!}
</div>
@endsection

@include('layouts.partials.back', ['route'=>'files.index'])

@extends('layouts.app')

@section('title', 'Imagem Principal')

@section('content')

@if ($message = Session::get('success'))

    <div class="card-panel teal lighten-2 white-text">

        <p>{{ $message }}</p>

    </div>

@endif
 <div class="section"></div>
<div class="row">
    <div class="container">
  @foreach ($files as $file)
        <div class="col s12 m6">
          <div class="card">
            <div class="card-image">
              <center>
              <img class=" responsive-img valign profile-image-login" style="max-width:200px; max-height:150px; width: auto; height: auto;" src="/uploads/avatars/{{ $file->avatar }}" alt="{{ $file->avatar}}" >
            </center>
               </div>
               <div class="card-action">
                 <center>
                <a class="btn btn-primary btn-sm" href="{{ route('files.edit',$file->id) }}"><i class="small material-icons">edit</i></a>

                 {!! Form::open(['method' => 'DELETE','route' => ['files.destroy', $file->id],'id'=> 'FormDelete','style'=>'display:inline', 'onsubmit' => 'return confirm("Você tem certeza que deseja excluir essa imagem?")']) !!}

                 <button type="submit" style="display: inline;" class="btn btn-danger btn-sm"><i class="small material-icons">delete</i></button>

                 {!! Form::close() !!}
               </center>
               </div>
             </div>
           </div>


@endforeach
    </div>
   </div>

{!! $files->render() !!}

<div class="fixed-action-btn">
      <a class="btn-floating btn-large red" href="{{ route('files.create') }}"><i class="small material-icons">add</i></a>
</div>

@endsection

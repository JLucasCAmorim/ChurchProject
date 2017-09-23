@extends('layouts.app')

@section('title', 'Portifolios')

@section('content')

@if ($message = Session::get('success'))

    <div class="card-panel teal lighten-2 white-text">

        <p>{{ $message }}</p>

    </div>

@endif
 <div class="section"></div>
<div class="row">
    <div class="container">
  @foreach ($portifolios as $portifolio)
        <div class="col s12 m6">
          <div class="card">
          <div class="carousel">

                   @foreach ($portifolio->portifolioImages as $image)
               <a class="carousel-item" href="#one!"><img src="/uploads/portifolios/{{ $image->avatar }}" alt="{{ $image->avatar}}"></a>
                    @endforeach

               </div>
               <div class="card-content">

                  <span class="card-title grey-text text-darken-4">{{ $portifolio->name }}</span>

              </div>
               <div class="card-action ">

                 {!! Form::open(['method' => 'DELETE','route' => ['portifolios.destroy', $portifolio->id],'id'=> 'FormDelete','style'=>'display:inline', 'onsubmit' => 'return confirm("Você tem certeza que deseja excluir esse portifolio?")']) !!}

                 <button type="submit" style="display: inline;" class="btn btn-danger btn-sm"><i class="small material-icons">delete</i></button>

                 {!! Form::close() !!}

               </div>
             </div>
           </div>


@endforeach
    </div>
   </div>

{!! $portifolios->render() !!}

<div class="fixed-action-btn">
      <a class=" modal-trigger btn-floating btn-large red" href="#modal3"><i class="small material-icons">add</i></a>
</div>
@include('portifolios.create')
@endsection

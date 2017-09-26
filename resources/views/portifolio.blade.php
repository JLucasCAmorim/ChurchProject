@extends('layouts.app')

@section('title', 'Portfólios')

@section('content')

@if ($message = Session::get('success'))

    <div class="card-panel teal lighten-2 white-text">

        <p>{{ $message }}</p>

    </div>

@endif
 <div class="section"></div>
<div class="row">
    <div class="container">
      <h3><i class="mdi-content-send brown-text"></i></h3>
      <h5 class="left-align light" style="text-align: center;">Bem-vindo a nossa página de portfólio estarão aqui todos os nossos albúns de fotos. Aproveite e olhe todos!!</h5>
      <div class="section"></div>
  @foreach ($portifolios as $portifolio)
        <div class="col s12 m6">
          <div class="card">
            <div class="card-image">

                   @foreach ($portifolio->portifolioImages->slice(0, 1) as $image)
               <a href="{{ route('portifolioshow',$portifolio->id) }}"><img  src="/uploads/portifolios/{{ $image->avatar }}" alt="{{ $image->avatar}}"></a>
                    @endforeach

               </div>
               <div class="card-content">

                  <span class="card-title grey-text text-darken-4">{{ $portifolio->name }}</span>

              </div>

             </div>
           </div>


@endforeach
{!! $portifolios->render() !!}
    </div>
   </div>




@endsection

@extends('layouts.app')



@section('content')
<div class="section">

</div>

  <div class="container">
    <center>
    <div class="row">
        @foreach($portifolio->portifolioImages as $image)

        <div class="col s12 m3">
          <div class="row">
            <img class="materialboxed" width="200" src="/uploads/portifolios/{{ $image->avatar }}" alt="{{ $image->avatar}}">
          </div>

        </div>

         @endforeach
  </div>
</center>
    </div>






@endsection

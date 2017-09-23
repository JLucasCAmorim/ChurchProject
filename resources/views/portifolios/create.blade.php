<div id="modal3" class="modal">
    <div class="modal-content">

{!! Form::open(array('files'=> true,'route' => 'portifolios.store','method'=>'POST')) !!}

     @include('portifolios.form')

{!! Form::close() !!}

  </div>
</div>

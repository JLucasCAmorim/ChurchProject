<div id="modal1" class="modal">
    <div class="modal-content">
{!! Form::open(array('files'=> true,'route' => 'postimages.store','method'=>'POST')) !!}

     @include('postimages.form')

{!! Form::close() !!}
  </div>
</div>

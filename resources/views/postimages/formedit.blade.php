@if (count($errors) > 0)

    <div class="card-panel red lighten-2 white-text">

        <strong>Opa!</strong> Tem alguns problemas no seu formulário.<br><br>

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif

<div class="row">
    <div class="file-field input-field col s12">
         <div class="btn">
           <span>Arquivo</span>
           {!! Form::file('avatar', null, array('placeholder' => 'Avatar','class' => 'form-control')) !!}
         </div>
         <div class="file-path-wrapper">
           <input class="file-path validate" type="text">

        </div>
      </div>

      {{ Form::hidden('post_id', $postimage->post_id ) }}

<div class="fixed-action-btn">

          <button type="submit" class="btn-floating btn-large red"><i class="large material-icons">save</i></button>

  </div>

</div>

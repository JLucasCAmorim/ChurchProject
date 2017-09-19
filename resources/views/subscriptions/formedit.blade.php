@if (count($errors) > 0)

    <div class="card-panel red lighten-2 white-text">

        <strong>Whoops!</strong> Seu cadastro tem alguns problemas.<br><br>

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif

<div class="row">
    <form class="col s12">

      <div class="row">

      <div class="input-field col s12">

             <label for="first_name">Titulo</label>

            {!! Form::text('title', null, array('placeholder' => 'Titulo','class' => 'form-control')) !!}

        </div>
      </div>


      <div class="row">

      <div class="input-field col s12">

             <label for="first_name">Descrição</label>

            {!! Form::textarea('description', null, array('placeholder' => 'Descrição','class' => 'form-control','style'=>'height:100px')) !!}

        </div>

    </div>
    <div class="row">
      <div class="input-field col s12">
        <label>Preço</label>
          {!! Form::number('price', null, array('placeholder' => 'Preço','class' => 'form-control')) !!}

      </div>
  </div>
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
      </div>
   <div class="fixed-action-btn">

            <button type="submit" class="btn-floating btn-large red"><i class="large material-icons">save</i></button>

    </div>

  </form>
</div>

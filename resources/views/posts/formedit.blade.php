@if (count($errors) > 0)

    <div class="card-panel red lighten-2 white-text">

        <strong>Whoops!</strong>Seu cadastro tem alguns problemas.<br><br>

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

             <label for="first_name">Conteúdo</label>

            {!! Form::textarea('content', null, array('placeholder' => 'Conteúdo','class' => 'form-control','style'=>'height:100px')) !!}

        </div>

    </div>
    <div class="row">
      <div class="input-field col s12">
        {!! Form::select('category', ['noticia' => 'Notícia', 'evento' => 'Evento', 'artigo' => 'Artigo'], null, ['placeholder' => 'Escolha uma categoria'])!!}
        <label>Categoria</label>
      </div>
  </div>

  <div class="fixed-action-btn horizontal click-to-toggle">
   <a class="btn-floating btn-large red">
     <i class="material-icons">menu</i>
   </a>
   <ul>
        <li><button type="submit" class="btn-floating btn-large red"><i class="large material-icons">save</i></button></li>
        <li> <a class=" modal-trigger btn-floating btn-large red" href="#modal1"><i class="large material-icons">image</i></a></li>
  </div>


  </form>
</div>

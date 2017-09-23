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

             <label for="nome">Nome:</label>

            {!! Form::text('nome', null, array('placeholder' => 'Nome','class' => 'form-control')) !!}

        </div>
      </div>


      <div class="row">

      <div class="input-field col s12">

             <label for="igreja">Igreja:</label>

            {!! Form::text('igreja', null, array('placeholder' => 'Igreja','class' => 'form-control')) !!}

        </div>
      </div>

      <div class="row">

      <div class="input-field col s6">

             <label for="polo">Polo:</label>

            {!! Form::text('polo', null, array('placeholder' => 'Polo','class' => 'form-control')) !!}

        </div>
        <div class="input-field col s6">

               <label for="liderPolo">Lider do Polo:</label>

              {!! Form::text('liderPolo', null, array('placeholder' => 'Lider do Polo','class' => 'form-control')) !!}

          </div>
      </div>
      <div class="row">
        <div class="input-field col s6">

               <label for="estado">Estado:</label>

              {!! Form::text('estado', null, array('placeholder' => 'Estado','class' => 'form-control')) !!}

        </div>
      <div class="input-field col s6">

             <label for="cidade">Cidade:</label>

            {!! Form::text('cidade', null, array('placeholder' => 'Cidade','class' => 'form-control')) !!}

        </div>

      </div>
      <div class="row">
        <div class="input-field col s6">

               <label for="whatsapp">Whatsapp:</label>

              {!! Form::text('whatsapp', null, array('placeholder' => 'Whatsapp','class' => 'form-control')) !!}

        </div>
      <div class="input-field col s6">

             <label for="idade">Idade:</label>

            {!! Form::number('idade', null, array('placeholder' => 'Idade','class' => 'form-control')) !!}

        </div>

      </div>
      <div class="row">

      <div class="input-field col s12">

             <label for="responsavel">Responsavel:</label>

            {!! Form::text('responsavel', null, array('placeholder' => 'Responsavel','class' => 'form-control')) !!}

        </div>
      </div>
      <div class="row">

      <div class="input-field col s12">

             <label for="email">Email:</label>

            {!! Form::email('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}

        </div>
      </div>
      <div class="row">

      <div class="input-field col s12">

             <label for="pastor">Pastor:</label>

            {!! Form::text('pastor', null, array('placeholder' => 'Pastor','class' => 'form-control')) !!}

        </div>
      </div>
      <div class="row">

      <div class="input-field col s12">

             <label for="liderjuventude">Lider da Juventude:</label>

            {!! Form::text('liderjuventude', null, array('placeholder' => 'Lider da Juventude','class' => 'form-control')) !!}

        </div>
      </div>
      <div class="row">
        <div class=" col s12">
           <label for="necessidade">Necessidade:</label>
      <p>
          {{ Form::radio('necessidade', '1', null ,array( 'id' => 'radio1','class' => 'form-control')) }}
          <label for="radio1">Sim</label><br>
      </p>

      <p>
        {{ Form::radio('necessidade', '0', null ,array( 'id' => 'radio2','class' => 'form-control')) }}
             <label for="radio2">Não</label>

      </p>

        </div>
      </div>

      {{ Form::hidden('subscription_id', $client->subscription_id ) }}
   <div class="fixed-action-btn">

            <button type="submit" class="btn-floating btn-large red"><i class="large material-icons">save</i></button>

    </div>

  </form>
</div>

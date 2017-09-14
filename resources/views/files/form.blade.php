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
    <form class="col s12">

    <div class="fixed-action-btn">


            <button type="submit" class="btn-floating btn-large red"><i class="large material-icons">save</i></button>

    </div>

</div>

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>JUBASMA</title>

    <!-- Styles -->
    <link href="{{ asset('css/materialize.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{ asset('css/style.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<!-- Mobile Menu -->
  <ul id="slide-out" class="side-nav">
<li><div class="user-view">
<div class="background">
<img style="height:150px; width:300px;" src="/imagens/jubasma.jpg">
</div>
@if (Auth::guest())

<a href="#!email"><span class="white-text email">Obrigado por usar nosso site</span></a>
@else
<a href="#!user"><img class="responsive-img circle" src="/imagens/lion.jpg"></a>

<a href="#!name"><span class="white-text name">{{ Auth::user()->name }}</span></a>
<a href="#!email"><span class="white-text email">{{ Auth::user()->email }}</span></a>
@endif
</div>
<!-- Authentication Links -->
@if (Auth::guest())
<li><a href="{{ url('/home') }}">Home</a></li>
<li><div class="divider"></div></li>
<li><a href="{{ url('sobre') }}">Quem somos?</a></li>
<li><div class="divider"></div></li>
<li><a href="{{ url('/contact-us') }}">Contato</a></li>
<li><div class="divider"></div></li>
<li><a href="{{ url('/eventos') }}">Eventos</a></li>
<li><div class="divider"></div></li>
<li><a href="{{ url('/artigos') }}">Artigos</a></li>
<li><div class="divider"></div></li>
<li><a href="{{ url('/inscricoes') }}">Inscrições</a></li>
<li><div class="divider"></div></li>
<li><a href="{{ url('/albuns') }}">Portfólios</a></li>
@else
<li><a href="{{ url('files') }}">Arquivos</a></li>
<li><a href="{{ url('clients') }}">Clientes</a></li>
<li><a href="{{ route('register') }}">Registrar</a></li>
<li><a href="{{ url('subscriptions') }}">Eventos</a></li>
<li><a href="{{ url('posts') }}">Post</a></li>
<li><a href="{{ url('portifolios') }}">Portfólios</a></li>
<li><div class="divider"></div></li>
<li>
<a class="dropdown-button" href="#!" data-activates="dropdown1">
{{ Auth::user()->name }} <i class="material-icons right">arrow_drop_down</i>
</a>

<ul id="dropdown1" class="dropdown-content" role="menu">
<li>
  <a href="{{ route('logout') }}"
      onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
      Logout
  </a>

  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      {{ csrf_field() }}
  </form>
</li>
</ul>
</li>
@endif
</ul>
<!-- End Mobile Menu -->
<!-- Start Navbar -->
  <div class="navbar-fixed">
<nav class="#1a237e indigo darken-4" role="navigation">
  <div class="nav-wrapper container">
    <a id="logo-container" href="{{ url('/home') }}" class="brand-logo">
      @hasSection('title')
      @yield('title')
      @else
      <img src="/imagens/logo.png" alt="">
      @endif
    </a>
    <ul class="right hide-on-med-and-down">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ url('/home') }}">Home</a></li>
                            <li><a href="{{ url('sobre') }}">Quem somos?</a></li>
                            <li><a href="{{ url('/contact-us') }}">Contato</a></li>
                            <li><a href="{{ url('/eventos') }}">Eventos</a></li>
                            <li><a href="{{ url('/artigos') }}">Artigos</a></li>
                            <li><a href="{{ url('/inscricoes') }}">Inscrições</a></li>
                            <li><a href="{{ url('/albuns') }}">Portfólios</a></li>
                        @else
                        <li><a href="{{ url('files') }}">Arquivos</a></li>
                        <li><a href="{{ url('clients') }}">Clientes</a></li>
                          <li><a href="{{ route('register') }}">Registrar</a></li>
                          <li><a href="{{ url('subscriptions') }}">Eventos</a></li>
                          <li><a href="{{ url('posts') }}">Post</a></li>
                          <li><a href="{{ url('portifolios') }}">Portfólios</a></li>
                            <li>
                                <a class="dropdown-button" href="#!" data-activates="dropdown2">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul id="dropdown2" class="dropdown-content" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>

@hasSection('back')
    @yield('back')
@else
<a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons icon-white">menu</i></a>
@endif
                </div>

        </nav>
  </div>
<!-- End Navbar -->
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/materialize.min.js') }}"></script>
    <script type="text/javascript">
      $('#search').on('keyup', function() {
        $value=$(this).val();
        $.ajax({
          type: 'get',
          url: '{{URL::to('search')}}',
          data: {'search':$value},
          success:function(data){
            $('tbody').html(data);
          }
        });
      })
    </script>
    <script type="text/javascript">
      function alert() {
        var strconfirm = confirm('Você tem certeza que deseja excluir esse cadastro?');
        if (strconfirm === true) {
          return true;
        }
        else{
            return false;
        }

      }
    </script>
    <script>
    $(document).ready(function(){

      $('.modal').modal();
      $('.slider').slider({
        full_width:true
      });
      $(".dropdown-button").dropdown();
       $('.parallax').parallax();
       // Initialize collapse button
       $(".button-collapse").sideNav();
       // Initialize collapsible (uncomment the line below if you use the dropdown variation)
       //$('.collapsible').collapsible()
       $('.carousel').carousel();
      $('select').material_select();
       $('.datepicker').pickadate({
         selectMonths: true,
         selectYears: 60,
         monthsFull: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
         monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
         weekdaysFull: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabádo'],
         weekdaysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
         weekdaysLetter: [ 'D', 'S', 'T', 'Q', 'Q', 'S', 'S' ],
         today: 'Hoje',
         clear: 'Limpar',
         close: '',
         format: 'dd/mm/yyyy',
         labelMonthNext: 'Próximo mês',
         labelMonthPrev: 'Mês anterior',
         labelMonthSelect: 'Selecione um mês',
         labelYearSelect: 'Selecione um ano',
         closeOnSelect: true
       });
     });
    </script>

</body>
</html>

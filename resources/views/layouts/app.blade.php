<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="icon" type="image/png" href="{{ asset('images/icons/favicon.ico') }}"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('sidebar/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('css/component-chosen.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}">
</head>
<body>

<div class="wrapper d-flex align-items-stretch">
      @if(Auth::guard('citoyen')->user())
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                    </button>
                </div>
                 
                <h1><a href="{{route('prendre_rendez_vous')}}" class="logo"> Menu</a></h1>
                <ul class="list-unstyled components mb-5">
                    <li>
                        <a href="{{route('prendre_rendez_vous')}}"><span class="fa fa-calendar mr-3"></span>Prendre Rendez-Vous</a>
                    </li>
                    <li>
                        <a href="{{route('dossiers')}}"><span class="fa fa-folder mr-3"></span> l'état des dossiers</a>
                    </li>
                    <li>
                      <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed"><span class="fa fa-print mr-3"></span> Impression Des actes</a>
                      <ul class="list-unstyled collapse" id="pageSubmenu" style="">
                        <li>
                          <a href="{{route('acte_naissance')}}">Acte de naissance</a>
                        </li>
                        <li>
                          <a href="{{route('acte_mariage')}}">Acte de Mariage</a>
                        </li>
                        <li>
                          <a href="{{route('acte_divorce')}}">Acte de divorce</a>
                        </li>
                      </ul>
                    </li>
                    <li>
                      <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed"><span class="fas fa-sign-out-alt mr-3"></span> Session</a>
                      <ul class="list-unstyled collapse" id="homeSubmenu" style="">
                        <li>
                          <a onclick="event.preventDefault();document.getElementById('logout-form').submit();" href="#"><span class="fa fa-sign-in mr-3"></span> Deconnexion</a>
                        <form id="logout-form" action="{{ route('logoutt') }}" method="POST" class="d-none">
                          @csrf
                        </form>
                        </li>
                      </ul>
                    </li>
                </ul>
                @endif

      @auth
      @if(Auth::user()->type=="agent")
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                    </button>
                </div>
                 
                <h1><a href="{{route('prendre_rendez_vous')}}" class="logo"> Menu</a></h1>
                <ul class="list-unstyled components mb-5">
                    <li>
                        <a href="{{route('statistiques')}}"><i class="fa fa-bar-chart mr-3" aria-hidden="false" ></i>Les statistiques</a>
                    </li>
                    <li>
                        <a href="{{route('gestion_registes')}}"><span class="fa fa-user-plus mr-3"></span>Gestion des registres</a>
                    </li>
                    <li>
                        <a href="{{route('gestion_rdvs')}}"><span class="fa fa-calendar mr-3"></span> Gérer rendez vous</a>
                    </li>
                    <li>
                        <a href="{{route('gestion_rdvs_ins')}}"><span class="fa fa-calendar mr-3"></span> Gérer RDV d'inscription</a>
                    </li>
                    <li>
                        <a href="{{route('gestion_dossiers')}}"><span class="fa fa-folder mr-3"></span> Gérer les dossiers</a>
                    </li>
                    <li>
                        <a href="{{route('gestion_actes')}}"><span class="fa fa-paperclip mr-3"></span> Gérer les actes</a>
                    </li>
                    <li>
                      <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed"><span class="fas fa-sign-out-alt mr-3"></span> fin du Session</a>
                      <ul class="list-unstyled collapse" id="homeSubmenu" style="">
                        <li>
                          <a onclick="event.preventDefault();document.getElementById('logout-form').submit();" href="#"><span class="fa fa-sign-out mr-3"></span> Deconnexion</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                        </form>
                        </li>
                      </ul>
                    </li>
                </ul>
                @endif
                @endauth
      @auth
      @if(Auth::user()->type=="admin")
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                    </button>
                </div>
                 
                <h1><a href="{{route('prendre_rendez_vous')}}" class="logo"> Menu</a></h1>
                <ul class="list-unstyled components mb-5">
                    <li>
                        <a href="{{route('statistiques_admin')}}"><span class="fa fa-bar-chart mr-3" ></span>Les statistiques</a>
                    </li>
                    <li>
                        <a href="{{route('agents')}}"><i class="fa fa-user mr-3"></i> Gérer les agences</a>
                    </li>
                    <li>
                      <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed"><span class="fas fa-sign-out-alt mr-3"></span> Session</a>
                      <ul class="list-unstyled collapse" id="homeSubmenu" style="">
                        <li>
                          <a onclick="event.preventDefault();document.getElementById('logout-form').submit();" href="#"><span class="fa fa-sign-in mr-3"></span> Deconnexion</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                        </form>
                        </li>
                      </ul>
                    </li>
                </ul>
                @endif
                @endauth
            </nav>
        <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
    @yield('content')
    </div>
</div>
</body>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('sidebar/js/main.js') }}"></script>
    <script src="{{ asset('js/chosen.jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
</html>

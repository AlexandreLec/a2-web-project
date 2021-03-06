
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BDE CESI</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" >

        <!-- CSS files -->
        {{ Html::style('css/general.css') }}
        <meta name="_token" content="{{ csrf_token() }}"/>
        @if (isset($user))
        <span id="id-user" hidden>{{ $user->id }}</span>
        <span id="id-group-user" hidden>{{ $user->id_group }}</span>
        @endif

        <!-- Script files -->
        <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>

        <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

         @yield('css')
    </head>

    <body>
        <header>
            <img alt='logo du bde' id="logo" src="/img/bde_arras.png" />
            <h1>@yield('title-page')</h1>
            <span id="top-bar">
            @yield('bar')
            </span>
            <div id="right-bar">
                @if (isset($user))
                <button id="notif">
                    <i class="fas fa-bell fa-2x"></i>
                </button>
                    
                <div id="sign-notif">
                    <form> 
                        <label id= "titlenotif">Notification </label> <label id = "nom"></label>
                           
                    </form>
                    <button id="del-notif">Supprimer</button>
                 </div>
    
                @endif

                @if (!isset($user))
                <button id="connexion">
                    <i id="logo-connexion" class="fas fa-user fa-2x"></i><span id="text-connexion">Connexion<span>
                </button>    
                @else
                <div id="hello">
                    <p>Bonjour, {{ $user->first_name }}</p>
                </div>
                @endif
                <span id="menu"><i class="fas fa-bars fa-2x"></i></span>
            </div>
        </header>

        <nav>
            <ul>
                <li><a href="/">Accueil</a></li>
                <li><a href="/events/past">Evènements</a></li>
                <ul>
                    <li><a href="/events/soon">A venir</a></li>
                    <li><a href="/events/past">Terminés</a></li>
                    <li><a href="/events/ideas">Idées</a></li>
                </ul>
            </ul>
            <ul>
                <li><a href="/shop">Boutique</a></li>                
            </ul>
            <ul>
                @if (isset($user))
                <li><a href="/logout">Déconnexion</a></li>
                    @if ($user->checkAdmin())
                    <li><a href="/admin">Administration</a></li>
                    @elseif ($user->checkSalarie())
                    <li><a href="/report">Signaler un contenu</a></li>
                    @endif
                @endif
                
            </ul>
        </nav>

        <div id="sign-tab">
            <form method="POST" action="/signin">
                {{ csrf_field() }}
                <label>Identifiant </label><input name="login" type="text"/>
                <label>Mot de passe </label><input name="password" type="password"/>
                <button type="submit">Connexion</button>
                <span>Pas encore inscrit? - <a href="/register">Cliquer ici</a></span>
            </form>

        </div>

        <div id="mask"></div>
        
        <div class="container">
            @yield('content')
        </div>

        <footer>
            <div>
                Contact : 
                <i class="fab fa-facebook-square"></i>
                <i class="fab fa-twitter-square"></i>
                <i class="fas fa-envelope"></i>
            </div>
            <div>
                <a href="/legal">Mentions Légales</a> | 
                <a href="/plan">Plan du Site</a>
            </div>
            <div>
                <a href="/help">Help 
                <i class="fas fa-question-circle"></i></a>
            </div>
        </footer>

        {{ Html::script('js/nav.js') }}
        {{ Html::script('js/notif.js') }}
        {{ Html::script('js/participate.js') }}
    </body>
</html>


<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BDE CESI</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- CSS files -->
        {{ Html::style('css/general.css') }}
        @yield('css')

        <!-- Script files -->

        <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
    </head>

    <body>
        <header>
            <img alt='logo du bde' id="logo" src="img/bde_arras.png" />
            <h1>@yield('title-page')</h1>
            <div id="right-bar">
                <span id="notif"><i class="fas fa-bell fa-2x"></i></span>
                <button id="connexion">
                    <i id="logo-connexion" class="fas fa-user fa-2x"></i><span id="text-connexion">Connexion<span>
                </button>
                <span id="menu"><i class="fas fa-bars fa-2x"></i></span>
            </div>
        </header>

        <nav>
            <ul>
                <li><a href="/">Accueil</a></li>
                <li><a href="/events">Evènements</a></li>
                <li><a href="/asso">Associations</a></li>
            </ul>
            <ul>
                <li><a href="/shop">Boutique</a></li>                
            </ul>
            <ul>
                <li><a href="/signin">Connexion</a></li>
                <li><a href="admin">Administration</a></li>
            </ul>
        </nav>

        <div id="sign-tab">
            <form>
                <label>Identifiant </label><input type="login"/>
                <label>Mot de passe </label><input type="password"/>
                <button type="submit">Connexion</button>
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
    </body>
</html>

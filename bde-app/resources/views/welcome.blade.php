@extends('template')

@section('css')

    {{ Html::style('css/accueil.css') }}
    <!-- CSS -->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <!-- JavaScript -->
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
@stop

@section('title-page')

    

@stop

@section('content')
    
    <section class="board">
    <article class="board-pic">

            <div class="carousel">
                <div class="carousel-cell"><img src="https://picsum.photos/1000/500"/></div>
                <div class="carousel-cell"><img src="https://picsum.photos/1000/500"/></div>
                <div class="carousel-cell"><img src="https://picsum.photos/1000/500"/></div>
                <div class="carousel-cell"><img src="https://picsum.photos/1000/500"/></div>
                <div class="carousel-cell"><img src="https://picsum.photos/1000/500"/></div>
            </div>
        </article>        
        <article class="board-pres">
            <div class="overview">
                <div class="intro">
                    <h1>Le BDE de l'école d'ingénieur CESI</h1>
                    <p id="text-intro">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <div class="top-products">
                    
                </div>
            </div>
            <div class="top-event">
                <h2>Event du mois : Karting</h2>
                <p id="text-event">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <div id="event-pic"><img src="https://picsum.photos/300"/></div>
            </div>
        </article>
        
    </section>

@stop
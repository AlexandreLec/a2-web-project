@extends('template')

@section('css')

    {{ Html::style('css/accueil.css') }}
    <!-- CSS -->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <!-- JavaScript -->
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
@stop

@section('title-page')

    Accueil
    
<?php 
        if(Auth::check()) {
    		$user = Auth::user();
            if($user->group->id === 3){ 
    echo'
    <a "id="buttonDownload" href="/downloadZip" ><button type="button">Download Image</button></a>';
            }
        }
        ?>



@stop



@section('content')
    
    <section class="board">
    <article class="board-pic">

            <div class="carousel">
                @foreach ($pictures as $picture)
                    <div class="carousel-cell"><img src="{{ 'event/img/'.$picture }}"/></div>
                @endforeach
            </div>
        </article>        
        <article class="board-pres">
            <div class="overview">
                <div class="intro">
                    <h1>Le BDE de l'école d'ingénieur CESI</h1>
                    <p id="text-intro">Le Bureau des étudiants est l’association en charge de la vie étudiante de l'école d'ingénieur CESI. Il s’occupe aussi bien de l’organisation d’événements que de l’amélioration de la vie quotidienne sur le campus. Ce sont donc des étudiants, éluent par les étudiants pour les étudiants.</p>
                </div>
                <div class="top-products">
                    
                </div>
            </div>
            <div class="top-event">
                <h2>Event du mois : {{ $monthEvent->name }}</h2>
                <p id="text-event">{{ $monthEvent->description }}</p>
                <div id="event-pic"><img src="{{ $monthEvent->url_img }}"/></div>
            </div>
        </article>
        
    </section>

@stop
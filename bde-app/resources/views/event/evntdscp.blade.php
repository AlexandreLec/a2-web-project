@extends ('template')

@section('css')
{{ Html::style('css/event_desc.css') }}
@stop

@section('content')

<div class="event">
    <a href="/event/past"><button class="back" > <--   Retourner aux events</button></a>

    <div id="info">
        <div class="title">
            <h2>{{ $eventid->name }}</h2>
            <div class="info">
                
                <div class="field">    
                    <i class="fas fa-male"></i><p class='people'>{{ $eventid->nbrParticipants() }}</p>
                </div>
                
                <div class="field">    
                    <i class="far fa-calendar-alt"></i><p class='date'>{{ $eventid->event_date }} </p>
                </div>
                
                <div class="field"> 
                    <i class="fas fa-map-marker-alt"></i><p class='place'>{{ $eventid->location }}</p>
                </div>
            </div>
        </div>
        <div class="rest">
            <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L'avantage du Lorem Ipsum sur un texte générique comme 'Du texte. Du texte. Du texte.' est qu'il possède une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du français standard.</p>



            <div class="upldimg">
                <label for="usrimg">Vous avez une image de cet évènement?</label>
                <form action="/events/desc/{id}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" id="eventid" name="event_id" value="{{ $eventid->id }}">
                    <input type="file" id="usrimg" name="photo">
                    <input id="submit" type="submit" value="Poster image">
                </form>
            </div>  
        </div>
    </div>
        
    <div id="photos">
        <img src="/storage/users_upload/idea/games.png">
        <img src="/storage/users_upload/idea/games.png">
        <img src="/storage/users_upload/idea/paintball.png">
        <img src="/storage/users_upload/idea/games.png">
        <img src="/storage/users_upload/idea/games.png">
        <img src="/storage/users_upload/idea/games.png">
        <img src="/storage/users_upload/idea/paintball.png">
        <img src="/storage/users_upload/idea/games.png">
        <img src="/storage/users_upload/idea/paintball.png">
        <img src="/storage/users_upload/idea/games.png">
        <img src="/storage/users_upload/idea/games.png">
        <img src="/storage/users_upload/idea/games.png">
        <img src="/storage/users_upload/idea/paintball.png">
        
    </div>
</div>

{{ Html::script('js/load_imgs.js') }}

@stop
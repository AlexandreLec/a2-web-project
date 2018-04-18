@extends ('event.events')


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
                    <<input type="hidden" id="imgsloaded" value="0">
                    <input type="file" id="usrimg" name="photo">
                    <input id="submit" type="submit" value="Poster image">
                </form>
            </div>  
        </div>
    </div>
        
    <div id="photos">
<!--        <div class="fixed-aspect-ratio-container square">
            <img id="myImg" src="/storage/users_upload/event/mpfswW4QgatFkGYuZR7bwI4nRqNhZEBXKTbRz6X8.png">
        </div>-->
    </div>
    
    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="image">
                <img id="mdlImg" src="">
            </div>
            <p>Some text in the Modal..</p>
        </div>

    </div>
</div>

{{ Html::script('js/load_imgs.js') }}
{{ Html::script('js/click_on_img.js') }}


@stop

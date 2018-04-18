@extends('event.events')

@section('content')
<div class="card-container">

    @foreach ($events as $event)
    <div class="card_idea"> 

       <div class ="idea_title">
            <i class="fas fa-angle-double-right"></i>
            <h2>{{ $event->name }}</h2>
        </div>

        <div class="event_date"> 

            <i class="far fa-calendar"></i>
            <p class="date-margin">{{ $event->event_date }}</p>
           
            <i class="fas fa-clock"></i>
            <p>{{ $event->event_time }}</p>
            
        </div> 

        <div class="card_descrip"> 
           <p>{{ $event->descriptionShort }}</p>
        </div>

        <div class="button">
            <a href="/events/soon/{{ $event->id }}"><button class="button-red" type="button">Détail</button></a>
            <button class="button-red subscribe" id="{{ $event->id }}" type="button"> S'inscrire </button>
        </div>
    </div>
    {{ Html::script('js/subscribe.js') }}
@endforeach
</div>   

@stop
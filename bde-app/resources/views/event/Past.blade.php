@extends('event.events')

@section('content')
<div class="Pastcontainer">
    
    @foreach ($events as $event)
    
    <div class="cardevent"> 
                
            <div class="event-info">
                 <div class ="event-title">
                    <i class="fas fa-angle-double-right"></i>
                    {{ $event->name }}
                 </div>

                 <div class="event-participate">
                <i class="fas fa-users"></i>
                {{ $event-> nbrParticipants() }}
                </div>
                      
                 <div class="event-date">
                        <i class="far fa-calendar"></i>
                        {{ $event->event_date }}
                </div> 
            </div>

                <div class="event-descrip"> 
                <p>{{ $event->description }}</p>
        </div>

                <div class="event-img">
                <img id="photo" src="{{ $event->url_img }}">
                </div>

        <div class="button">
            <a href="/events/desc/{{ $event->id }}"><button class="button button-red" type="button">Plus de photos --> </button></a>
</div>

</div>
    @endforeach
</div>

@stop
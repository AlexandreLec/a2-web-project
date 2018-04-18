@extends('event.events')

@section('content')
<div class="globalcontainer">
    
    @foreach ($events as $event)
    
    <div class="card_idea"> 
                
            <div class"event_info">
                 <div class ="event_title">
                     <div class="icon">
                    <i class="fas fa-angle-double-right"></i>
                    </div>
                         <h2>{{ $event->name }}</h2>
                    </div>
                       
                 <div class="event_date"> 
                     
                <p>{{ $event->event_date }}</p>
                <div class="icon">
                        <i class="far fa-calendar"></i>
                    </div>
                </div> 
            </div>

                 <div class="event_descrip"> 
                         <p>{{ $event->description }}</p>
        </div>

            <div class="button">
                <a href="/events/soon/{{ $event->id }}"><button type="button">Plus d'information </button></a>
                <button type="button"> S'inscrire </button>
            </div>

        
</div>
</div>
    @endforeach
</div>

@stop
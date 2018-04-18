@extends('event.events')

@section('content')
<div class="container">
    
    @foreach ($events as $event)
    
    <div class="cardevent"> 
                
            <div class"event-info">
                 <div class ="event-title">
                     <div class="icon-event">
                    <i class="fas fa-angle-double-right"></i>
                    </div>
                         <h2>{{ $event->name }}</h2>
                 </div>

                 <div class="event-participate">
                    <p> {{ $event-> nbrParticipants }} </p>
                <div class="icon-event">

                </div>
                    
                

                       
                 <div class="event-date"> 
                <p>{{ $event->event_date }}</p>
                <div class="icon-event">
                        <i class="far fa-calendar"></i>
                    </div>
                </div> 
            </div>

                 <div class="event-descrip"> 
                         <p>{{ $event->description }}</p>
        </div>

</div>
</div>
    @endforeach
</div>

@stop
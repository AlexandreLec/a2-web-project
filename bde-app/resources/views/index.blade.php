@extends('event.events')

@section('css')
    {{ Html::style('css/event.css') }}
@stop

<div class="globalcontainer">
    
    @foreach ($events as $event)
    <div class="card_idea"> 
                
                 <div class ="event_title">
                         <h2>{{ $event->name }}</h2>
                 </div>
                        
                 <div class="event_descrip"> 
                         <p>{{ $event->descriptionShort }}</p>
                </div>

                <div class="event_location"> 
                         <p>{{ $event->location }}</p>
                </div>
                
                <div class="event_img"> 
                    <img src="{{ $event->url_img }}">
                </div>

                <div class="event_date"> 
                         <p>{{ $event->event_date }}</p>
                </div>

                <div class="event_time"> 
                         <p>{{ $event->event_time }}</p>
                </div>

                <div class="event_price"> 
                         <p>{{ $event->event_price }}</p>
                </div>

                <div class="event_recurrence"> 
                         <p>{{ $event->event_recurrence }}</p>
                </div>
                    
            
    </div>
    @endforeach
</div>

@stop
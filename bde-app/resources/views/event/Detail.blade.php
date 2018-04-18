@extends('event.events')

@section('content')
<div class="totalcontainer">
    
    
    <div class="card_event"> 
                
            
                 <div class ="title_event">
                     <div class="icon_event">
                    <i class="fas fa-angle-double-right"></i>
                    </div>
                         <h2>{{ $event->name }}</h2>
                 </div>
                  
                 <div class="img_event"> 
                 <img src="{{ $event->url_img }}">
                </div> 

                 <div class="descrip_event">
                         <p>{{ $event->description }}</p>
                </div>

                <div class="info_event">
                <div class="location_event"> 
                <div class="icon_event">
                <i class="far fa-compass"></i>
                </div>
                <p>{{ $event->location }}</p>
                </div>

                 <div class="date_event"> 
                     <div class="icon_event">
                        <i class="far fa-calendar"></i>
                    </div>
                <p>{{ $event->event_date }}</p>
                </div> 

                <div class="time_event"> 
                <div class="icon_event">
                <i class="far fa-clock"></i>
                </div>
                <p>{{ $event->event_time }}</p>
                </div>

                <div class="price_event">
                <div class="icon_event">
                <i class="fas fa-euro-sign"></i>
                </div>
                <p>{{ $event->price }}</p>
                </div>

                <div class="recurrence_event"> 
                <p>{{ $event->recurrence }}</p>
                </div>
                </div>
            </div>
    </div>

@stop
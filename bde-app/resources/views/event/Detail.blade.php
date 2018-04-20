@extends('event.events')

@section('content')
<div class="globalcontainer">
    
    
    <div class="title-event-detail">
        <i class="fas fa-angle-double-right"></i>
        {{ $event->name }}
    </div>


    <div class="info-event">
        <div class="location">
            <p> {{ $event->location }} </p>
            <i class="far fa-compass"></i>
        </div>
        <div class="date_event">
            <p>{{ $event->event_date }}</p> 
            <i class="far fa-calendar"></i>
        </div> 
        <div class="time_event">        
            <p>{{ $event->event_time }}</p>
            <i class="far fa-clock"></i>
        </div>
        <div class="price">
            @if ($event->price == 0)
            <p> Gratuit </p>
            @else
            <p> {{ $event->price}} </p>
            @endif
            <i class="fas fa-euro-sign"></i>
        </div>
    </div>     
</div>
    <div class="img-soon">
        <img src="{{ $event->url_img }}">
        </div>
        
    <div class="description"> 
        <p>{{ $event->description }}</p>
    </div>


@stop
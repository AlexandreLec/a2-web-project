@extends ('event.events')

@section('content')

<div class="globalcontainer">
    
    <div class="title-event-detail">
        {{ $idea->name }}
    </div>


    <div class="info-event">

    <div class="price">
        @if ($idea->price == 0)
            <p> Gratuit </p>
        @else
            <p> {{ $idea->price}} </p>
        @endif
        <i class="fas fa-euro-sign"></i>
    </div>

    <div class="location">
        <p> {{ $idea->location}} </p>
        <i class="far fa-compass"></i>
    </div>

        
         <div class="like"><span>{{ $idea->getPoll() }}</span>
         <i class="fas fa-thumbs-up"></i>
        </div>
        
        
</div>     
</div>
    <div class="img">
        <img src="{{ $idea->url_img }}">
        </div>
        
    <div class="description"> 
        <p>{{ $idea->description }}</p>
    </div>

@stop

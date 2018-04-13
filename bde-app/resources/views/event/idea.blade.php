@extends ('template')
@section('css')
{{ Html::style('css/idea.css') }}
@stop
@section('content')

<div class="globalcontainer">
    
    <div class="title">
        {{ $idea->name }}
    </div>


    <div class=info>

    <div class="price">
        <p> {{ $idea->price}} </p>
        <div class="icon">
        <i class="fas fa-euro-sign"></i>
</div>
    </div>

    <div class="location">
        <p> {{ $idea->location}} </p>
        <div class="icon">
        <i class="fas fa-map-marker"></i>
        </div>
    </div>

        
         <div class="like"><span>{{ $idea->getPoll() }}</span>
         <div class="icon">
         <i class="fas fa-thumbs-up"></i>
        </div>
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

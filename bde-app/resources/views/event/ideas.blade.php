@extends('event.events')

@section('content')

<div class="card-container">
    
    @foreach ($ideas as $idea)
    <div class="card_idea"> 
                
                 <div class ="idea_title">
                         <h2>{{ $idea->name }}</h2>
                         {{ $idea->getPoll() }}
                         <i class="fas fa-thumbs-up"></i>
                 </div>
            
                     <div class="card_img"> 
                          <img src="{{ $idea->url_img }}">
                     </div>

                    <div class="card_descrip"> 
                         <p>{{ $idea->description }}</p>
                    </div>
            
                    <div class="idea_detail">
                        <form>
                             <button type="submit">Voir détails</button>
                        </form>
                    </div>
    </div>
    @endforeach
</div>   

<div class="idea_button">
    <form>
        <button type="submit">Proposer une nouvelle idée</button>
    </form>
</div>
        
@stop
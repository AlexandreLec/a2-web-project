@extends ('event.events')


@section('content')

<div class="event">
    <a href="/events/past"><button class="back" > <--   Retourner aux events</button></a>

    <div id="info">
        <div class="title">
            <h2>{{ $event->name }}</h2>
            <div class="info">
                
                <div class="field">    
                    <i class="fas fa-male"></i><p class='people'>{{ $event->nbrParticipants() }}</p>
                </div>
                
                <div class="field">    
                    <i class="far fa-calendar-alt"></i><p class='date'>{{ $event->event_date }} </p>
                </div>
                
                <div class="field"> 
                    <i class="fas fa-map-marker-alt"></i><p class='place'>{{ $event->location }}</p>
                </div>
            </div>
        </div>
        <div class="rest">
            <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L'avantage du Lorem Ipsum sur un texte générique comme 'Du texte. Du texte. Du texte.' est qu'il possède une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du français standard.</p>



            <div class="upldimg">
                <label for="usrimg">Vous avez une image de cet évènement?</label>
                <form action="/events/desc/{{ $event->id }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" id="eventid" name="event_id" value="{{ $event->id }}">
                    <input type="hidden" id="imgsloaded" value="0">
                    <input type="file" id="usrimg" name="photo">
                    <input id="submit" type="submit" value="Poster image">
                </form>
            </div>  
        </div>
    </div>
        
    <div id="photos"></div>
 </div>   
    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div id="modal-content" class="modal-content">
            
            <div class="corps">
                <div id="sideContent">
                    <span id="close-window"><i class="fas fa-times-circle"></i></span>
                    <div id="img-header">
                        <div class="metadata">
                            <p>postée le  <i id="imgDate">Date</i> par <i id="imgUser">User</i></p>
                        </div>
                        <div class="like">
                            <div class="button-red"><span class="img-like">10</span><i class="fas fa-thumbs-up"></i></div>
                        </div>
                    </div>
  <!------- COMMENTS AREA ---- added in JS ------------>
                    <div id="comments">
                        <!--Single comment-->
                        <div class="comment">
                            <div class="cmtMeta"><p>User, le date à time</p></div>
                            <div class="cmtTextArea">
                                <p>Nous avons passé un fabuleux moment entre amis et sous le soleil, à refaire</p>   
                            </div>
                                <span class="del-comment">Supprimer</span>

                        </div>
                    </div>
  
        <!--ADD A COMMENT-->
                    <div id="reply">
                        <div>
                            <input type="text" placeholder="Ajouter un commentaire..." id='add-comment' name="comment">
                            <button class="button-red" id='send-comment'><i class="fas fa-paper-plane"></i></button>
                        </div>
                    </div> 
                </div>
                <div id="imgContainer" >
                    <div id="mdlImg">
                        <!--poped up image-->
                    </div>
                </div>   
            </div>
        </div>
    </div>





{{ Html::script('js/load_imgs.js') }}
{{ Html::script('js/event_img_detail.js') }}

@stop

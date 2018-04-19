@extends ('event.events')


@section('content')

<div class="event">
    <a href="/events/past"><button class="back" > <--   Retourner aux events</button></a>

    <div id="info">
        <div class="title">
            <h2>{{ $eventid->name }}</h2>
            <div class="info">
                
                <div class="field">    
                    <i class="fas fa-male"></i><p class='people'>{{ $eventid->nbrParticipants() }}</p>
                </div>
                
                <div class="field">    
                    <i class="far fa-calendar-alt"></i><p class='date'>{{ $eventid->event_date }} </p>
                </div>
                
                <div class="field"> 
                    <i class="fas fa-map-marker-alt"></i><p class='place'>{{ $eventid->location }}</p>
                </div>
            </div>
        </div>
        <div class="rest">
            <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L'avantage du Lorem Ipsum sur un texte générique comme 'Du texte. Du texte. Du texte.' est qu'il possède une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du français standard.</p>



            <div class="upldimg">
                <label for="usrimg">Vous avez une image de cet évènement?</label>
                <form action="/events/desc/{{ $eventid->id }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" id="eventid" name="event_id" value="{{ $eventid->id }}">
                    <input type="hidden" id="imgsloaded" value="0">
                    <input type="file" id="usrimg" name="photo">
                    <input id="submit" type="submit" value="Poster image">
                </form>
            </div>  
        </div>
    </div>
        
    <div id="photos">
      
    </div>
 </div>   
    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="corps">
                <div id="sideContent">
                    <div id="comntHeader">
                        <div class="metadata">
                            <p>postée le  <i id="imgDate">Date</i></p>
                            <p>par  <i id="imgUser">User</i></p>
                        </div>
                        <div class="like">
                            <div class="likeNbr">34</div>
                            <button>Like</button>
                        </div>
                    </div>
  <!------- COMMENTS AREA ---- added in JS ------------>
                    <div id="comments">
                        <!--Single comment-->
                        <div class="comment">
                            <div class="cmtMeta">
                                <p>
                                    <i class="cmtDate">date</i>
                                    -
                                    <i class="cmtTime">time</i>
                                </p>
                                <p class="cmtUser">User</p>
                            </div>
                            <div class="cmtTextArea">
                                <p>Nous avons passé un fabuleux moment entre amis et sous le soleil, à refaire</p>
                                <p><i class="fas fa-caret-down"></i></p>
                            </div>
                        </div>
                        <div class="ownComment">
                            <div class="comment">
                                <div class="cmtMeta">
                                    <p>
                                        <i class="cmtDate">date</i>
                                        -
                                        <i class="cmtTime">time</i>
                                    </p>
                                    <p class="cmtUser"></p>
                                </div>
                                <div class="cmtTextArea">
                                    <p>Top! À refaire, svp.... ;)</p>
                                    <p><i class="fas fa-caret-down"></i></p>
                                </div>
                            </div>
                        </div>
                    </div>
  
        <!--ADD A COMMENT-->
                    <div id="reply">
                        <input type="text" placeholder="Ajouter un commentaire..." name="comment">
                        <input type="submit" value="-->">
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

@stop

@extends ('template')

@section('css')
{{ Html::style('css/event_desc.css') }}
@stop

@section('content')

<div class="event">
    <button href="/events/past" class="back">Retourner aux events</button>

    <div id="info">
        <div class="title">
            <h2>{{ $eventid->name }}</h2>
            <div class="info">
                <i class="fas fa-male"></i>
                <p class='people'>{{ $eventid->nbrParticipants() }}</p>

                <i class="far fa-calendar-alt"></i>
                <p class='date'>{{ $eventid->event_date }} </p>

                <i class="fas fa-map-marker-alt"></i>
                <p class='place'>{{ $eventid->location }}</p>
            </div>
        </div>
        <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L'avantage du Lorem Ipsum sur un texte générique comme 'Du texte. Du texte. Du texte.' est qu'il possède une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du français standard.</p>

    </div>

    <div class="photos">

        <div class="upldimg"
            <label for="usrimg">Vous avez une image de cet évènement?</label>
            <form action="/events/desc/{id}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="event_id" value="{{ $eventid->id }}">
                <input type="file" id="usrimg" name="photo">
                <input type="submit" value="Poster image">
            </form>
        </div>

        <div class="row">
            <div class="column">
              <img src="/storage/users_upload/event/6XIRokoCqjrxU6iqFyjFUXzk9OBjFoqbBOhufVef.jpeg">
              <img src="/storage/users_upload/event/6XIRokoCqjrxU6iqFyjFUXzk9OBjFoqbBOhufVef.jpeg">
              <img src="/storage/users_upload/event/6XIRokoCqjrxU6iqFyjFUXzk9OBjFoqbBOhufVef.jpeg">
              <img src="/storage/users_upload/event/6XIRokoCqjrxU6iqFyjFUXzk9OBjFoqbBOhufVef.jpeg">
              <img src="/storage/users_upload/event/6XIRokoCqjrxU6iqFyjFUXzk9OBjFoqbBOhufVef.jpeg">
              <img src="/storage/users_upload/event/6XIRokoCqjrxU6iqFyjFUXzk9OBjFoqbBOhufVef.jpeg">
              <img src="/storage/users_upload/event/6XIRokoCqjrxU6iqFyjFUXzk9OBjFoqbBOhufVef.jpeg">
            </div>
            <div class="column">
              <img src="/storage/users_upload/event/6XIRokoCqjrxU6iqFyjFUXzk9OBjFoqbBOhufVef.jpeg">
              <img src="/storage/users_upload/event/6XIRokoCqjrxU6iqFyjFUXzk9OBjFoqbBOhufVef.jpeg">
              <img src="/storage/users_upload/event/6XIRokoCqjrxU6iqFyjFUXzk9OBjFoqbBOhufVef.jpeg">
              <img src="/storage/users_upload/event/6XIRokoCqjrxU6iqFyjFUXzk9OBjFoqbBOhufVef.jpeg">
              <img src="/storage/users_upload/event/6XIRokoCqjrxU6iqFyjFUXzk9OBjFoqbBOhufVef.jpeg">
              <img src="/storage/users_upload/event/6XIRokoCqjrxU6iqFyjFUXzk9OBjFoqbBOhufVef.jpeg">
            </div>
        </div>
        <div class="row">
            <div class="column">
              <img src="/storage/users_upload/event/6XIRokoCqjrxU6iqFyjFUXzk9OBjFoqbBOhufVef.jpeg">
              <img src="/storage/users_upload/event/6XIRokoCqjrxU6iqFyjFUXzk9OBjFoqbBOhufVef.jpeg">
              <img src="/storage/users_upload/event/6XIRokoCqjrxU6iqFyjFUXzk9OBjFoqbBOhufVef.jpeg">
              <img src="/storage/users_upload/event/6XIRokoCqjrxU6iqFyjFUXzk9OBjFoqbBOhufVef.jpeg">
              <img src="/storage/users_upload/event/6XIRokoCqjrxU6iqFyjFUXzk9OBjFoqbBOhufVef.jpeg">
              <img src="/storage/users_upload/event/6XIRokoCqjrxU6iqFyjFUXzk9OBjFoqbBOhufVef.jpeg">
              <img src="/storage/users_upload/event/6XIRokoCqjrxU6iqFyjFUXzk9OBjFoqbBOhufVef.jpeg">
            </div>
            <div class="column">
              <img src="/storage/users_upload/event/6XIRokoCqjrxU6iqFyjFUXzk9OBjFoqbBOhufVef.jpeg">
              <img src="/storage/users_upload/event/6XIRokoCqjrxU6iqFyjFUXzk9OBjFoqbBOhufVef.jpeg">
              <img src="/storage/users_upload/event/6XIRokoCqjrxU6iqFyjFUXzk9OBjFoqbBOhufVef.jpeg">
              <img src="/storage/users_upload/event/6XIRokoCqjrxU6iqFyjFUXzk9OBjFoqbBOhufVef.jpeg">
              <img src="/storage/users_upload/event/6XIRokoCqjrxU6iqFyjFUXzk9OBjFoqbBOhufVef.jpeg">
              <img src="/storage/users_upload/event/6XIRokoCqjrxU6iqFyjFUXzk9OBjFoqbBOhufVef.jpeg">
            </div>
        </div>

    </div>
</div>

{{ Html::script('js/load_imgs.js') }}

@stop

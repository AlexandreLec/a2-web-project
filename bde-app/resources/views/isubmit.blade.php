@extends('template')

@section('css')
    {{ Html::style('css/form.css') }}
    {{ Html::style('css/isubmit_idea.css') }}
@stop

@section('content')
    
<h1 id="Titre">Soumettre une idée d'évènement</h1>
    
<form  action="/events/ideas/create" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
        <div>
            <label class="text" for="name">Nom de l'event:</label>
            <input class="field" autofocus="true" type="text" id="name" name="event_name">
        </div>
        <div>
            <label for="period">Période de l'event</label>
            <select>
                <option>Matin</option>
                <option>Après-midi</option>
                <option>Soir</option>
                <optgroup label="Repas">
                    <option>Déjeuner</option>
                    <option>Dîner</option>
                    <option>Goûter</option>
                <optgroup/>
            </select>
        </div>
        <div>
            <label for="place">Lieu de l'event</label>
            <input type="text" id="place" name="event_place">
        </div>
        <div>
            <label for="description">Description :</label>
            <textarea id="description" name="event_desc" cols="40" rows="4" placeholder="Veuillez décrire l'event"></textarea>
        </div>
        <div>
            <label for="link">Lien site web</label>
            <input type="url" id="link" name="event_url">
        </div>
        <div>
            <label for="price">Prix</label>
            <input type="text" id="price" name="event_price">
            <input id="free" type="checkbox">
            <label for="free">Gratuit</label>
        </div>
        <div>
            <label for="img">Illustration</label>
            <input type="file" id="img"  name="photo">
        </div>
        
        <input type="submit" value="Soumettre l'idée">
        
</form>

@stop

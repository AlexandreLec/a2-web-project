@extends('template')

@section('css')
    {{ Html::style('css/form.css') }}
    {{ Html::style('css/submit_idea.css') }}
@stop

@section('content')

<div id="conteneur1">
    
    <h1 id="Titre">Soumettre une idée d'évènement</h1>
    
    <form  action="/events/ideas/create" method="POST" enctype="multipart/form-data" onsubmit="return FormValidation()">
        {{ csrf_field() }}
        
            <div class="field">
                <label class="text" for="name">Nom de l'event:</label>
                <input class="field" autofocus="true" type="text" id="name" name="event_name">
            </div>
        
            <div class="field">
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
        
            <div class="field">
                <label for="place">Lieu de l'event</label>
                <input type="text" id="place" name="event_place">
            </div>
        
            <div class="field">
                <label for="description">Description :</label>
                <textarea id="description" name="event_desc" cols="36" rows="4" placeholder="Veuillez décrire l'event"></textarea>
            </div>
        
            <div class="field">
                <label for="link">Lien site web</label>
                <input type="text" id="link" name="event_url">
            </div>
        
            <div class="field">
                <label for="price" id="pricelabel">Prix</label>
                <input type="text" id="price" name="event_price">
            </div>
        
            <div class="field">
                <label for="free" id="freelabel">Gratuit</label>
                <input class="checkbox" id="free" type="checkbox" name="free">
            </div>
        
            <div class="field">
                <label for="img">Illustration</label>
                <input type="file" id="img"  name="photo">
            </div>

        <input class="button button-red" type="submit" id="submit" value="Soumettre l'idée">

    </form>
</div>
{{ Html::script('js/check_newidea.js') }}
@stop


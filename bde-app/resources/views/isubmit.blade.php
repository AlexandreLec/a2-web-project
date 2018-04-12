@extends('template')

@section('css')
    {{ Html::style('css/submit_idea.css') }}
@stop

@section('content')
    
    <h1>Soumettre une idée d'évènement</h1>
    
    <form action="" method="">
        <div>
            <label for="name">Nom de l'événement:</label>
            <input autofocus="true" type="text" id="name" name="event_name">
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
            <input type="file" accept="image/*" multiple>
        </div>
        
        <input type="submit" value="Soumettre l'idée">
        
    </form>

@stop

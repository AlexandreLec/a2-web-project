@extends('template')

@section('css')
    {{ Html::style('css/form.css') }}
    {{ Html::style('css/submit_idea.css') }}
@stop

@section('content')

<div id="conteneur1">
    
    <h1 id="Titre">Signaler un contenu</h1>
    
    <form action="" method="POST">
        {{ csrf_field() }}
        
            <div class="field">
                <label for="type">Type de contenu</label>
                <select id="type" name="type">
                    <option>Photo</option>
                    <option>Commentaire</option>
                    <option>Évènements</option>
                    <option>Idée d'évènement</option>
                    
                </select>
            </div>
        
            <div class="field">
                <label class="text" for="name">Nom de l'event</label>
                <input type="text" id="name" name="event_name">
            </div>
        
            <div class="field">
                <label for="pic_name">Nom de la photo</label>
                <input type="text" id="pic_name" name="pic_name">
            </div>
        
            <div class="field">
                <label for="info">Précisions</label>
                <textarea id="info" name="info" cols="36" rows="4" placeholder="Veuillez justifier le signalement"></textarea>
            </div>
        

        <input class="button button-red" type="submit" id="submit" value="Soumettre l'idée">

    </form>
</div>

@stop


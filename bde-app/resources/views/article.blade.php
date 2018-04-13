@extends('template')
@section('css')
    {{ Html::style('css/article.css') }}
    {{ Html::style('css/form.css') }}
@stop
@section('content')
    
    <h1 id="Titre">Ajouter un article</h1>


<div id="conteneur1">
   
    <div class="field">
        <label for="name">* Nom de l'article</label>
        <i class="fas fa-angle-double-right"></i><input type="text" name="name" id="name" />
   </div>

    <div class="field">
        <label for="price">* Prix de l'article</label>
        <i class="fas fa-euro-sign"></i><input type="number" name="price" id="price" />
   </div>

    <div class="field">
        <label for="description">* Description</label>
        <i class="fas fa-align-justify"></i><input type"email" name="description" id="description" />
    </div>

    <div class="field">
        <label for="picture">* Photo de l'article</label>
        <i class="fas fa-image"></i><input type"file" name="picture" id="picture" />
    </div>  
</div>

<div class="button"><a href="page.html"> Mettre en vente </a></div>

@stop
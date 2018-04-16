@extends('template')
@section('css')
    {{ Html::style('css/register.css') }}
    {{ Html::style('css/form.css') }}
    
@stop
@section('content')
    
    <h1 id="Titre">Inscription</h1>

<form method='POST'>
    {{ csrf_field() }}

<div id="conteneur1">
   
    <div class="field">
        <div class="text">
            <label for="Name">* Votre nom</label>
        </div>
        <div class="icon">
            <i class="fas fa-user"></i><input type="text" name="Name" id="Name" />
        </div>
  </div>


    <div class="field">
        <div class="text">
            <label for="Surname">* Votre Prénom</label>
        </div>
        <div class="icon">
            <i class="far fa-user"></i><input type="text" name="Surname" id="Surname" />
        </div>
   </div>

    <div class="field">
    <div class="text">
        <label for="Mail">* Email Viacesi</label>
    </div>
    <div class="icon">
        <i class="fas fa-envelope"></i><input type"email" name="Mail" id="Mail" />
    </div>   
    </div>     

    <div class="field">
        <div class="text">
            <label for="Password">* Mot De Passe</label>
        </div>
        <div class="icon">
             <i class="fas fa-lock"></i><input type="password" name="Password" id="Password"/>
        </div>
        </div>
       
    <div class="field">
        <div class="text">
            <label for="Passwordv">* Confirmation</label>
        </div>
        <div class="icon">   
            <i class="fas fa-lock"></i><input type="password" name="Passwordv" id="Passwordv"/>
        </div>
   </div>


   <div class="field">
        <div class="text">
       <label for="Training">* Formation</label>
        </div>
        <div class="icon">
        <i class="fas fa-graduation-cap"></i>
        <select name="Grade" id="Grade">
            <option value="Etudiant EXIA">Exia</option>
            <option value="Etudiant EI">EI</option>
            <option value="Salarié CESI">Corp</option>
        </select>
        </div>
   </div>
</div> 

    <div class="button">
    <input id="btnSubmit" type="submit" value="S'inscrire">
    </div>

</form>    
{{ Html::script('js/check_connex.js') }}
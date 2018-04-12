@extends('template')
@section('css')
    {{ Html::style('css/register.css') }}
    {{ Html::style('css/form.css') }}
    {{ Html::style('js/check_connex.js') }}
@stop
@section('content')
    
    <h1 id="Titre">Inscription</h1>

<form action="" method='POST'>
{{ csrf_field() }}

<div id="conteneur1">
   
    <div class="field">
        <div classe="text">
            <label for="Name">* Votre nom</label>
        </div>
        <div class="icon">
            <i class="fas fa-user"></i><input type="text" name="Name" id="Name" />
        </div>
  </div>


    <div class="field">
        <div classe="text">
            <label for="Surname">* Votre Prénom</label>
        </div>
        <div class="icon">
            <i class="far fa-user"></i><input type="text" name="Surname" id="Surname" />
        </div>
   </div>

    <div class="field">
    <div classe="text">
        <label for="Mail">* Email Viacesi</label>
    </div>
    <div class="icon">
        <i class="fas fa-envelope"></i><input type"email" name="Mail" id="Mail" />
    </div>   
    </div>     

    <div class="field">
        <div classe="text">
            <label for="Password">* Mot De Passe</label>
        </div>
        <div class="icon">
             <i class="fas fa-lock"></i><input type="password" name="Password" id="Password"/>
        </div>
        </div>
       
    <div class="field">
        <div classe="text">
            <label for="Passwordv">* Confirmation du Mot De Passe</label>
        </div>
        <div class="icon">   
            <i class="fas fa-lock"></i><input type="password" name="Passwordv" id="Passwordv"/>
        </div>
   </div>


   <div class="field">
        <div classe="text">
       <label for="Training">* Formation</label>
        </div>
        <i class="fas fa-graduation-cap"></i>
        <select name="Grade" id="Grade">
            <option value="1">Exia</option>
            <option value="2">EI</option>
            <option value="3">Corp</option>
        </select>
   </div>
</div>
</form>    
    

<div class="button"><a href="RegisterConfirm.blade.php"> Créer votre compte </a></div>

@stop
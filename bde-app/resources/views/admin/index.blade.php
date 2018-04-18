@extends('template')

@section('css')

    {{ Html::style('css/admin.css') }}

    {{ Html::style('https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css') }}

    {{ Html::script('https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js') }}

    

@stop

@section('title-page')

    Administration

@stop

@section('content')

	<div id="admin-board">
		<section class="manage-board" id="access-manage">
	    	<h2>Accès rapide</h2>
	    	<ul>
	    		<a href="#events-manage"><li>Gestion des événenements à venir</li></a>
	    		<a href="#events-pasts-manage"><li>Gestion des événenements passés</li></a>
	    		<a href="#ideas-manage"><li>Gestion de la boîte à idées</li></a>
	    		<a href="#shop-manage"><li>Gestion de la boutique</li></a>
	    	<ul>
	    	
	    </section>
	    <section class="manage-board" id="events-manage">
	    	<h2>Evènements à venir</h2><button id="add-event">Ajouter un événement</button>
	    	<table id="events" class="display">
			    <thead>
			        <tr>
			            <th>Titre</th>
			            <th>Description</th>
			            <th>Lieu</th>
			            <th>Date</th>
			            <th>Heure</th>
			            <th>Prix</th>
			            <th>Recurrence</th>
			            <th>Catégorie</th>
			            <th>Action</th>
			        </tr>
			    </thead>
			    <tbody>
			    	
			    </tbody>
			</table>
			
	    </section>
	    <section class="manage-board" id="ideas-manage">
	    	<h2>Boîte à idées</h2>
	    	<table id="ideas" class="display">
			    <thead>
			        <tr>
			            <th>Titre</th>
			            <th>Lieu</th>
			            <th>Description</th>
			            <th>Prix</th>
			            <th>Vote</th>
			            <th>Soumis par</th>
			            <th>Action</th>
			        </tr>
			    </thead>
			    <tbody>
			    	
			    </tbody>
			</table>
	    </section>
	    <section class="manage-board" id="events-pasts-manage">
	    	<h2>Evènements passés</h2>
	    	<table id="events-past" class="display">
			    <thead>
			        <tr>
			            <th>Titre</th>
			            <th>Description</th>
			            <th>Lieu</th>
			            <th>Date</th>
			            <th>Heure</th>
			            <th>Prix</th>
			            <th>Recurrence</th>
			            <th>Catégorie</th>
			            <th>Action</th>
			        </tr>
			    </thead>
			    <tbody>
			    	
			    </tbody>
			</table>
	    </section>
	    <section class="manage-board" id="shop-manage">
	    	<h2>Boutique</h2>
	    </section>
	    <section class="manage-board" id="users-manage">
	    	<h2>Utilisateurs</h2>
	    	<table id="users" class="display">
			    <thead>
			        <tr>
			            <th>Prénom</th>
			            <th>Nom</th>
			            <th>Mail</th>
			            <th>Groupe</th>
			            <th>Action</th>
			        </tr>
			    </thead>
			    <tbody>
			    	
			    </tbody>
			</table>
	    </section>

	</div>
	<div class="board-edit">
		<form id="user-form" method="POST" action="/users/update/">
			{{ csrf_field() }}
	    	<label>Prénom</label><input id="name" name="firstname" type="text" />
	    	<label>Nom</label><input id="surname" name="surname" type="text" />
	    	<label>Mail</label><input id="mail" name="mail" type="text" />
	    	<label>Groupe</label>
	    	<select id="grade" name="grade">
	            <option id="Etudiant EXIA" value="Etudiant EXIA">Exia</option>
	            <option id="Etudiant EI" value="Etudiant EI">EI</option>
	            <option id="Salarié CESI" value="Salarié CESI">Corp</option>
	            <option id="Membre BDE" value="Membre BDE">Membre BDE</option>
        	</select>
        	<button type="submit">Mettre à jour</button>
        </form>
        <form id="event-form" method="POST" enctype="multipart/form-data" action="/event/insert/">
			{{ csrf_field() }}
			<h3>Ajouter un nouvel évènement</h3>
	    	<label>Nom</label><input id="event-name" name="name" type="text" />
	    	<label>Description</label><textarea rows="8" id="desc-event" name="desc" ></textarea>
	    	<label>Lieu</label><input id="event-location" name="location" type="text" />
	    	<label>Prix</label><input id="event-price" name="price" type="number" step="0.1" value="0" />
	    	<label>Date</label><input id="event-date" name="date" type="date" />
	    	<label>Heure</label><input id="event-hour" name="hour" type="time" />
			<label>Recurence</label>
	    	<select id="event-rec" name="recurence">
	            <option id="DAY" value="DAY">Quotidien</option>
	            <option id="null" selected value="null">Aucune</option>
	            <option id="WEEK" value="WEEK">Hebdomadaire</option>
	            <option id="MONTH" value="MONTH">Mensuel</option>
	            <option id="YEAR" value="YEAR">Annuel</option>
        	</select>
        	<label>Catégorie</label>
	    	<select id="event-cat" name="categorie">
	    		@foreach ($categories as $category)
	            <option id="{{ $category->id }}" value="{{ $category->name }}">{{ $category->name }}</option>
	            @endforeach
        	</select>
        	<label>Image</label>
        	<input type="file" name="photo"/>
        	<button type="submit">Ajouter</button>
        </form>
	</div>
	<div id="hide"></div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>
	{{ Html::script('js/admin.js') }}

@stop
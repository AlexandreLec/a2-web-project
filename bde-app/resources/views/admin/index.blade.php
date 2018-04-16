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
			        </tr>
			    </thead>
			    <tbody>
			    	
			    </tbody>
			</table>
	    </section>
	    <section class="manage-board" id="shop-manage">
	    	<h2>Boutique</h2>
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
	</div>
	<div id="hide"></div>

	{{ Html::script('js/admin.js') }}

@stop
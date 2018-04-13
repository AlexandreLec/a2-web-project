@extends('template')

@section('css')

    {{ Html::style('css/admin.css') }}

    {{ Html::style('https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css') }}

    {{ Html::script('https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js') }}

    {{ Html::script('js/admin.js') }}

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
			            <th>Nom</th>
			            <th>Prenom</th>
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
	    </section>
	    <section class="manage-board" id="shop-manage">
	    	<h2>Boutique</h2>
	    </section>
	</div>


@stop
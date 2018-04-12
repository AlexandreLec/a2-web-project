@extends('template')

@section('css')

    {{ Html::style('css/events.css') }}

@stop

@section('bar')
	<ul>
		<li>Events passés</li>
		<li>Events à venir</li>
		<li>Boîte à idées</li>
	</ul>
@stop
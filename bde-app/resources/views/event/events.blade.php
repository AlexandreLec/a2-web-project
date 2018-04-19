@extends('template')

@section('css')

    {{ Html::style('css/events.css') }}
    
	{{ Html::style('css/ideas_box.css') }}

	{{ Html::style('css/past.css') }}

	{{ Html::style('css/event_desc.css') }}

	{{ Html::style('css/idea.css') }}

	{{ Html::style('css/viewfile.css') }}

	@yield('css')

@stop

@section('bar')
	<ul>
		<a href="/events/past"><li>Events passés</li></a>
		<a href="/events/soon"><li>Events à venir</li></a>
		<a href="/events/ideas"><li>Boîte à idées</li></a>
	</ul>
@stop

@section('content')

	@yield('content')

@stop
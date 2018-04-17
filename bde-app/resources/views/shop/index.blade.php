@extends('template')

@section('css')

    {{ Html::style('css/shop.css') }}

@stop

@section('bar')
    <i class="fas fa-search"></i><input type="text" />
@stop

@section('content')

    <div class="goodies-container">
        <div class="card-goodie"></div>
    </div>
        
@stop
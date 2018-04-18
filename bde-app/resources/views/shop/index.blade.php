@extends('template')

@section('css')

    {{ Html::style('css/shop.css') }}

@stop

@section('bar')
    <span id="bar">
         <i class="fas fa-search fa-2x"></i>
        <input id="search_bar" list="suggestion" type="text" />

        <datalist id="suggestion">
        </datalist>
        <span id="command" ><i class="fas fa-shopping-basket fa-2x"></i></span>
    </span>
@stop

@section('content')

    <div class="shop-container">
        <div class="sort-container">
            <ul>
                <h3>Filtrer <i class="fas fa-sort-amount-down"></i></h3>

                <h4>Catégories</h4>
                    <li><input name="cat" type="radio" id="all" />Toutes</li>
                @foreach ($categories as $cat)
                    <li><input name="cat" type="radio" id="{{ $cat->id }}" />{{$cat->name}}</li>
                @endforeach

                <h4>Trier par</h4>
                <li><input name="sort" type="radio" value="ASC" />Prix croissant</li>
                <li><input name="sort" type="radio" value="DESC"/>Prix décroissant</li>
                <li><input name="sort" type="radio" value="POP" />Popularité</li>
            </ul>
        </div>
        <div class="goodies-container">
        </div>
        
    </div>
    <div id="command-tab">
        <h3 id="command-title">Votre panier</h3>
        <div class="command-content">
            <div class="command-list">
                <ul id="head">
                    <li>
                        <span class="title">Article</span>
                        <span class="others">Quantité</span>
                        <span class="others">Prix</span>
                        <span class="others">Actions</span>
                    </li>
                </ul>
                <ul id="list">
                </ul>
            </div>
            <div class="command-recap">
                <h4>TOTAL :</h4><p id="total"></p>

            </div>
            <button>Finaliser la commande</button>
        </div>
    </div>
    {{ Html::script('js/shop.js') }}
        
@stop
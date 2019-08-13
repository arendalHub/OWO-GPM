@extends('layouts.default')

@section('titre_page')
PERSONNEL
@endsection('titre_page')

@section('menu')
    <li class="header"><span>GESTION STOCK</span></li>
    <li>
        <a href="{{url('/stock/article/list')}}" title="Articles">
            <i class="glyph-icon icon-linecons-tv"></i>
            <span>Articles</span>
        </a>
    </li>
    <li>
        <a href="{{url('/stock/commande/list')}}" title="Commandes">
            <i class="glyph-icon icon-linecons-tv"></i>
            <span>Commandes</span>
        </a>
    </li>
    <li>
        <a href="{{url('/stock/livraison/list')}}" title="Livraisons">
            <i class="glyph-icon icon-linecons-tv"></i>
            <span>Livraisons</span>
        </a>
    </li>
    <li>
        <a href="{{url('/stock/stock/list')}}" title="Stocks">
            <i class="glyph-icon icon-linecons-tv"></i>
            <span>Stocks</span>
        </a>
    </li>
    <li>
        <a href="{{url('/stock/rebus/list')}}" title="Rebus">
            <i class="glyph-icon icon-linecons-tv"></i>
            <span>Rebus</span>
        </a>
    </li>
    <li class="header"><span>GESTION FOURNISSEURS</span></li>
    <li>
        <a href="{{url('/stock/fournisseur/list')}}" title="Fournisseurs">
            <i class="glyph-icon icon-linecons-tv"></i>
            <span>Fournisseurs</span>
        </a>
    </li>

        <br>
        <hr>
        <br>

        <li>
            <a href="{{ url('/stock/') }}" title="Dashboard">
                <i class="glyph-icon icon-dashboard"></i>
                <span>DASHBOARD</span>
            </a>
        </li>
@endsection('menu')



@section('contenu_page')
    <div id="page-title">
        <h2>@yield('titre_contenu', 'STOCKS')</h2>
        <p>@yield('sous_titre_contenu', '[SOUS MODULE]')</p>
    </div>

    <div class="row">
        @yield('contenu', '[EN COURS DE DEVELOPPEMENT]')
    </div>
@endsection('contenu_page')


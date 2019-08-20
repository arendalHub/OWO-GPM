@extends('layouts.default')

@section('titre_page')
STOCK
@endsection('titre_page')

@section('menu')
<li>
    <a href="{{ url('/stock') }}" title="Dashboard">
        <i class="glyph-icon icon-dashboard"></i>
        <span>ACCUEIL</span>
    </a>
</li>

<br>
<hr>
<br>

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
    <a href="javascript:void(0);" title="Stocks">
        <i class="glyph-icon icon-linecons-tv"></i>
        <span>Stocks</span>
    </a>
    <div class="sidebar-submenu">
    <ul>
        <li><a href="{{url('/stock/stock/list')}}" title="Buttons"><span>Etat actuel</span></a></li>
        <li><a href="{{url('/stock/entree/list')}}" title="Buttons"><span>Entrées directes</span></a></li>
        <li><a href="{{url('/stock/affectation/list')}}" title="Buttons"><span>Approvisionnement</span></a></li>
        <li><a href="{{url('/stock/rebus/list')}}" title="Buttons"><span>Mises au rebus</span></a></li>
    </ul>
</div>
</li>
<li class="header"><span>PARAMETRES</span></li>
<li>
    <a href="{{url('/stock/emplacement/list')}}" title="Emplacements">
        <i class="glyph-icon icon-linecons-tv"></i>
        <span>Emplacements</span>
    </a>
</li>
<li>
    <a href="{{url('/stock/famille/list')}}" title="Familles">
        <i class="glyph-icon icon-linecons-tv"></i>
        <span>Familles</span>
    </a>
</li>
<li>
    <a href="{{url('/stock/fournisseur/list')}}" title="Fournisseurs">
        <i class="glyph-icon icon-linecons-tv"></i>
        <span>Fournisseurs</span>
    </a>
</li>
<li>
    <a href="{{url('/stock/magasin/list')}}" title="Magasins">
        <i class="glyph-icon icon-linecons-tv"></i>
        <span>Magasins</span>
    </a>
</li>
@endsection('menu')



@section('contenu_page')
<<<<<<< HEAD
<div id="page-title">
    <h2>@yield('titre_contenu', 'STOCKS')</h2>
    <p>@yield('sous_titre_contenu', '[SOUS MODULE]')</p>
</div>

<div class="row">
    @yield('contenu_page', '[-EN COURS DE DEVELOPPEMENT-]')
</div>
@endsection('contenu_page')
=======
    <div id="page-title">
        <h2>@yield('titre_contenu', 'STOCKS')</h2>
        <p>@yield('sous_titre_contenu', '[SOUS MODULE]')</p>
    </div>

    <div class="row">
        @yield('contenu', '[EN COURS DE DEVELOPPEMENT]')
    </div>
@endsection('contenu_page')

>>>>>>> 36414c3edda45442c5dda64932ee82365fa0f7f6

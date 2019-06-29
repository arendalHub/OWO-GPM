@extends('layouts.default')

@section('titre_page')
STOCKS
@endsection('titre_page')

@section('menu')
    <li class="header"><span>GESTION STOCK</span></li>
    <li>
        <a href="#" title="Articles">
            <i class="glyph-icon icon-linecons-tv"></i>
            <span>Articles</span>
        </a>
    </li>
     <li>
         <a href="#" title="Fournisseurs">
             <i class="glyph-icon icon-linecons-tv"></i>
             <span>Fournisseurs</span>
         </a>
     </li>
     <li>
         <a href="#" title="Commandes">
             <i class="glyph-icon icon-linecons-tv"></i>
             <span>Commandes</span>
         </a>
     </li>
@endsection('menu')



@section('contenu_page')
    <div id="page-title">
        <h2>@yield('titre_contenu', 'STOCKS')</h2>
        <p>@yield('sous_titre_contenu', '[SOUS MODULE]')</p>

    </div>

    <div class="row">
        @yield('contenu_page', '[EN COURS DE DEVELOPPEMENT]')

    </div>
@endsection('contenu_page')


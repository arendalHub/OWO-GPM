@extends('layouts.default')

@section('titre_page')
PARAMETRES
@endsection('titre_page')

@section('menu')
    <li class="header"><span>PARAMETRES</span></li>
    <li>
        <a href="{{ url('/parametre/utilisateur') }}" title="Utilisateurs">
            <i class="glyph-icon icon-linecons-tv"></i>
            <span>Utilisateurs</span>
        </a>
    </li>
     <li>
         <a href="{{ url('Parametre') }}" title="Profils">
             <i class="glyph-icon icon-linecons-tv"></i>
             <span>Profils</span>
         </a>
     </li>
     <li>
         <a href="#" title="Societe">
             <i class="glyph-icon icon-linecons-tv"></i>
             <span>Société</span>
         </a>
     </li>
@endsection('menu')



@section('contenu_page')
    <div id="page-title">
        <h2>@yield('titre_contenu', 'PARAMETRAGE')</h2>
        <p>@yield('sous_titre_contenu', '[SOUS MODULE]')</p>

    </div>

    <div class="row">
        @yield('contenu_page', '[EN COURS DE DEVELOPPEMENT]')

    </div>
@endsection('contenu_page')


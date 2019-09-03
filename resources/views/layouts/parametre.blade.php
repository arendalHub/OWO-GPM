@extends('layouts.default')

@section('titre_page')
PARAMETRES
@endsection('titre_page')

@section('menu')
    <li>
        <a href="{{ url('/parametre/') }}" title="Dashboard">
            <i class="glyph-icon icon-dashboard"></i>
            <span>ACCUEIL</span>
        </a>
    </li>

    <br>
    <hr>
    <br>

    <li class="header"><span>PARAMETRES</span></li>
    <li>
        <a href="{{ url('/parametre/utilisateur') }}" title="Utilisateurs">
            <i class="glyph-icon icon-group"></i>
            <span>Utilisateurs</span>
        </a>
    </li>
    {{-- <li>
         <a href="{{ url('/parametre/profil') }}" title="Profils">
             <i class="glyph-icon icon-tags"></i>
             <span>Profils</span>
         </a>
     </li>
    <li>
        <a href="#" title="Dictionnaire">
            <i class="glyph-icon icon-book"></i>
            <span>Dictionnaire</span>
        </a>
    </li> --}}
    <li>
         <a href="{{url('/parametre/societe')}}" title="Societe">
             <i class="glyph-icon icon-institution"></i>
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
        @yield('contenu', '[EN COURS DE DEVELOPPEMENT]')

    </div>
@endsection('contenu_page')


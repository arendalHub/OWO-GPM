@extends('layouts.parametre')

@section('titre_contenu')
PARAMETRES
@endsection('titre_contenu')

@section('sous_titre_contenu')
PARAMETRAGE DE L'APPLICATION
@endsection('sous_titre_contenu')

@section('contenu')
    <div class="row">
        <div class="col-md-6">
            <a href="{{ url('/parametre/utilisateur') }}" title="Utilisateurs" class="col-md-8 col-md-offset-2 tile-box
            tile-box-shortcut btn-danger">
                <div class="tile-header">
                    UTILISATEURS
                </div>
                <div class="tile-content-wrapper">
                    <i class="glyph-icon icon-users"></i>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="{{ url('/parametre/profil') }}" title="Profils" class="col-md-8 col-md-offset-2 tile-box tile-box-shortcut btn-success">
                <div class="tile-header">
                    PROFILS
                </div>
                <div class="tile-content-wrapper">
                    <i class="glyph-icon icon-tags"></i>
                </div>
            </a>
        </div>
    </div>

        <br>
        <br>
        <br>
        <br>

    <div class="row">
        <div class="col-md-6">
            <a href="{{ url('/parametre/dictionnaire') }}" title="Dictionnaire" class="col-md-8 col-md-offset-2 tile-box
            tile-box-shortcut btn-blue-alt">
                <div class="tile-header">
                    DICTIONNAIRE
                </div>
                <div class="tile-content-wrapper">
                    <i class="glyph-icon icon-book"></i>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="{{url('/parametre/societe')}}" title="Société" class="col-md-8 col-md-offset-2 tile-box tile-box-shortcut btn-black">
               <div class="tile-header">
                    SOCIETE
                </div>
                <div class="tile-content-wrapper">
                    <i class="glyph-icon icon-institution"></i>
                </div>
            </a>
        </div>

    </div>
@endsection('contenu')
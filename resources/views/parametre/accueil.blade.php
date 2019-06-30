@extends('layouts.parametre')

@section('titre_contenu')
PARAMETRES
@endsection('titre_contenu')

@section('sous_titre_contenu')
PARAMETRAGE DE L'APPLICATION
@endsection('sous_titre_contenu')

@section('contenu_page')
    <div class="row">
        <div class="col-md-6">
            <a href="{{ url('/parametre/utilisateur') }}" title="Example tile shortcut" class="col-md-8 col-md-offset-2 tile-box tile-box-shortcut btn-danger">
                <div class="tile-header">
                    UTILISATEURS
                </div>
                <div class="tile-content-wrapper">
                    <i class="glyph-icon icon-file-photo-o"></i>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="{{ url('/parametre/profil') }}" title="Example tile shortcut" class="col-md-8 col-md-offset-2 tile-box tile-box-shortcut btn-success">
                <div class="tile-header">
                    PROFILS
                </div>
                <div class="tile-content-wrapper">
                    <i class="glyph-icon icon-desktop"></i>
                </div>
            </a>
        </div>
    </div>

        <br>
        <br>
        <br>
        <br>

    <div class="row">
        <div class="col-md-12">
            <a href="#" title="Example tile shortcut" class="col-md-4 col-md-offset-4 tile-box tile-box-shortcut btn-info">
               <div class="tile-header">
                    SOCIETE
                </div>
                <div class="tile-content-wrapper">
                    <i class="glyph-icon icon-download"></i>
                </div>
            </a>
        </div>
    </div>
@endsection('contenu_page')
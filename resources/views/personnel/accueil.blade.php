@extends('layouts.personnel')

@section('titre_contenu')
PERSONNEL
@endsection('titre_contenu')

@section('sous_titre_contenu')
OPERATIONS DU PERSONNEL
@endsection('sous_titre_contenu')

@section('contenu_page')
    <div class="row">
        <div class="col-md-6">
            <a href="{{ url('personnel/employe') }}" title="Employés" class="col-md-8 col-md-offset-2 tile-box
            tile-box-shortcut btn-danger">
                <div class="tile-header">
                    EMPLOYES
                </div>
                <div class="tile-content-wrapper">
                    <i class="glyph-icon icon-file-photo-o"></i>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="{{ url('/personnel/zone') }}" title="Zones et Sections" class="col-md-8 col-md-offset-2 tile-box
             tile-box-shortcut btn-success">
                <div class="tile-header">
                    ZONES
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
            <a href="{{ url('/personnel/site') }}" title="Sites" class="col-md-4 col-md-offset-4 tile-box
            tile-box-shortcut btn-info">
               <div class="tile-header">
                    SITE
                </div>
                <div class="tile-content-wrapper">
                    <i class="glyph-icon icon-download"></i>
                </div>
            </a>
        </div>
    </div>
@endsection('contenu_page')
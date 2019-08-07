@extends('layouts.personnel')

@section('titre_contenu')
PERSONNEL
@endsection('titre_contenu')

@section('sous_titre_contenu')
OPERATIONS DU PERSONNEL
@endsection('sous_titre_contenu')

@section('contenu')
    <div class="row">
        <div class="col-md-6">
            <a href="{{ url('personnel/employe') }}" title="Employés" class="col-md-8 col-md-offset-2 tile-box
            tile-box-shortcut btn-danger">
                <div class="tile-header">
                    EMPLOYES
                </div>
                <div class="tile-content-wrapper">
                    <i class="glyph-icon icon-group"></i>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="{{ url('/personnel/zone') }}" title="Zones" class="col-md-8 col-md-offset-2 tile-box
             tile-box-shortcut btn-success">
                <div class="tile-header">
                    ZONES
                </div>
                <div class="tile-content-wrapper">
                    <i class="glyph-icon icon-globe"></i>
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
            <a href="{{ url('/personnel/section') }}" title="Sections" class="col-md-8 col-md-offset-2 tile-box
             tile-box-shortcut btn-blue-alt">
                <div class="tile-header">
                   SECTIONS
                </div>
                <div class="tile-content-wrapper">
                    <i class="glyph-icon icon-linecons-location"></i>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="{{ url('/personnel/site') }}" title="Sites" class="col-md-8 col-md-offset-2 tile-box
            tile-box-shortcut btn-black">
               <div class="tile-header">
                    SITES
                </div>
                <div class="tile-content-wrapper">
                    <i class="glyph-icon icon-building"></i>
                </div>
            </a>
        </div>

    </div>
@endsection('contenu')
@extends('layouts.stock')

@section('titre_contenu')
STOCKS
@endsection('titre_contenu')

@section('sous_titre_contenu')
GESTION DE STOCKS
@endsection('sous_titre_contenu')

@section('contenu_page')
    <div class="row">
        <div class="col-md-6">
            <a href="#" title="Example tile shortcut" class="col-md-8 col-md-offset-2 tile-box tile-box-shortcut btn-danger">
                <div class="tile-header">
                    ARTICLES
                </div>
                <div class="tile-content-wrapper">
                    <i class="glyph-icon icon-file-photo-o"></i>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="#" title="Example tile shortcut" class="col-md-8 col-md-offset-2 tile-box tile-box-shortcut btn-success">
                <div class="tile-header">
                    FOURNISSEURS
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
        <div class="col-md-6">
            <a href="#" title="Example tile shortcut" class="col-md-8 col-md-offset-2 tile-box tile-box-shortcut btn-info">
               <div class="tile-header">
                    AUTRES
                </div>
                <div class="tile-content-wrapper">
                    <i class="glyph-icon icon-download"></i>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="#" title="Example tile shortcut" class="col-md-8 col-md-offset-2 tile-box tile-box-shortcut btn-warning">
                <div class="tile-header">
                    AUTRES
                </div>
                <div class="tile-content-wrapper">
                    <i class="glyph-icon icon-code-fork"></i>
                </div>
            </a>
        </div>
    </div>
@endsection('contenu_page')
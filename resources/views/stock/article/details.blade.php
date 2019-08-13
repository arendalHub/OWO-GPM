@extends('layouts.stock')

@section('titre_contenu')
ARTICLES
@endsection('titre_contenu')

@section('sous_titre_contenu')
DETAILS DE L'ARTICLE {{$article->code_article}}-{{$article->designation_article}}
@endsection('sous_titre_contenu')

@section('contenu_page')
    <div class="panel">
        <div class="panel panel-heading">
        <div class="panel-body">
            <div style="width: 100%" class="example-box-wrapper">
                <h2>Informations générales</h2>
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="datatable-example">
                    <thead>
                        <tr>
                            <th>Code article</th>
                            <th>Designation</th>
                            <th>Famille</th>
                            <th>Consommable</th>
                            <th>Prix de vente</th>
                            <th>Prix d'achat</th>
                        </tr>
                    </thead>
                    <tr>
                        <td>{{$article->code_article}}</td>
                        <td>{{$article->designation_article}}</td>
                        <td>{{$article->description_famille}}</td>
                        <td>
                            @if($article->consommable == null)
                                Non
                            @else
                                Oui
                            @endif
                        </td>
                        <td>{{$article->prix_vente}}</td>
                        <td>{{$article->prix_achat}}</td>
                    </tr>
                </table>
            </div>
            <div style="width: 100%" class="example-box-wrapper">
                <h2>Emplacement de stockage</h2>
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="datatable-example">
                    <thead>
                    <tr>
                        <th>Position</th>
                    </tr>
                    </thead>
                    <tr>
                        <td>Étagère : {{$emplacement->lib_etagere}} | Rangée : {{$emplacement->lib_rangee}} | Box : {{$emplacement->lib_box}}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="panel-footer">
            <h2>Actions</h2>
            <table>
                <tr>
                    <td>
                        <a href="{{url('/stock/article/create_update')}}" style="float: left;" type="button" class="btn btn-border btn-alt border-green btn-link font-green">
                            <i class="glyph-icon icon-plus"></i>
                            <span>Ajouter un nouvel article</span>
                        </a>
                    </td>
                    <td>
                        <a style="float: left;" type="button" class="btn btn-border btn-alt border-green btn-link font-green">
                            <i class="glyph-icon icon-trash"></i>
                            <span>Supprimer</span>
                        </a>
                    </td>
                    <td>
                        <a href="{{url("/stock/article/create_update/{$article->id_article}")}}" style="float: left;" type="button" class="btn btn-border btn-alt border-green btn-link font-green">
                            <i class="glyph-icon icon-pencil"></i>
                            <span>Modifier</span>
                        </a>
                    </td>
                    <td>
                        <a href="{{url('/stock/article/list')}}" style="float: left;" type="button" class="btn btn-border btn-alt border-green btn-link font-green">
                            <i class="glyph-icon icon-list"></i>
                            <span>Liste des articles</span>
                        </a>
                    </td>
                </tr>
            </table>

        </div>
    </div>
@endsection('contenu_page')

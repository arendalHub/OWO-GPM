@extends('layouts.stock')

@section('titre_contenu')
REBUS
@endsection('titre_contenu')

@section('sous_titre_contenu')
LISTE DES ARTICLES MIS EN REBUS
@endsection('sous_titre_contenu')

@section('contenu_page')
<div class="panel">
    <div class="panel panel-heading">
        @if(Session::has('message'))
        @include('stock.error', ['type'=>'info', 'key'=>'message'])
        @endif
        <form method="GET" action="{{url("/stock/rebus/print_list")}}">
            <a href="{{url('/stock/rebus/create_update')}}" type="button"
               class="btn btn-border btn-alt border-green btn-link font-green">
                <i class="glyph-icon icon-plus"></i>
                <span>Mettre un article au rebus</span>
            </a>
            @isset($_GET['id_article'])
            <input class="hidden" name="id_article" value="{{$_GET['id_article']}}">
            @endisset
            @isset($_GET['quantite_min'])
            <input class="hidden" name="quantite_min" value="{{$_GET['quantite_min']}}">
            @endisset
            @isset($_GET['quantite_max'])
            <input class="hidden" name="quantite_max" value="{{$_GET['quantite_max']}}">
            @endisset
            @isset($_GET['date_deb'])
            <input class="hidden" name="date_deb" value="{{$_GET['date_deb']}}">
            @endisset
            @isset($_GET['date_fin'])
            <input class="hidden" name="date_fin" value="{{$_GET['date_fin']}}">
            @endisset
            <button type="submit" class="btn btn-border btn-alt border-green btn-link font-green">
                <i class="glyph-icon icon-print"></i>
                <span>Imprimer</span>
            </button>
        </form>
    </div>
    <div class="panel-body">
        <div>
            <h2 align="center" style="font: bold">
                <a class=""
                   title="Les paramètres permettent de sélectioner les articles affichés dans la liste à imprimer"
                   href="#" style="font-size: 18px">[?]</a>
                Recherche paramétrée
            </h2>
            <hr>
            <form class="form-horizontal bordered-row" action="{{url('/stock/rebus/list')}}" method="GET">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Article</label>
                            <div class="col-sm-6">
                                <select required="" class="form-control" name="id_article">
                                    @if($articles != null && count($articles) > 0)
                                    <option value="*" selected>-- Tous --</option>
                                    @foreach($articles as $article)
                                    <option value="{{$article->id_article}}">
                                        {{$article->designation_article}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">
                                <a class=""
                                   title="Remplir le premier champ pour une date unique | Remplir les 2 champs pour un intervalle"
                                   href="#" style="font-size: 18px">[?]</a>
                                Date du rebus
                            </label>

                            <div class="col-sm-4">
                                <input type="date" id="date_deb" name="date_deb"
                                       placeholder=""
                                       class="form-control">
                            </div>
                            <div class="col-sm-4">
                                <input type="date" id="date_fin" name="date_fin"
                                       placeholder=""
                                       class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">
                                <a class=""
                                   title="Remplir le premier champ pour une quantité unique | Remplir les 2 champs pour un intervalle"
                                   href="#" style="font-size: 18px">[?]</a>
                                Quantité mise au rebus
                            </label>

                            <div class="col-sm-4">
                                <input type="number" id="quantite_min" name="quantite_min"
                                       placeholder=""
                                       class="form-control">
                            </div>
                            <div class="col-sm-4">
                                <input type="number" id="quantite_max" name="quantite_max"
                                       placeholder=""
                                       class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-default content-box text-center pad20A mrg25T">
                    <button type="submit" class="btn btn-sm btn-primary">Valider</button>
                </div>
            </form>
        </div>
        <div style="width: 100%" class="example-box-wrapper">
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered"
                   id="datatable-responsive">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Article</th>
                        <th>Motif</th>
                        <th>Quantité</th>
                    </tr>
                </thead>
                <tbody>
                    @if($rebus != null && count($rebus) > 0)
                    @foreach($rebus as $rebu)
                    <tr>
                        <td>{{$rebu->date_mouvement}}</td>
                        <td>{{$rebu->designation_article}}</td>
                        <td>{{$rebu->motif_mouvement}}</td>
                        <td>{{$rebu->quantite_mouvement}}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection('contenu_page')

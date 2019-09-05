@extends('layouts.stock')

@section('titre_contenu')
STOCK
@endsection('titre_contenu')

@section('sous_titre_contenu')
LISTE DES STOCKS D'ARTICLES
@endsection('sous_titre_contenu')

@section('contenu_page')
<div class="panel">
    <div class="panel panel-heading">
        <form method="GET" action="{{url("/stock/stock/print_list")}}">
            <a href="{{url('/stock/entree/create_update')}}" title="Ajouter un(des) produit(s) au stock"
               class="btn btn-border btn-alt border-green btn-link font-green">Ajouter un(des) produit(s) au stock</a>
            <a href="{{url('/stock/commande/create_update')}}" title="Passer une commande"
               class="btn btn-border btn-alt border-green btn-link font-green">Passer une commande</a>
            <a href="{{url('/stock/affectation/create_update')}}" title="Effectuer un approvisionnement"
               class="btn btn-border btn-alt border-green btn-link font-green">Effectuer un approvisionnement</a>
            <a href="{{url('/stock/rebus/list/')}}" title="Mettre au rebus"
               class="btn btn-border btn-alt border-green btn-link font-green">Mettre au rebus</a>
            @isset($_GET['id_famille'])
            <input class="hidden" name="id_famille" value="{{$_GET['id_famille']}}">
            @endisset
            @isset($_GET['date_deb'])
            <input class="hidden" name="date_deb" value="{{$_GET['date_deb']}}">
            @endisset
            @isset($_GET['date_fin'])
            <input class="hidden" name="date_fin" value="{{$_GET['date_fin']}}">
            @endisset
            @isset($_GET['quantite_min'])
            <input class="hidden" name="quantite_min" value="{{$_GET['quantite_min']}}">
            @endisset
            @isset($_GET['quantite_max'])
            <input class="hidden" name="quantite_max" value="{{$_GET['quantite_max']}}">
            @endisset
            @isset($_GET['consommable'])
            <input class="hidden" name="consommable" value="{{$_GET['consommable']}}">
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
            <form class="form-horizontal bordered-row" action="{{url('/stock/stock/list')}}" method="GET">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Famille</label>
                            <div class="col-sm-6">
                                <select required="" class="form-control" name="id_famille">
                                    @if($familles != null && count($familles) > 0)
                                    <option value="*" selected>-- Toutes --</option>
                                    @foreach($familles as $famille)
                                    <option value="{{$famille->id_famille}}">{{$famille->description_famille}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Consommable</label>
                            <div class="col-sm-6">
                                <select required="" class="form-control" name="consommable">
                                    <option value="*" selected>-- N'importe --</option>
                                    <option value="1">Oui</option>
                                    <option value="0">Non</option>
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
                                Date d'ajout
                            </label>

                            <div class="col-sm-4">
                                <input type="date" id="date_naiss" name="date_deb"
                                       placeholder=""
                                       class="form-control">
                            </div>
                            <div class="col-sm-4">
                                <input type="date" id="date_naiss" name="date_fin"
                                       placeholder=""
                                       class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">
                                <a class=""
                                   title="Remplir le premier champ pour une quantité unique | Remplir les 2 champs pour un intervalle"
                                   href="#" style="font-size: 18px">[?]</a>
                                Quantité en stock
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
            <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="datatable-responsive">
                <thead>
                    <tr>
                        <th width="18%">Référence</th>
                        <th>Article</th>
                        <th>Famille</th>
                        <th width="15%">Quantité en stock</th>
                    </tr>
                </thead>
                <tbody>
                    @if($stocks != null && count($stocks) > 0)
                    @php ($i=0)
                    @foreach($stocks as $stock)
                    @php ($i++)
                    <tr
                        class="@if($stock->quantite_stock == 0)stock_rupture @elseif($stock->quantite_stock <= $stock->seuil_critique)stock_critique @elseif($stock->quantite_stock <= $stock->seuil_alert)stock_alert @elseif($i%2)gris @endif">
                        <td>{{$stock->code_article}}</td>
                        <td>{{$stock->designation_article}}</td>
                        <td>{{$stock->description_famille}}</td>
                        <td>{{$stock->quantite_stock}}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection('contenu_page')

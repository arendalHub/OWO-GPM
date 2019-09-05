@extends('layouts.stock')

@section('titre_contenu')
COMMANDES
@endsection('titre_contenu')

@section('sous_titre_contenu')
LISTE DES COMMANDES
@endsection('sous_titre_contenu')

@section('contenu_page')
<div class="panel">
    <div class="panel-heading">
        @if(Session::has('message'))
        @include('stock.error', ['type'=>'info', 'key'=>'message'])
        @endif
        <form method="GET" action="{{url("/stock/commande/print_list")}}">
            <a href="{{url("/stock/commande/create_update")}}"
               class="btn btn-border btn-alt border-green btn-link font-green">
                <i class="glyph-icon icon-plus"></i>
                <span>Creer une nouvelle commande</span>
            </a>
            @isset($_GET['id_fournisseur'])
            <input class="hidden" name="id_fournisseur" value="{{$_GET['id_fournisseur']}}">
            @endisset
            @isset($_GET['livre'])
            <input class="hidden" name="livre" value="{{$_GET['livre']}}">
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
            <form class="form-horizontal bordered-row" action="{{url('/stock/commande/list')}}" method="GET">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Fournisseur</label>
                            <div class="col-sm-6">
                                <select required="" class="form-control" name="id_fournisseur">
                                    @if($fournisseurs != null && count($fournisseurs) > 0)
                                    <option value="*" selected>-- Tous --</option>
                                    @foreach($fournisseurs as $fournisseur)
                                    <option value="{{$fournisseur->id_fournisseur}}">
                                        {{$fournisseur->designation_fournisseur}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Livré</label>
                            <div class="col-sm-6">
                                <div class="checkbox">
                                    <select required="" class="form-control" name="livre">
                                        <option value="*" selected>-- N'importe --</option>
                                        <option value="1">Oui</option>
                                        <option value="0">Non</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">
                                <a class=""
                                   title="Remplir le premier champ pour une date unique | Remplir les 2 champs pour un intervalle"
                                   href="#" style="font-size: 18px">[?]</a>
                                Date de commande
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
                        <th>Référence</th>
                        <th>Date</th>
                        <th>Fournisseur</th>
                        <th>Livrée</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if($commandes != null && count($commandes) > 0)
                    @foreach($commandes as $commande)
                    <tr>
                        <td>CMD-{{$commande->id_commande}}</td>
                        <td>{{date('l jS \\of F Y', strtotime($commande->date_commande))}}</td>
                        <td>{{$commande->designation_fournisseur}}</td>
                        <td>
                            @if($commande->livre == 0)
                            Non
                            @else
                            Oui
                            @endif
                        </td>
                        <td>
                            <a class="btn" title="Voir les details de la commande"
                               href="{{url("/stock/commande/details/{$commande->id_commande}")}}">
                                <i class="glyph-icon icon-eye"></i>
                            </a>
                            <a class="btn" title="Supprimer la commande"
                               href="{{url("/stock/commande/delete/{$commande->id_commande}")}}">
                                <i class="glyph-icon icon-trash"></i>
                            </a>
                            <a class="btn" title="Imprimer la commande"
                               href="{{url("/stock/commande/print_details/{$commande->id_commande}")}}">
                                <i class="glyph-icon icon-print"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection('contenu_page')

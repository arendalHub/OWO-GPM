@extends('layouts.stock')

@section('titre_contenu')
LIVRAISONS
@endsection('titre_contenu')

@section('sous_titre_contenu')
LISTE DES LIVRAISONS
@endsection('sous_titre_contenu')

@section('contenu_page')
<div class="panel">
    <div class="panel-heading">
        @if(Session::has('error'))
        @include('stock.error', ['type'=>'warning', 'key'=>'error'])
        @endif
        @if(Session::has('message'))
        @include('stock.error', ['type'=>'info', 'key'=>'message'])
        @endif
        <form method="GET" action="{{url("/stock/livraison/print_list")}}">
            <button type="button" class="btn btn-border btn-alt border-green btn-link font-green" data-toggle="modal"
                    data-target="#myModal">
                <i class="glyph-icon icon-plus"></i>
                Enregister une nouvelle livraison
            </button>
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

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Choisir la commande livrée</h4>
                    </div>
                    <form class="form-horizontal bordered-row" id="demo-form" data-parsley-validate
                          action="{{url("/stock/livraison/create_update")}}" method="GET">
                        <div class="modal-body">
                            <div class="col-lg-12">
                                @if($commandes != null && count($commandes)>0)
                                <div class="form-group">
                                    <label>Référence de commande</label>
                                    <select required name="id_commande" class="form-control">
                                        @foreach($commandes as $commande)
                                        <option value="{{$commande->id_commande}}">cmd-{{$commande->id_commande}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                @else
                                <span class="text-center">Toutes vos commandes ont été livrées !</span>
                                @endif
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                            @if($commandes != null && count($commandes)>0)
                            <button type="submit" class="btn btn-primary">Valider</button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="panel-body">
        <div style="width: 100%" class="example-box-wrapper">
            <div>
                <h2 align="center" style="font: bold">
                    <a class=""
                       title="Les paramètres permettent de sélectioner les articles affichés dans la liste à imprimer"
                       href="#" style="font-size: 18px">[?]</a>
                    Recherche paramétrée
                </h2>
                <hr>
                <form class="form-horizontal bordered-row" action="{{url('/stock/livraison/list')}}" method="GET">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    <a class=""
                                       title="Remplir le premier champ pour une date unique | Remplir les 2 champs pour un intervalle"
                                       href="#" style="font-size: 18px">[?]</a>
                                    Date de livraison
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

            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered"
                   id="datatable-responsive">
                <thead>
                    <tr>
                        <th>Date de livraison</th>
                        <th>Reference de la commande</th>
                        <th>Total de la livraison</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($livraisons != null && count($livraisons) > 0)
                    @foreach($livraisons as $livraison)
                    <tr>
                        <td>{{$livraison->date_livraison}}</td>
                        <td><a
                               href="{{url("/stock/commande/details/{$livraison->id_commande}")}}">cmd-{{$livraison->id_commande}}</a>
                        </td>
                        <td>{{$livraison->total_livraison}}</td>
                        <td>
                            <a title="voir les details de la livraison"
                               href="{{url("/stock/livraison/details/{$livraison->id_livraison}")}}">
                                <i class="glyph-icon icon-eye"></i>
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

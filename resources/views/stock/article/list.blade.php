@extends('layouts.stock')

@section('titre_contenu')
Gestion stock
@endsection('titre_contenu')

@section('sous_titre_contenu')
Liste des articles
@endsection('sous_titre_contenu')

@section('contenu_page')
<div class="panel">
    <div class="panel panel-heading">
        @if(Session::has('message'))
        @include('stock.error', ['type'=>'info', 'key'=>'message'])
        @endif
        <a href="{{url('/stock/article/create_update')}}"
            class="btn btn-border btn-alt border-green btn-link font-green">
            <i class="glyph-icon icon-plus"></i>
            <span>Ajouter un nouvel article</span>
        </a>
        <a href="{{url("/stock/article/print_list")}}" class="btn btn-border btn-alt border-green btn-link font-green">
            <i class="glyph-icon icon-print"></i>
            <span>Imprimer</span>
        </a>
    </div>

    <div class="panel-body">
        <div>
            <h2 align="center" style="font: bold">Recherche paramétrée</h2><a class="" title="Les paramètres permettent de sélectioner les articles affichés dans la liste à imprimer" href="#" style="font-size: 18px">[?]</a>
            <hr>
        <form class="form-horizontal bordered-row" action="{{url('/stock/article/list')}}" method="GET">
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
                            <label class="col-sm-3 control-label">Retiré</label>
                            <div class="col-sm-6">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="retire">
                                        Oui
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">
                                <a class="" title="Remplir le premier champ pour une date unique | Remplir les 2 champs pour un intervalle" href="#" style="font-size: 18px">[?]</a>
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
                            <label class="col-sm-3 control-label">Consommable</label>
                            <div class="col-sm-6">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="consommable">
                                        Oui
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-default content-box text-center pad20A mrg25T">
                    <button type="submit" class="btn btn-sm btn-primary">Valider</button>
                </div>
            </form>
        </div>
        <div class="example-box-wrapper">
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered"
                id="datatable-responsive">
                <thead>
                    <tr>
                        <th>Code article</th>
                        <th>Designation</th>
                        <th>Famille</th>
                        <th>Retiré</th>
                        <th>Consommable</th>
                        <th>Emplacement</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach($items as $item)
                            <tr>
                                <td>{{$item->code_article}}</td>
                                <td>{{$item->designation_article}}</td>
                                <td>{{$item->description_famille}}</td>
                                <td>
                                    @if($item->supprime == 0)
                                    Non
                                    @else
                                    Oui
                                    @endif
                                </td>
                                <td>
                                    @if($item->consommable == 0)
                                    Non
                                    @else
                                    Oui
                                    @endif
                                </td>
                                <td>
                                    @if($item->supprime == 0)
                                    Étagère : {{$item->lib_etagere}} | Rangée : {{$item->lib_rangee}} | Box : {{$item->lib_box}}
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn" title="voir les details de l'article"
                                        href="{{url("/stock/article/details/{$item->id_article}")}}">
                                        <i class="glyph-icon icon-eye"></i>
                                    </a>
                                    <a class="btn" title="modifier l'article"
                                        href="{{url("/stock/article/create_update/{$item->id_article}")}}">
                                        <i class="glyph-icon icon-pencil"></i>
                                    </a>
                                    <a class="btn" title="imrpimer l'article"
                                        href="{{url("/stock/article/print_details/{$item->id_article}")}}">
                                        <i class="glyph-icon icon-print"></i>
                                    </a>
                                    <a class="btn" title="supprimer l'article"
                                        href="{{url("/stock/article/delete/{$item->id_article}")}}">
                                        <i class="glyph-icon icon-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="panel-footer">
        <div class="text-center">
            <ul class="pagination">
                {{$items->links()}}
            </ul>
        </div>
    </div>
</div>
@endsection('contenu_page')

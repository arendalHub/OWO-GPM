{{-- Page principale de la gestion des stocks, affiche les stocks --}}
@extends('layouts.stock')
@section('titre_contenu')
LIVRAISON
@endsection('titre_contenu')

@section('sous_titre_contenu')
    ENREGISTREMENT
@endsection('sous_titre_contenu')

@section('contenu_page')
    <div class="panel">
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                        <form class="form-horizontal bordered-row" id="demo-form" data-parsley-validate action="{{url("/stock/livraison/do_create_update")}}" method="POST">
                            @csrf
                            <span id="items-index" hidden>0</span>
                            <fieldset>
                                <legend>Informations de livraison</legend>
                                <div class="form-group">
                                    <input required
                                        name="id_commande"
                                        value="{{$_GET['id_commande']}}"
                                        class="form-control"/>
                                    <label>Fournisseur</label>
                                    @if($fournisseurs != null && count($fournisseurs)>0)
                                        <select required name="id_fournisseur" class="form-control">
                                            @foreach($fournisseurs as $fournisseur)
                                                <option value="{{$fournisseur->id_fournisseur}}">{{$fournisseur->designation_fournisseur}}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Facturation</legend>
                                <div class="form-group">
                                    <label>Numéro de bordereau</label>
                                    <input type="text" name="num_bordereau" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Numéro facture</label>
                                    <input type="text" name="num_facture" class="form-control">
                                </div>
                            </fieldset>
                            {{-- @if($update == null) --}}
                                <fieldset>
                                    <legend>Produits livrés</legend>
                                    <button id="add_btn" type="button" class="btn btn-link" id="action-indicator">Afficher les articles</button>
                                    <div id="items-form-group">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <td>Article</td>
                                                <td>Quantité</td>
                                                <td>Prix</td>
                                                <td>Date de péremption</td>
                                                <td>Date de fabrication</td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($articles as $article)
                                                    @if($article->quantite_commande > 0)
                                                        <tr>
                                                            <td>
                                                                <input required name="id_article-{{$article->id_article}}" hidden value="{{$article->id_article}}"/>
                                                                {{$article->designation_article}}
                                                            </td>
                                                            <td>
                                                                <input disabled
                                                                    value="{{$article->quantite_commande}}"
                                                                    class="form-control"/>
                                                                <input
                                                                    class="hidden"
                                                                    name="quantite-{{$article->id_article}}"
                                                                    value="{{$article->quantite_commande}}"
                                                                    class="form-control"/>
                                                            </td>
                                                            <td>
                                                                <input required
                                                                        name="prix-{{$article->id_article}}"
                                                                        id="prix-{{$article->id_article}}"
                                                                        type="number"
                                                                        min="0"
                                                                        value="{{$article->prix_achat}}"
                                                                        class="form-control"/>
                                                            </td>
                                                            <td>
                                                                <input required name="date_peremption-{{$article->id_article}}" type="date" class="form-control"/>
                                                            </td>
                                                            <td>
                                                                <input required name="date_fabrication-{{$article->id_article}}" type="date" class="form-control"/>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </fieldset>
                            {{-- @endif --}}
                            <div class="bg-default content-box text-center pad20A mrg25T">
                                <button type="submit" class="btn btn-lg btn-primary">Valider</button>
                                <button type="reset" onclick="resetForm()" class="btn btn-lg btn-default">Effacer</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection('page_content')

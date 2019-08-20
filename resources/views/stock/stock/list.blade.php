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
            <a href="{{url('/stock/entree/create_update')}}" title="Ajouter un(des) produit(s) au stock" class="btn btn-primary">Ajouter un(des) produit(s) au stock</a>
            <a href="{{url('/stock/commande/create_update')}}" title="Passer une commande" class="btn btn-primary">Passer une commande</a>
            <a href="{{url('/stock/affectation/create_update')}}" title="Effectuer un approvisionnement" class="btn btn-primary">Effectuer un approvisionnement</a>
            <a href="{{url('/stock/rebus/list/')}}" title="Mettre au rebus" class="btn btn-primary">Mettre au rebus</a>
            <a href="{{url('/stock/stock/print_list/')}}" title="Imprimer" class="btn btn-primary">Imprimer</a>
        </div>
        <div class="panel-body">
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
                            <tr class="@if($stock->qt == 0)stock_rupture @elseif($stock->qt <= $stock->seuil_critique)stock_critique @elseif($stock->qt <= $stock->seuil_alert)stock_alert @elseif($i%2)gris @endif" >
                                <td>{{$stock->code_article}}</td>
                                <td>{{$stock->designation_article}}</td>
                                <td>{{$stock->description_famille}}</td>
                                <td>{{$stock->qt}}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>

            </div>
        </div>
        <div class="panel-footer">
            <div class="text-center">
                {{$stocks->links()}}
            </div>
        </div>
    </div>
@endsection('contenu_page')

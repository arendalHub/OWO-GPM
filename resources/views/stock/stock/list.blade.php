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
            <a href="{{url('/stock/stock/create_update')}}" title="Créer un stock" class="btn btn-primary">Créer un stock</a>
        </div>
        <div class="panel-body">
            <div style="width: 100%" class="example-box-wrapper">

                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="datatable-example">
                    <thead>
                        <tr>
                            <th>Article</th>
                            <th>Quantité en stock</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if($stocks != null && count($stocks) > 0)
                        @foreach($stocks as $stock)
                            <tr>
                                <td>{{$stock->designation_article}}</td>
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

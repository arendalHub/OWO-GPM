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
                            <th>Designation</th>
                            <th>Quantité</th>
                            <th>Etat</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php $limit=7; sleep(1);?>
                            @for($i=0; $i<$limit; $i++)
                                <tr>
                                    <td>{{date('d m Y H:i:s')}}</td>
                                    <td>Commande {{$i++}}</td>
                                    <td>
                                        FAIT
                                    </td>
                                    <td>
                                        <a title="voir les details du stock" href="{{url('/stock/stock/details/l')}}">Details</a>
                                    </td>
                                </tr>
                            @endfor
                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel-footer">
            <div class="text-center">
                <ul class="pagination">
                    <li><a href="#" class="active">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">6</a></li>
                    <li><a href="#">7</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection('contenu_page')

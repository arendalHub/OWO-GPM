@extends('layouts.stock')

@section('titre_contenu')
COMMANDES
@endsection('titre_contenu')

@section('sous_titre_contenu')
LISTE DES COMMANDES
@endsection('sous_titre_contenu')

@section('contenu_page')
    <div class="panel">
        <div class="panel panel-heading">
            <form class="form-inline">
                    <div class="form-group">
                        <input  class="form-control" required placeholder="rechercher une commande" type="search"/>
                </div>
            </form>
        </div>
        <div class="panel-body">
            <div style="width: 100%" class="example-box-wrapper">
                <a href="{{url('/stock/commande/create_update')}}" class="btn btn-primary">Creer une nouvelle commande</a>

                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="datatable-example">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Libelle</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php $limit=7; sleep(1);?>
                            @for($i=0; $i<$limit; $i++)
                                <tr>
                                    <td>{{date('d m Y H:i:s')}}</td>
                                    <td>Commande {{$i++}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-link" type="button" data-toggle="dropdown">
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a title="supprimer la commande" href="#">supprimer</a></li>
                                                <li><a title="modifier la commande" href="{{url('/stock/commane/create_update')}}">modifier</a></li>
                                                <li><a title="voir les details de la commande" href="{{url('/stock/commande/details/i')}}">details</a></li>
                                                <!--<li><a href="#">JavaScript</a></li>-->
                                            </ul>
                                        </div>
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

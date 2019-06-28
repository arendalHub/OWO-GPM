@extends('layouts.stock')

@section('titre_contenu')
Gestion stock 
@endsection('titre_contenu')

@section('sous_titre_contenu')
List des articles
@endsection('sous_titre_contenu')

@section('contenu_page')
    <div class="panel">
        <div class="panel-body">
            <div class="panel panel-heading">
                <form class="form-inline">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Rechercher un article">
                    </div>
                </form>
            </div>
            <div class="example-box-wrapper">
                <a href="{{url('/stock/article/create_update')}}" style="float: left;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                    Ajouter un nouveau produit
                </a>
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="datatable-example">
                    <thead>
                        <tr>
                            <th>Code article</th>
                            <th>Designation</th>
                            <th>Famille</th>
                            <th>Consommable</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $limit=5; ?>
                        @for($i=0; $i<$limit; $i++)
                                    <tr>
                                        <td>SAV 00{{$i+1}}</td>
                                        <td>Savon Anamousse</td>
                                        <td>Savon de marseille</td>
                                        <td>Oui</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-link" type="button" data-toggle="dropdown">
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a title="supprimer" href="#">supprimer</a></li>
                                                    <li><a title="modifier" href="#">modifier</a></li>
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
@extends('layouts.stock')

@section('titre_contenu')
FOURNISSEURS
@endsection('titre_contenu')

@section('sous_titre_contenu')
LISTE DES FOURNISSEURS
@endsection('sous_titre_contenu')

@section('contenu_page')
    <div class="panel">
        <div class="panel panel-heading">
            <form class="form-inline">
                    <div class="form-group">
                        <input  class="form-control" required placeholder="rechercher un fournisseur" type="search"/>
                </div>
            </form>
        </div>
        <div class="panel-body">
            <div style="width: 100%" class="example-box-wrapper">
                <a href="{{url('/stock/fournisseur/create_update')}}" class="btn btn-primary">Ajouter un nouveau fournisseur</a>

                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="datatable-example">
                    <thead>
                        <tr>
                            <th>Désignation</th>
                            <th>Adresse</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Boite postale</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php $limit=7?>
                            @for($i=0; $i<$limit; $i++)
                                <tr>
                                    <td>Tictac Corp.</td>
                                    <td>132 Lomé, Rue la tortue</td>
                                    <td>+228 99-99-99-99</td>
                                    <td>titaccorp@tictac.com</td>
                                    <td>1265</td>
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
    </div>
@endsection('contenu_page')

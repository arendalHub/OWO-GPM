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
            @if(Session::has('message'))
                @include('stock.error', ['type'=>'info', 'key'=>'message'])
            @endif
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
                        @if($fournisseurs != null && count($fournisseurs) > 0)
                            @foreach($fournisseurs as $fournisseur)
                                <tr>
                                    <td>{{$fournisseur->designation_fournisseur}}</td>
                                    <td>{{$fournisseur->adresse_fournisseur}}</td>
                                    <td>{{$fournisseur->contact_fournisseur}}</td>
                                    <td>{{$fournisseur->email_fournisseur}}</td>
                                    <td>{{$fournisseur->bp_fournisseur}}</td>
                                    <td>
                                        <a title="modifier" href="{{url("/stock/fournisseur/create_update/{$fournisseur->id_fournisseur}")}}">Modifier</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel-footer">
            <div class="text-center">
                {{$fournisseurs->links()}}
            </div>
        </div>
    </div>
@endsection('contenu_page')

@extends('layouts.stock')

@section('titre_contenu')
FOURNISSEURS
@endsection('titre_contenu')

@section('sous_titre_contenu')
LISTE DES FOURNISSEURS
@endsection('sous_titre_contenu')

@section('contenu_page')
    <div class="panel">
        <div class="panel-heading">
            @if(Session::has('message'))
                @include('stock.error', ['type'=>'info', 'key'=>'message'])
            @endif
            <a href="{{url("/stock/fournisseur/create_update")}}"
               class="btn btn-border btn-alt border-green btn-link font-green">
                <i class="glyph-icon icon-plus"></i>
                <span>Ajouter un nouveau fournisseur</span>
            </a>
            <a href="{{url("/stock/fournisseur/print_list")}}"
               class="btn btn-border btn-alt border-green btn-link font-green">
                <i class="glyph-icon icon-print"></i>
                <span>Imprimer</span>
            </a>
        </div>
        <div class="panel-body">
            <div style="width: 100%" class="example-box-wrapper">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="datatable-responsive">
                    <thead>
                        <tr>
                            <th>Raison sociale</th>
                            <th>Perso. res.</th>
                            <th>Adresse</th>
                            <th>Contact</th>
                            <th>Second contact</th>
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
                                    <td>{{$fournisseur->personne_ressource}}</td>
                                    <td>{{$fournisseur->adresse_fournisseur}}</td>
                                    <td>{{$fournisseur->contact_fournisseur}}</td>
                                    <td>{{$fournisseur->contact_fournisseur_2}}</td>
                                    <td>{{$fournisseur->email_fournisseur}}</td>
                                    <td>{{$fournisseur->bp_fournisseur}}</td>
                                    <td>
                                        <a class="btn" title="Modifier" href="{{url("/stock/fournisseur/create_update/{$fournisseur->id_fournisseur}")}}">
                                            <i class="glyph-icon icon-pencil"></i>
                                        </a>
                                        <a class="btn" title="Imprimer" href="{{url("/stock/fournisseur/print_details/{$fournisseur->id_fournisseur}")}}">
                                            <i class="glyph-icon icon-print"></i>
                                        </a>
                                        <a class="btn" title="Supprimer" href="{{url("/stock/fournisseur/delete/{$fournisseur->id_fournisseur}")}}">
                                            <i class="glyph-icon icon-trash"></i>
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

@extends('layouts.stock')

@section('titre_contenu')
ENTREES
@endsection('titre_contenu')

@section('sous_titre_contenu')
DETAILS DE L'ENTREE num|{{$mouvement->id_mouvement_stock}}
@endsection('sous_titre_contenu')

@section('contenu_page')
    <div class="panel">
        <div class="panel panel-heading">
            <h2>num|{{$mouvement->id_mouvement_stock}}</h2>
            <hr/>
            <p>
            <h3>Fournisseur : <a title="{{$fournisseur->designation_fournisseur}}">{{$fournisseur->designation_fournisseur}}</a> </h3>
            <hr/>
            <h3>Date : {{$mouvement->date_mouvement}}</h3>
            <hr/>
            <h3>Numero Bordereau/Facture : {{$entreefacture->num_bord_fact}}</h3>
            </p>
        </div>
        <div class="panel-body">
            <div style="width: 100%" class="example-box-wrapper">
                <h2>Articles de cette entrée</h2>
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="datatable-example">
                    <thead>
                        <tr>
                            <th>Article</th>
                            <th>Quantité</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($articles != null && count($articles)>0)
                            @foreach($articles as $article)
                                <tr>
                                    <td>{{$article->design}}</td>
                                    <td>{{$article->qtt}}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel-footer">
            <a href="{{url('/stock/entree/list')}}" class="left btn btn-primary">Retour sur la liste</a>
            <a href="{{url('/stock/commande/create_update')}}" class="left btn btn-primary">Créer une nouvelle commande</a>
        </div>
    </div>
@endsection('contenu_page')

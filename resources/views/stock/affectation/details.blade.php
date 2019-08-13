@extends('layouts.stock')

@section('titre_contenu')
AFFECTATION
@endsection('titre_contenu')

@section('sous_titre_contenu')
DETAILS DE L'AFFECTATION aff-{{$mouvement_stock->id_mouvement_stock}}
@endsection('sous_titre_contenu')

@section('contenu_page')
    <div class="panel">
        <div class="panel panel-heading">
            <h2>aff-{{$mouvement_stock->id_mouvement_stock}}</h2>
            <hr/>
            <p>
            <h3>MAGASIN : <a title="{{$mouvement_stock->libelle_magasin}}">{{$mouvement_stock->libelle_magasin}}</a> </h3>
                <hr/>
                <h3>Date : {{$mouvement_stock->date_mouvement}}</h3>
            </p>
        </div>
        <div class="panel-body">
            <div style="width: 100%" class="example-box-wrapper">
                <h2>Articles de cette affectation</h2>
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
                                    <td>{{$article->designation_article}}</td>
                                    <td>{{$article->quantite_mouvement}}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel-footer">
            <a href="{{url('/stock/affectation/create_update')}}" class="left btn btn-primary">Créer une nouvelle affectation</a>
        </div>
    </div>
@endsection('contenu_page')

@extends('layouts.stock')

@section('titre_contenu')
    LIVRAISON
@endsection('titre_contenu')

@section('sous_titre_contenu')
    DETAILS DE LA LIVRAISON liv-{{$livraison->id_livraison}}
@endsection('sous_titre_contenu')

@section('contenu_page')
    <div class="panel">
        <div class="panel panel-heading">
            <h2>liv-{{$livraison->id_livraison}}</h2>
            <hr/>
            <p>
                <h3>Reference de commande : <a href="{{url("/stock/commande/details/{$livraison->id_commande}")}}">CMD-{{$livraison->id_commande}}</a></h3>
                <hr/>
                <h3>Date : {{$livraison->date_livraison}}</h3>
            </p>
        </div>
        <div class="panel-body">
            <div style="width: 100%" class="example-box-wrapper">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="datatable-example">
                    <thead>
                        <tr>
                            <th>Article</th>
                            <th>Quantite</th>
                            <th>Prix d'entree(XOF)</th>
                            <th>Prix de sortie(XOF)</th>
                            <th>Date de péremption</th>
                            <th>Date de fabrication</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if($articles != null && count($articles) > 0)
                        @foreach($articles as $article)
                            <tr>
                                <td>{{$article->designation_article}}</td>
                                <td>{{$article->quantite}}</td>
                                <td>{{$article->prix_entree}}</td>
                                <td>{{$article->prix_sortie}}</td>
                                <td>{{$article->date_peremption}}</td>
                                <td>{{$article->date_fabrication}}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel-footer">
            <a href="{{url('/stock/livraison/create_update')}}" class="btn btn-primary">Enregister une nouvelle livraison</a>
        </div>
    </div>
@endsection('contenu_page')

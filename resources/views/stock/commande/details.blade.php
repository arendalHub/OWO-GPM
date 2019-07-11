@extends('layouts.stock')

@section('titre_contenu')
COMMANDES
@endsection('titre_contenu')

@section('sous_titre_contenu')
DETAILS DE LA COMMANDE cmd1
@endsection('sous_titre_contenu')

@section('contenu_page')
    <div class="panel">
        <div class="panel panel-heading">
            <h2>cmd-{{$commande->id_commande}}</h2>
            <hr/>
            <p>
            <h3>Fournisseur : <a title="{{$fournisseur->designation_fournisseur}}">{{$fournisseur->designation_fournisseur}}</a> </h3>
                <hr/>
                <h3>Stock : {{$commande->emplacement_stock}}</h3>
                <hr/>
                <h3>Date : {{$commande->date_commande}}</h3>
            </p>
        </div>
        <div class="panel-body">
            <div style="width: 100%" class="example-box-wrapper">
                <h2>Articles de cette commande</h2>
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="datatable-example">
                    <thead>
                        <tr>
                            <th>Article</th>
                            <th>Quantite</th>
{{--                            <th>Détails de l'article</th>--}}
                        </tr>
                    </thead>
                    <tbody>
                        @if($articles != null && count($articles)>0)
                            @foreach($articles as $article)
                                <tr>
                                    <td>{{$article->designation_article}}</td>
                                    <td>{{$article->quantite}}</td>
{{--                                    <td>{{}}</td>--}}
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div style="width: 100%" class="example-box-wrapper">
                <h2>Livraisons pour cette commande</h2>
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="datatable-example">
                    <thead>
                        <tr>
                            <th>Reference de livraison</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($i = 0; $i<5; $i++)
                            <tr>
                                <td><a href="{{url('stock/livraison/details/l')}}">liv{{$i+1}}</a></td>
                                <td>{{date('d m Y H:i:s')}}</td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel-footer">
            <a href="{{url('/stock/commande/create_update')}}" class="left btn btn-primary">Creer une nouvelle commande</a>
        </div>
    </div>
@endsection('contenu_page')

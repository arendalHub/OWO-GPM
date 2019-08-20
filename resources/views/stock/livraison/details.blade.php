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
            <hr/>
            <h3>Fournisseur : {{$livraison->designation_fournisseur}}</h3>
            </p>
            <br/>
            <div>
                <h2>Facturation</h2>
                <p>
                <h3>Numero de bordereau : {{$livraison->num_bordereau}}</h3>
                <hr/>
                <h3>Numero de la facture : {{$livraison->num_facture}}</h3>
                <hr/>
                <h3>Total de la livraison : {{$total}} FCFA</h3>
                </p>
            </div>
        </div>
        <div class="panel-body">
            @if(Session::has('error'))
                @include('stock.error', ['type'=>'warning', 'key'=>'error'])
            @endif
            @if(Session::has('message'))
                @include('stock.error', ['type'=>'info', 'key'=>'message'])
            @endif
            <div style="width: 100%" class="example-box-wrapper">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="datatable-example">
                    <thead>
                        <tr>
                            <th>Article</th>
                            <th>Quantite</th>
                            <th>Prix (XOF)</th>
                            <th>Date de péremption</th>
                            <th>Date de fabrication</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if($articles != null && count($articles) > 0)
                        @foreach($articles as $article)
                            <tr>
                                <td>{{$article->designation_article}}</td>
                                <td>{{$article->quantite_mouvement}}</td>
                                <td>{{$article->prix}}</td>
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
            <h2>Actions</h2>
            <table>
                <tr>
                    <td>
                        <a href="{{url('/stock/livraison/create_update')}}" style="float: left;" type="button" class="btn btn-border btn-alt border-green btn-link font-green">
                            <i class="glyph-icon icon-plus"></i>
                            <span>Enregistrer une livraison</span>
                        </a>
                    </td>

                    <td>
                        <a href="{{url("/stock/livraison/print_details/{$livraison->id_livraison}")}}" style="float: left;" type="button" class="btn btn-border btn-alt border-green btn-link font-green">
                            <i class="glyph-icon icon-pencil"></i>
                            <span>Imprimer</span>
                        </a>
                    </td>
                    <td>
                        <a href="{{url('/stock/livraison/list')}}" style="float: left;" type="button" class="btn btn-border btn-alt border-green btn-link font-green">
                            <i class="glyph-icon icon-list"></i>
                            <span>Retour sur la liste</span>
                        </a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection('contenu_page')

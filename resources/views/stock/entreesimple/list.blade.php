@extends('layouts.stock')

@section('titre_contenu')
ENTREES
@endsection('titre_contenu')

@section('sous_titre_contenu')
LISTE DES ENTREES DIRECTES EN STOCK
@endsection('sous_titre_contenu')

@section('contenu_page')
    <div class="panel">
        <div class="panel-body">
            @if(Session::has('message'))
                @include('stock.error', ['type'=>'info', 'key'=>'message'])
            @endif
            <div style="width: 100%" class="example-box-wrapper">
                <a href="{{url('/stock/entree/create_update')}}" class="btn btn-primary">Effectuer une nouvelle entrée directe</a>

                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="datatable-responsive">
                    <thead>
                        <tr>
                            <th>Référence</th>
                            <th>Date</th>
                            <th>Fournisseur</th>
                            <th width="10%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($entrees != null && count($entrees) > 0)
                            @foreach($entrees as $entree)
                                <tr>
                                    <td>num|{{$entree->id_mouvement_stock}}</td>
                                    <td>{{$entree->date_mouvement}}</td>
                                    <td>{{$entree->designation_fournisseur}}</td>
                                    <td>
                                        <a class="btn" title="Voir les details de l'entrée" href="{{url("/stock/entree/details/{$entree->id_mouvement_stock}")}}">
                                            <i class="glyph-icon icon-info"></i>
                                        </a>
                                        {{-- <a title="Imprimer l'entrée">
                                            <i class="glyph-icon icon-print"></i>
                                        </a> --}}
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
                {{$entrees->links()}}
            </div>
        </div>
    </div>
@endsection('contenu_page')

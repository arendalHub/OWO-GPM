@extends('layouts.stock')

@section('titre_contenu')
AFFECTATIONS
@endsection('titre_contenu')

@section('sous_titre_contenu')
LISTE DES AFFECTATIONS
@endsection('sous_titre_contenu')

@section('contenu_page')
    <div class="panel">
        <div class="panel-body">
            @if(Session::has('message'))
                @include('stock.error', ['type'=>'info', 'key'=>'message'])
            @endif
            <div style="width: 100%" class="example-box-wrapper">
                <a href="{{url('/stock/affectation/create_update')}}" class="btn btn-primary">Effectuer une nouvelle affectation</a>

                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="datatable-responsive">
                    <thead>
                        <tr>
                            <th>Référence</th>
                            <th>Date</th>
                            <th>Magasin</th>
                            <th width="10%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($affectations != null && count($affectations) > 0)
                            @foreach($affectations as $affectation)
                                <tr>
                                    <td>{{$affectation->id_mouvement_stock}}</td>
                                    <td>{{$affectation->date_mouvement}}</td>
                                    <td>{{$affectation->libelle_magasin}}</td>
                                    <td>
                                        <a class="btn" title="Voir les details de l'affectation" href="{{url("/stock/affectation/details/{$affectation->id_mouvement_stock}")}}">
                                            <i class="glyph-icon icon-info"></i>
                                        </a>
                                        <a class="btn" title="Imprimer l'entrée">
                                            <i class="glyph-icon icon-print"></i>
                                        </a>
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
                {{$affectations->links()}}
            </div>
        </div>
    </div>
@endsection('contenu_page')

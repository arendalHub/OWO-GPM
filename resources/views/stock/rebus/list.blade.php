@extends('layouts.stock')

@section('titre_contenu')
REBUS
@endsection('titre_contenu')

@section('sous_titre_contenu')
LISTE DES ARTICLES MIS EN REBUS
@endsection('sous_titre_contenu')

@section('contenu_page')
<div class="panel">
    <div class="panel panel-heading">
        @if(Session::has('message'))
            @include('stock.error', ['type'=>'info', 'key'=>'message'])
        @endif
        <a href="{{url('/stock/rebus/create_update')}}" type="button"
            class="btn btn-border btn-alt border-green btn-link font-green">
            <i class="glyph-icon icon-plus"></i>
            <span>Mettre un article au rebus</span>
        </a>
    </div>
    <div class="panel-body">
        <div style="width: 100%" class="example-box-wrapper">
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered"
                id="datatable-responsive">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Article</th>
                        <th>Motif</th>
                        <th>Quantité</th>
                        <th>Emplacement stock</th>
                    </tr>
                </thead>
                <tbody>
                    @if($rebus != null && count($rebus) > 0)
                    @foreach($rebus as $rebu)
                    <tr>
                        <td>{{$rebu->date_mouvement}}</td>
                        <td>{{$rebu->designation_article}}</td>
                        <td>{{$rebu->motif_mouvement}}</td>
                        <td>{{$rebu->quantite_mouvement}}</td>
                        <td>
                            Étagère : {{$rebu->emplacement_stock['lib_etagere']}} | Rangée :
                            {{$rebu->emplacement_stock['lib_rangee']}} | Box : {{$rebu->emplacement_stock['lib_box']}}
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
            {{$rebus->links()}}
        </div>
    </div>
</div>
@endsection('contenu_page')

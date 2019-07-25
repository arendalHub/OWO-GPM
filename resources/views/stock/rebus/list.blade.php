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
            <form class="form-inline">
                <div class="form-group">
                    <input  class="form-control" required placeholder="rechercher des articles mis en rebus" type="search"/>
                </div>
            </form>
        </div>
        <div class="panel-body">
            <div style="width: 100%" class="example-box-wrapper">
                <a href="{{url('/stock/rebus/create_update')}}" title="Mettre un article en rebus" class="btn btn-primary">Mettre un article en rebus</a>

                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="datatable-example">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Article</th>
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
                                <td>{{$rebu->quantite_mouvement}}</td>
                                <td>{{$rebu->emplacement_stock}}</td>
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

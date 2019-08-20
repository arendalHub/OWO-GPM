@extends('layouts.stock')

@section('titre_contenu')
MAGASINS
@endsection('titre_contenu')

@section('sous_titre_contenu')
LISTE DES MAGASINS
@endsection('sous_titre_contenu')

@section('contenu_page')
    <div class="panel">
        <div class="panel-heading">
            @if(Session::has('message'))
                @include('stock.error', ['type'=>'info', 'key'=>'message'])
            @endif
            <a href="{{url('/stock/magasin/create_update')}}" class="btn btn-primary">Ajouter un nouveau magasin</a>
        </div>
        <div class="panel-body">
            <div style="width: 100%" class="example-box-wrapper">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="datatable-responsive">
                    <thead>
                        <tr>
                            <th>Libellé du magasin</th>
                            <th>Adresse du magasin</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($magasins != null && count($magasins) > 0)
                            @foreach($magasins as $magasin)
                                <tr>
                                    <td>{{$magasin->libelle_magasin}}</td>
                                    <td>{{$magasin->adresse_magasin}}</td>
                                    <td>
                                        <a class="btn" title="Modifier les informations sur le magasin" href="{{url("/stock/magasin/create_update/{$magasin->id_magasin}")}}"><i class="glyph-icon icon-pencil"></i></a>
                                        <a class="btn" title="Supprimer le magasin" href="{{url("/stock/magasin/delete/{$magasin->id_magasin}")}}"><i class="glyph-icon icon-trash"></i></a>
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
                {{$magasins->links()}}
            </div>
        </div>
    </div>
@endsection('contenu_page')

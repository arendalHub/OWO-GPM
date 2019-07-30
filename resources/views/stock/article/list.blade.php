@extends('layouts.stock')

@section('titre_contenu')
Gestion stock 
@endsection('titre_contenu')

@section('sous_titre_contenu')
List des articles
@endsection('sous_titre_contenu')

@section('contenu_page')
    <div class="panel">
        <div class="panel-body">
            <div class="panel panel-heading">
                @if(Session::has('message'))
                    @include('stock.error', ['type'=>'info', 'key'=>'message'])
                @endif

                <form class="form-inline">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Rechercher un article">
                    </div>
                </form>
            </div>
            <div class="example-box-wrapper">
                <a href="{{url('/stock/article/create_update')}}" style="float: left;" type="button" class="btn btn-border btn-alt border-green btn-link font-green" data-toggle="modal" data-target="#myModal">
                    <i class="glyph-icon icon-plus"></i>
                    <span>Ajouter un nouvel article</span>
                </a>
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="datatable-example">
                    <thead>
                        <tr>
                            <th>Référence</th>
                            <th>Code article</th>
                            <th>Designation</th>
                            <th>Famille</th>
                            <th>Consommable</th>
                            <th>emplacement</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($items) > 0)
                            @foreach($items as $item)
                                <tr>
                                    <td>{{strtoupper(substr($item->designation_article, 0, 3))}}-{{$item->id_article}}</td>
                                    <td>{{$item->code_article}}</td>
                                    <td>{{$item->designation_article}}</td>
                                    <td>{{$item->description_famille}}</td>
                                    <td>
                                        @if($item->consommable == null)
                                            Non
                                        @else
                                            Oui
                                        @endif
                                    </td>
                                    <td>
                                        Magasin {{$item->libelle_magasin}} à {{$item->adresse_magasin}}
                                        <br/>
                                        à l'emplacement Étagère {{$item->stock_etagere}} - Rangée {{$item->stock_range}} - Box {{$item->stock_box}}</td>
                                    <td>
                                        <a class="btn btn" title="voir les details de l'article" href="{{url("/stock/article/details/{$item->id_article}")}}">
                                            <i class="glyph-icon icon-eye"></i>
                                        </a>
                                        <a class="btn" title="modifier l'article" href="{{url("/stock/article/create_update/{$item->id_article}")}}">
                                            <i class="glyph-icon icon-pencil"></i>
                                        </a>
                                        <a class="btn" title="supprimer l'article" href="#">
                                            <i class="glyph-icon icon-trash"></i>
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
                <ul class="pagination">
                    {{$items->links()}}
                </ul>
            </div>
        </div>
    </div>
@endsection('contenu_page')
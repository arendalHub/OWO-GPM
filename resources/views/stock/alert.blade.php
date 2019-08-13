@extends('layouts.stock')

@section('titre_contenu')
Gestion stock
@endsection('titre_contenu')

@section('sous_titre_contenu')
Liste des articles au seuil d'avertissement
@endsection('sous_titre_contenu')

@section('contenu_page')
    <div class="panel">
        <div class="panel-body">
            <div class="panel panel-heading">
                @if(Session::has('message'))
                    @include('stock.error', ['type'=>'info', 'key'=>'message'])
                @endif
            </div>

            <div class="example-box-wrapper">

                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="datatable-responsive">
                    <thead>
                        <tr>
                            <th>Code article</th>
                            <th>Designation</th>
                            <th>Famille</th>
                            <th>Consommable</th>
                            <th>Emplacement</th>
                            <th width="5%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($items) > 0)
                            @foreach($items as $item)
                                <tr>
                                    <td>{{$item->code_article}}</td>
                                    <td>{{$item->designation_article}}</td>
                                    <td>{{$item->description_famille}}</td>
                                    <td>
                                        @if($item->consommable == 0)
                                            Non
                                        @else
                                            Oui
                                        @endif
                                    </td>
                                    <td>
                                        Étagère : {{$item->lib_etagere}} | Rangée : {{$item->lib_rangee}} | Box : {{$item->lib_box}}
                                    </td>
                                    <td>
                                        <a class="btn btn" title="voir les details de l'article" href="{{url("/stock/article/details/{$item->id_article}")}}">
                                            <i class="glyph-icon icon-eye"></i>
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

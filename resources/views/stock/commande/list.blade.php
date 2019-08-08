@extends('layouts.stock')

@section('titre_contenu')
COMMANDES
@endsection('titre_contenu')

@section('sous_titre_contenu')
LISTE DES COMMANDES
@endsection('sous_titre_contenu')

@section('contenu_page')
    <div class="panel">
        <div class="panel panel-heading">
            <form class="form-inline">
                    <div class="form-group">
                        <input  class="form-control" required placeholder="rechercher une commande" type="search"/>
                </div>
            </form>
        </div>
        <div class="panel-body">
            @if(Session::has('message'))
                @include('stock.error', ['type'=>'info', 'key'=>'message'])
            @endif
            <div style="width: 100%" class="example-box-wrapper">
                <a href="{{url('/stock/commande/create_update')}}" class="btn btn-primary">Creer une nouvelle commande</a>

                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="datatable-example">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Libelle</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($commandes != null && count($commandes) > 0)
                            @foreach($commandes as $commande)
                                <tr>
                                    <td>{{$commande->date_commande}}</td>
                                    <td>CMD-{{$commande->id_commande}}</td>
                                    <td>
                                        <a class="btn" title="supprimer l'article" href="{{url("/stock/commande/delete/{$commande->id_article}")}}">
                                            <i class="glyph-icon icon-trash"></i>
                                        </a>
                                        <a class="btn" title="voir les details de la commande" href="{{url("/stock/commande/details/{$commande->id_commande}")}}">
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
                {{$commandes->links()}}
            </div>
        </div>
    </div>
@endsection('contenu_page')

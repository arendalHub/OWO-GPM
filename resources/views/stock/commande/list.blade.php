@extends('layouts.stock')

@section('titre_contenu')
COMMANDES
@endsection('titre_contenu')

@section('sous_titre_contenu')
LISTE DES COMMANDES
@endsection('sous_titre_contenu')

@section('contenu_page')
    <div class="panel">
        <div class="panel-heading">
            @if(Session::has('message'))
                @include('stock.error', ['type'=>'info', 'key'=>'message'])
            @endif
            <a href="{{url('/stock/commande/create_update')}}" class="btn btn-primary">
                Creer une nouvelle commande
            </a>
            <a href="{{url("/stock/commande/print_list")}}" class="btn btn-primary">
                <span>Imprimer</span>
            </a>
        </div>
        <div class="panel-body">
            <div style="width: 100%" class="example-box-wrapper">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="datatable-responsive">
                    <thead>
                        <tr>
                            <th>Référence</th>
                            <th>Date</th>
                            <th>Fournisseur</th>
                            <th>Livrée</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($commandes != null && count($commandes) > 0)
                            @foreach($commandes as $commande)
                                <tr>
                                    <td>CMD-{{$commande->id_commande}}</td>
                                    {{-- l jS \\of F Y h:i:s A --}}
                                    <td>{{date('l jS \\of F Y', strtotime($commande->date_commande))}}</td>
                                    <td>{{$commande->designation_fournisseur}}</td>
                                    <td>
                                            @if($commande->livre == 0)
                                            Non
                                        @else
                                            Oui
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn" title="Voir les details de la commande" href="{{url("/stock/commande/details/{$commande->id_commande}")}}">
                                            <i class="glyph-icon icon-eye"></i>
                                        </a>
                                        <a class="btn" title="Supprimer la commande" href="{{url("/stock/commande/delete/{$commande->id_commande}")}}">
                                            <i class="glyph-icon icon-trash"></i>
                                        </a>
                                        <a class="btn" title="Imprimer la commande" href="{{url("/stock/commande/print_details/{$commande->id_commande}")}}">
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
                {{$commandes->links()}}
            </div>
        </div>
    </div>
@endsection('contenu_page')

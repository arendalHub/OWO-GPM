@extends('layouts.stock')

@section('titre_contenu')
COMMANDES
@endsection('titre_contenu')

@section('sous_titre_contenu')
DETAILS DE LA COMMANDE cmd1
@endsection('sous_titre_contenu')

@section('contenu_page')
    <div class="panel">
        <div class="panel panel-heading">
            <h2>cmd 1</h2>
            <hr/>
            <p>
                <h3>Fournisseur : fournisseur 1</h3>
                <hr/>
                <h3>Date : {{date('d m Y H:i:s')}}</h3>
            </p>
        </div>
        <div class="panel-body">
            <div style="width: 100%" class="example-box-wrapper">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="datatable-example">
                    <thead>
                        <tr>
                            <th>Article</th>
                            <th>Quantite</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php $limit=7; sleep(1);?>
                            @for($i=0; $i<$limit; $i++)
                                <tr>
                                    <td>Article {{$i+1}}</td>
                                    <td>{{$i+1}}</td>
                                </tr>
                            @endfor
                    </tbody>
                </table>
            </div>
            <div style="width: 100%" class="example-box-wrapper">
                <h2>Livraisons pour cette commande</h2>
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="datatable-example">
                    <thead>
                        <tr>
                            <th>Reference de livraison</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($i = 0; $i<5; $i++)
                            <tr>
                                <td><a href="{{url('stock/livraison/details/l')}}">liv{{$i+1}}</a></td>
                                <td>{{date('d m Y H:i:s')}}</td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel-footer">
            <a href="{{url('/stock/commande/create_update')}}" class="left btn btn-primary">Creer une nouvelle commande</a>
        </div>
    </div>
@endsection('contenu_page')

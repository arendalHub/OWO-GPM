@extends('layouts.stock')

@section('titre_contenu')
LIVRAISON
@endsection('titre_contenu')

@section('sous_titre_contenu')
DETAILS DE LA LIVRAISON liv1
@endsection('sous_titre_contenu')

@section('contenu_page')
    <div class="panel">
        <div class="panel panel-heading">
            <h2>liv1</h2>
            <hr/>
            <p>
                <h3>Reference de commande : <a href="{{url('/stock/commande/details/i')}}">{{$livraison->i}}</a></h3>
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
                            <th>Prix (XOF)</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php $limit=7; sleep(1);?>
                            @for($i=0; $i<$limit; $i++)
                                <tr>
                                    <td>Article {{$i+1}}</td>
                                    <td>{{$i+1}}</td>
                                    <td>1200</td>
                                </tr>
                            @endfor
                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel-footer">
            <a href="{{url('/stock/livraison/create_update')}}" class="btn btn-primary">Enregister une nouvelle livraison</a>
        </div>
    </div>
@endsection('contenu_page')

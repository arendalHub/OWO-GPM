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
            <a href="{{url('/stock/rebus/create_update')}}" title="Mettre un article en rebus" class="btn btn-primary">Mettre un article en rebus</a>
        </div>
        <div class="panel-body">
            <div style="width: 100%" class="example-box-wrapper">

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
                            <?php $limit=7; sleep(1);?>
                            @for($i=0; $i<$limit; $i++)
                                <tr>
                                    <td>{{date('d m Y H:i:s')}}</td>
                                    <td>Article {{$i}}</td>
                                    <td>
                                        3
                                    </td><td>
                                        Emplacement {{$i}}
                                    </td>
                                </tr>
                            @endfor
                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel-footer">
            <div class="text-center">
                <ul class="pagination">
                    <li><a href="#" class="active">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">6</a></li>
                    <li><a href="#">7</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection('contenu_page')

@extends('layouts.stock')

@section('titre_contenu')
STOCK
@endsection('titre_contenu')

@section('sous_titre_contenu')
DETAILS DU STOCK stck1
@endsection('sous_titre_contenu')

@section('contenu_page')
    <div class="panel">
        <div class="panel panel-heading">
            <h2>stck1</h2>
            <hr/>
            <p>
                <h3>Date de création : {{date('d m Y H:i:s')}}</h3>
                <hr/>
                <h3>Désignation: stock bb</h3>
                <hr/>
            </p>
        </div>
        <div class="panel-body">
            <div style="width: 100%" class="example-box-wrapper">
                <h2>Produits</h2>
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="datatable-example">

                </table>
            </div>
        </div>
    </div>
@endsection('contenu_page')

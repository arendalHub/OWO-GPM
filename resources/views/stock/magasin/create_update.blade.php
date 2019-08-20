@extends('layouts.stock')

@section('titre_contenu')
MAGASIN
@endsection('titre_contenu')

@section('sous_titre_contenu')
ENREGISTREMENT / MODIFICATION D'UN MAGASIN
@endsection('sous_titre_contenu')

@section('contenu_page')

<div class="panel">
    <div class="panel-heading">
        @if(Session::has('error'))
            @include('stock.error', ['type'=>'warning', 'key'=>'error'])
        @endif
        @if(Session::has('message'))
            @include('stock.error', ['type'=>'info', 'key'=>'message'])
        @endif
        <a href="{{url('/stock/magasin/list')}}" class="btn btn-primary">Retour sur la liste</a>
    </div>
    <div class="panel-body">
        <div class="example-box-wrapper">
            <form class="form-horizontal bordered-row" method="POST" action="{{url('/stock/magasin/do_create_update')}}" id="demo-form" data-parsley-validate>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Libellé du magasin</label>
                            <div class="col-sm-6">
                                <input
                                 value="@if(($magasin != null && $update)){{$magasin->libelle_magasin}}@else{{old('libelle_magasin')}}@endif"
                                 class="form-control"
                                 name="libelle_magasin"
                                 placeholder="Libellé du magasin" type="text"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Adresse du magasin</label>
                            <div class="col-sm-6">
                                <input
                                 value="@if(($magasin != null && $update)) {{$magasin->adresse_magasin}}@else{{old('adresse_magasin')}}@endif"
                                 name="adresse_magasin"
                                 class="form-control"
                                 placeholder="Adresse du magasin"
                                 type="text"/>
                            </div>
                        </div>
                        <input type="text" name="update" value="{{$update}}" hidden>
                        @if(($magasin != null && $update))
                            <input type="text" name="id_magasin" value="{{$magasin->id_magasin}}" hidden />
                        @endif
                        @csrf
                        <div class="bg-default content-box text-center pad20A mrg25T">
                            <button type="submit" class="btn btn-lg btn-primary">Valider</button>
                            <button type="reset" class="btn btn-lg btn-default">Effacer</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection('contenu_page')

@extends('layouts.stock')

@section('titre_contenu')
ARTICLES
@endsection('titre_contenu')

@section('sous_titre_contenu')
CREATION / MODIFICATION D'UN ARTICLE
@endsection('sous_titre_contenu')

@section('contenu_page')

<div class="panel">
    <div class="panel-body">
        @if(Session::has('error'))
            @include('stock.error', ['type'=>'warning', 'key'=>'error'])
        @endif

        <div class="example-box-wrapper">
            <form method="POST" action="{{url('/stock/article/do_create_update')}}" class="form-horizontal bordered-row" id="demo-form" data-parsley-validate>
                <div class="row">
                    <fieldset>
                        <legend class="text-center">Informations générales</legend>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Designation</label>
                                <div class="col-sm-6">
                                    <input required
                                           type="text"
                                           @if(($item != null && $update)) { disabled="" } @endif
                                           value="@if(($item != null && $update)) {{$item->designation_article}}@else{{old('designation_article')}}@endif"
                                           name="designation_article"
                                           placeholder="Saisir la designation de l'article"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Code article</label>
                                <div class="col-sm-6">
                                    <input required
                                           type="text"
                                           value="@if(($item != null && $update)){{$item->code_article}}@else{{old('code_article')}}@endif"
                                           @if(($item != null && $update)) { disabled="" } @endif
                                           name="code_article"
                                           placeholder="Saisir le code de l'article"
                                           required class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Prix de vente</label>
                                <div class="col-sm-6">
                                    <input required min="0" type="number" value="@if(($item != null && $update)) {{$item->prix_vente}}@else{{old('prix_vente')}}@endif" name="prix_vente" placeholder="Saisir le prix de vente de l'article" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Prix d'achat</label>
                                <div class="col-sm-6">
                                    <input min="0" required type="number" value="@if(($item != null && $update)) {{$item->prix_achat}}@else{{old('prix_achat')}}@endif" name="prix_achat" placeholder="Saisir le prix d'achat de l'article" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Famille</label>
                                <div class="col-sm-6">
                                    <select required="" class="form-control" name="id_famille">
                                        @if($familles != null && count($familles) > 0)
                                            @foreach($familles as $famille)
                                                <option value="{{$famille->id_famille}}">{{$famille->description_famille}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Consommable ?</label>
                                <div class="col-sm-6">
                                    <div class="checkbox">
                                        <label> <input type="checkbox" name="consommable"> Oui </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend class="text-center">Emplacement de stockage</legend>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Magasin</label>
                            <div class="col-sm-6">
                                <select required="" class="form-control" name="id_magasin">
                                    @if(isset($magasins) && count($magasins) > 0)
                                        @foreach($magasins as $magasin)
                                            <option value="{{$magasin->id_magasin}}">{{$magasin->libelle_magasin}} - {{$magasin->adresse_magasin}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Étagère</label>
                            <div class="col-sm-6">
                                <input required type="text" value="@if(($item != null && $update)) {{$item->stock_etagere}}@else{{old('stock_etagere')}}@endif" name="stock_etagere" placeholder="Saisir le numéro ou le libellé de l'étagère dans le magasin" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Rangée</label>
                            <div class="col-sm-6">
                                <input required type="text" value="@if(($item != null && $update)) {{$item->stock_range}}@else{{old('stock_range')}}@endif" name="stock_range" placeholder="Saisir le numéro ou le libellé la rangée dans l'étagère" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Case</label>
                            <div class="col-sm-6">
                                <input required type="text" value="@if(($item != null && $update)) {{$item->stock_box}}@else{{old('stock_box')}}@endif" name="stock_box" placeholder="Saisir le numéro ou le libellé de la case dans la rangée" class="form-control">
                            </div>
                        </div>
                    </fieldset>
                </div>
                <input type="text" name="update" value="{{$update}}" hidden>
                @if(($item != null && $update))
                    <input type="text" name="id_article" value="{{$item->id_article}}" hidden />
                @endif
                @csrf
                <div class="bg-default content-box text-center pad20A mrg25T">
                    <button type="submit" class="btn btn-lg btn-primary">Valider</button>
                    <button type="reset" class="btn btn-lg btn-default">Effacer</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection('contenu_page')
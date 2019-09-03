@extends('layouts.stock')

@section('titre_contenu')
ARTICLES
@endsection('titre_contenu')

@section('sous_titre_contenu')
CREATION / MODIFICATION D'UN ARTICLE
@endsection('sous_titre_contenu')

@section('contenu_page')

<div class="panel">
    <div class="panel panel-heading">
        <a href="{{url('/stock/article/list')}}" style="float: left;" class="btn btn-border btn-alt border-green btn-link font-green">
            <i class="glyph-icon icon-list"></i>
            <span>Retour sur la liste</span>
        </a>
    </div>
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
                            @if(($item != null && $update))
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Code article</label>
                                <div class="col-sm-6">
                                    <input required
                                           type="text"
                                           disabled=""
                                           value="@if(($item != null && $update)){{$item->code_article}}@endif"
                                           name="code_article"
                                           class="form-control">
                                </div>
                            </div>
                            @endif
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Designation</label>
                                <div class="col-sm-6">
                                    <input required
                                           type="text"
                                           value="@if(($item != null && $update)){{$item->designation_article}}@else{{old('designation_article')}}@endif"
                                           @if(($item != null && $update)) { disabled="" } @endif
                                           name="designation_article"
                                           placeholder="Saisir la désignation de l'article"
                                           required class="form-control">
                                </div>
                            </div>
                            <input min="0" type="number" value="@if(($item != null && $update)){{$item->id_emplacement}}@endif" name="id_emplacement" class="form-control hidden">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Valeur du stock d'alerte</label>
                                <div class="col-sm-6">
                                    <input required min="0" type="number" value="@if(($item != null && $update)){{$item->seuil_alert}}@else {{old('seuil_alert')}} @endif" name="seuil_alert" placeholder=" @if($item == null) Saisir une valeur d'alerte de quantité en stock @elseif($item != null && $update) {{$item->seuil_alert}} @else {{old('seuil_alert')}} @endif" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Valeur du stock de sécurité</label>
                                <div class="col-sm-6">
                                    <input required min="0" type="number" value="@if(($item != null && $update)){{$item->seuil_critique}}@else {{old('seuil_critique')}} @endif" name="seuil_critique" placeholder=" @if($item == null) Saisir une valeur d'alerte critique de quantité en stock @elseif($item != null && $update) {{$item->seuil_critique}} @else {{old('seuil_critique')}} @endif" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Prix d'achat</label>
                                <div class="col-sm-6">
                                        <input required min="0" type="number" value="@if(($item != null && $update)){{$item->prix_achat}}@else {{old('prix_achat')}} @endif" name="prix_achat" placeholder=" @if($item == null) Saisir le prix d'achat de l'article @elseif($item != null && $update) {{$item->prix_achat}} @else {{old('prix_achat')}} @endif" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Prix de vente</label>
                                <div class="col-sm-6">
                                    <input required min="0" type="number" value="@if(($item != null && $update)){{$item->prix_vente}}@else {{old('prix_vente')}} @endif" name="prix_vente" placeholder=" @if($item == null) Saisir le prix de vente de l'article @elseif($item != null && $update) {{$item->prix_vente}} @else {{old('prix_vente')}} @endif" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Famille</label>
                                <div class="col-sm-6">
                                    <select required="" class="form-control" name="id_famille">
                                        @if($familles != null && count($familles) > 0)
                                            @foreach($familles as $famille)
                                                @if(($item != null && $update) && ($item->id_famille == $famille->id_famille))
                                                    <option selected value="{{$famille->id_famille}}">{{$famille->description_famille}}</option>
                                                @else
                                                    <option value="{{$famille->id_famille}}">{{$famille->description_famille}}</option>
                                                @endif
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
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Étagère</label>
                                <div class="col-sm-6">
                                    <select required="" class="form-control" name="id_etagere">
                                        @if($etageres != null && count($etageres) > 0)
                                            @foreach($etageres as $etagere)
                                                @if(($item != null && $update) && ($item->id_etagere == $etagere->id_etagere))
                                                    <option selected value="{{$etagere->id_etagere}}">{{$etagere->lib_etagere}}</option>
                                                @else
                                                    <option value="{{$etagere->id_etagere}}">{{$etagere->lib_etagere}}</option>
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Rangée</label>
                                <div class="col-sm-6">
                                    <select required="" class="form-control" name="id_rangee">
                                        @if($rangees != null && count($rangees) > 0)
                                            @foreach($rangees as $rangee)
                                                @if(($item != null && $update) && ($item->id_rangee == $rangee->id_rangee))
                                                    <option selected value="{{$rangee->id_rangee}}">{{$rangee->lib_rangee}}</option>
                                                @else
                                                    <option value="{{$rangee->id_rangee}}">{{$rangee->lib_rangee}}</option>
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Box</label>
                                <div class="col-sm-6">
                                    <select required="" class="form-control" name="id_box">
                                        @if($boxes != null && count($boxes) > 0)
                                            @foreach($boxes as $box)
                                                @if(($item != null && $update) && ($item->id_box == $box->id_box))
                                                    <option selected value="{{$box->id_box}}">{{$box->lib_box}}</option>
                                                @else
                                                    <option value="{{$box->id_box}}">{{$box->lib_box}}</option>
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
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

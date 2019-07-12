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
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Designation</label>
                            <div class="col-sm-6">
                                <input required type="text" value="@if(($item != null && $update)) {{$item->designation_article}}@else {{old('designation_article')}} @endif" name="designation_article" placeholder="Saisir la designation de l'article" required class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Emplacement de stock</label>
                            <div class="col-sm-6">
                                <input required type="text" value="@if(($item != null && $update)) {{$item->emplacement_stock}}@else {{old('emplacement_stock')}} @endif" name="emplacement_stock" placeholder="Saisir l'emplacement de stockage de l'article" class="form-control">
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
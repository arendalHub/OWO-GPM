@extends('layouts.stock')
@section('titre_contenu')
REBUS
@endsection('titre_contenu')

@section('sous_titre_contenu')
MISE EN REBUS
@endsection('sous_titre_contenu')

@section('contenu_page')
    <div class="panel">
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{url('/stock/rebus/do_create_update')}}" method="POST" class="form-horizontal bordered-row" id="demo-form" data-parsley-validate>
                        <span id="items-index" hidden>0</span>
                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Désignation de l'article</label>
                                <div class="col-sm-6">
                                    <select onchange="document.getElementById('number_input').max = this.value.split(';')[1]" required="" class="form-control" name="id_article">
                                        <option value="0"></option>
                                        @if($articles != null && count($articles) > 0)
                                            @for($i = 0; $i<count($articles); $i++)
                                                <option class="{{$articles[$i]["article_quantity"]}}"
                                                        value="{{$articles[$i]["article_item"]->id_article}};{{$articles[$i]["article_quantity"]}}">
                                                    {{$articles[$i]["article_item"]->designation_article}}
                                                </option>
                                            @endfor
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Quantité</label>
                            <div class="col-sm-6">
                                <input id="number_input" type="number" name="quantite_mouvement" max="" min="1" class="form-control"/>
                            </div>
                        </div>

                        <div class="bg-default content-box text-center pad20A mrg25T">
                            <button type="submit" class="btn btn-lg btn-primary">Valider</button>
                            <button type="reset" class="btn btn-lg btn-default">Effacer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection('page_content')
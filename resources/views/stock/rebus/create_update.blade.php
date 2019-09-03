@extends('layouts.stock')
@section('titre_contenu')
REBUS
@endsection('titre_contenu')

@section('sous_titre_contenu')
MISE EN REBUS
@endsection('sous_titre_contenu')

@section('contenu_page')
    <div class="panel">
        <div class="panel-heading">
            @if(Session::has('error'))
                @include('stock.error', ['type'=>'warning', 'key'=>'error'])
            @endif
            <a href="{{url('/stock/rebus/list')}}" style="" type="button" class="btn btn-border btn-alt border-green btn-link font-green">
                <i class="glyph-icon icon-trash"></i>
                <span>Liste des articles mis au rebus</span>
            </a>
        </div>

        <div class="panel-body">
                <div class="row">
                <div class="col-lg-12">
                    @if($articles == null)
                        Vous n'avez aucun article en stock pour faire une mise en rebus.
                    @else
                        <form action="{{url('/stock/rebus/do_create_update')}}" method="POST" class="form-horizontal bordered-row" id="demo-form" data-parsley-validate>
                            @csrf
                            <span id="items-index" hidden>0</span>
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Désignation de l'article</label>
                                    <div class="col-sm-6">
                                            {{-- document.querySelector('option[\'selected\']').getAttribute('qtt') --}}
                                        <select onchange="document.getElementById('number_input').max = this.getAttribute('id')" required class="form-control" name="id_article">
                                            @foreach($articles as $article)
                                                <option selected value="{{$article->id_article}}" id="{{$article->id_article}}">{{$article->designation_article}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </fieldset>
                            @foreach($articles as $article)
                                <input hidden selected id="{{$article->id_article}}" value="{{$article->quantite_stock}}" />
                            @endforeach
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Quantité</label>
                                <div class="col-sm-6">
                                <input id="number_input" required type="number" name="quantite_mouvement" min="1" max="" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Motif de mise en rebus</label>
                                <div class="col-sm-6">
                                    <input required type="text" name="motif_mouvement" maxlength="127" class="form-control"/>
                                </div>
                            </div>
                            <div class="bg-default content-box text-center pad20A mrg25T">
                                <button type="submit" class="btn btn-lg btn-primary">Valider</button>
                                <button type="reset" class="btn btn-lg btn-default">Effacer</button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection('page_content')

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
                    <form class="form-horizontal bordered-row" id="demo-form" data-parsley-validate>
                        <span id="items-index" hidden>0</span>
                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Désignation du stock</label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="stock" required>
                                        <option>stock 1</option>
                                        <option>stock 2</option>
                                        <option>stock 3</option>
                                        <option>stock 4</option>
                                        <option>Chercher un stock</option>
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Désignation de l'article</label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="article" required>
                                        <option>article 1</option>
                                        <option>article 2</option>
                                        <option>article 3</option>
                                        <option>article 4</option>
                                        <option>Chercher un article</option>
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Quantité</label>
                            <div class="col-sm-6">
                                <input type="number" min="1" class="form-control"/>
                            </div>
                        </div>

                        <div class="bg-default content-box text-center pad20A mrg25T">
                            <button type="submit" class="btn btn-lg btn-primary">Valider</button>
                            <button type="reset" onclick="resetForm()" class="btn btn-lg btn-default">Effacer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection('page_content')
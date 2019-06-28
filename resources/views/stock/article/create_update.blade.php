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
        <h3 class="title-hero">
            Formulaire d'ajout d'un article
        </h3>
        <div class="example-box-wrapper">
            <form class="form-horizontal bordered-row" id="demo-form" data-parsley-validate>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Designation</label>
                            <div class="col-sm-6">
                                <input type="text" placeholder="Saisir la designation de l'article" required class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Famille</label>
                            <div class="col-sm-6">
                                <select required="" class="form-control" name="family">
                                    <option>Famille 1</option>
                                    <option>Famille 4</option>
                                    <option>Famille 3</option>
                                    <option>Famille 2</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Consommable</label>
                                <div class="col-sm-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="example-radio1" value="">
                                            Oui
                                        </label>
                                    </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="example-radio1" value="">
                                        Non
                                    </label>
                                </div>
                            </div>
                        </div>
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
@endsection('contenu_page')
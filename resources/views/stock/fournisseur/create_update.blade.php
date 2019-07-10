@extends('layouts.stock')

@section('titre_contenu')
FOURNISSEUR
@endsection('titre_contenu')

@section('sous_titre_contenu')
ENREGISTREMENT / MODIFICATION D'UN FOURNISSEUR
@endsection('sous_titre_contenu')

@section('contenu_page')

<div class="panel">
    <div class="panel-body">
        <div class="example-box-wrapper">
            <form class="form-horizontal bordered-row" id="demo-form" data-parsley-validate>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Désignation</label>
                            <div class="col-sm-6">
                                <input class="form-control" required placeholder="Désignation du fournisseur" type="text"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Adresse</label>
                            <div class="col-sm-6">
                                <input class="form-control" required placeholder="Adresse du fournisseur" type="text"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Contact</label>
                            <div class="col-sm-6">
                                <input class="form-control" required placeholder="Contact du fournisseur" type="text"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-6">
                                <input class="form-control" required placeholder="Email du fournisseur" type="email"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Boite postale</label>
                            <div class="col-sm-6">
                                <input class="form-control" required placeholder="Boite postale du fournisseur" type="text"/>
                            </div>
                        </div>
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

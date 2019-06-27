@extends('layouts.parametre')

@section('titre_contenu')
PROFILS 
@endsection('titre_contenu')

@section('sous_titre_contenu')
CREATION / MODIFICATION DE PROFIL
@endsection('sous_titre_contenu')

@section('contenu_page')

<div class="panel">
    <div class="panel-body">
        <h3 class="title-hero">
            CREATION / MODIFICATION DE PROFIL
        </h3>
        <div class="example-box-wrapper">
            <form class="form-horizontal bordered-row" id="demo-form" data-parsley-validate>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">LIBELLE</label>
                            <div class="col-sm-6">
                                <input type="text" placeholder="Required Field" required class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">DROIT []</label>
                            <div class="col-sm-6">
                                <select class="form-control">
                                    <option>Afficher</option>
                                    <option>Créer</option>
                                    <option>Modifier</option>
                                    <option>Supprimer</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">DROIT []</label>
                            <div class="col-sm-6">
                                <select class="form-control">
                                    <option>Afficher</option>
                                    <option>Créer</option>
                                    <option>Modifier</option>
                                    <option>Supprimer</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">DROIT []</label>
                            <div class="col-sm-6">
                                <select class="form-control">
                                    <option>Afficher</option>
                                    <option>Créer</option>
                                    <option>Modifier</option>
                                    <option>Supprimer</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">DROIT []</label>
                            <div class="col-sm-6">
                                <select class="form-control">
                                    <option>Afficher</option>
                                    <option>Créer</option>
                                    <option>Modifier</option>
                                    <option>Supprimer</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">DROIT []</label>
                            <div class="col-sm-6">
                                <select class="form-control">
                                    <option>Afficher</option>
                                    <option>Créer</option>
                                    <option>Modifier</option>
                                    <option>Supprimer</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">DROIT []</label>
                            <div class="col-sm-6">
                                <select class="form-control">
                                    <option>Afficher</option>
                                    <option>Créer</option>
                                    <option>Modifier</option>
                                    <option>Supprimer</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="bg-default content-box text-center pad20A mrg25T">
                    <button class="btn btn-lg btn-primary">ENREGISTRER</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection('contenu_page')

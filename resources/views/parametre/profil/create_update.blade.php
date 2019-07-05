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
                                <input type="text" placeholder="Libellé du profil" required class="form-control">
                            </div>
                        </div>

                        <hr>
                        <i class="text-center">DROITS</i>
                        <hr>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Articles</label>
                            <div class="col-sm-6">
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="" value="read">
                                    Afficher
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="" value="create">
                                    Créer
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="" value="update">
                                    Modifier
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="" value="delete">
                                    Supprimer
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Fournisseurs</label>
                            <div class="col-sm-6">
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="" value="read">
                                    Afficher
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="" value="create">
                                    Créer
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="" value="update">
                                    Modifier
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="" value="delete">
                                    Supprimer
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Commandes</label>
                            <div class="col-sm-6">
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="" value="read">
                                    Afficher
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="" value="create">
                                    Créer
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="" value="update">
                                    Modifier
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="" value="delete">
                                    Supprimer
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Livraisons</label>
                            <div class="col-sm-6">
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="" value="read">
                                    Afficher
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="" value="create">
                                    Créer
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="" value="update">
                                    Modifier
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="" value="delete">
                                    Supprimer
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Personnel</label>
                            <div class="col-sm-6">
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="" value="read">
                                    Afficher
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="" value="create">
                                    Créer
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="" value="update">
                                    Modifier
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="" value="delete">
                                    Supprimer
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Zones</label>
                            <div class="col-sm-6">
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="" value="read">
                                    Afficher
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="" value="create">
                                    Créer
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="" value="update">
                                    Modifier
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="" value="delete">
                                    Supprimer
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Sites</label>
                            <div class="col-sm-6">
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="" value="read">
                                    Afficher
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="" value="create">
                                    Créer
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="" value="update">
                                    Modifier
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="" value="delete">
                                    Supprimer
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Clients</label>
                            <div class="col-sm-6">
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="" value="read">
                                    Afficher
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="" value="create">
                                    Créer
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="" value="update">
                                    Modifier
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="" value="delete">
                                    Supprimer
                                </label>
                            </div>
                        </div>


                    </div>
                    
                </div>
                <div class="bg-default content-box text-center pad20A mrg25T">
                    <button class="btn btn-lg btn-primary">VALIDER</button>
                    <button class="btn btn-lg btn-default">ANNULER</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection('contenu_page')

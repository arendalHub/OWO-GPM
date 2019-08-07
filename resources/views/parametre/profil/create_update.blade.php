@extends('layouts.parametre')

@section('titre_contenu')
    PROFILS
@endsection('titre_contenu')

@section('sous_titre_contenu')
    @if(isset($profil))
        MODIFICATION D'UN PROFIL
        @php($action = url('/update_profil'))
    @else
        CREATION D'UN PROFIL
        @php($action = url('/add_profil'))
    @endif

@endsection('sous_titre_contenu')

@section('contenu')

    <div class="panel">
        <div class="panel-body">

            <div class=" title-hero">
                <a class="btn btn-border btn-alt border-green btn-link font-green col-md-3" href="{{ url('/parametre/profil/list') }}" title=""> <i class="glyph-icon icon-list"></i> <span>LISTE DES
                        PROFILS</span></a>

                <br><br>
            </div>
            <div class="example-box-wrapper">
                <form method="post" action="{{$action}}" class="form-horizontal bordered-row" id="demo-form" data-parsley-validate accept-charset="UTF-8">
                    @csrf
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">LIBELLE</label>
                                <div class="col-sm-6">
                                    <input type="text" id="libelle" name="libelle" placeholder="Libellé du profil" required class="form-control"
                                    @if(isset($profil))
                                        value="{{isset($profil)? $profil->libelle_profil : old('libelle')}}"
                                    @endif
                                    >
                                </div>
                            </div>

                            <br>
                            <label class="col-md-12 control-label col-md-pull-6">DROITS</label>
                            <br>
                            <hr>

                            <div class="form-group col-md-push-2">
                                <label class="col-sm-4 control-label">Articles</label>
                                <div class="col-sm-8">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="read_article" name="read_article" value="read">
                                        Afficher
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="create_article" name="create_article" value="create">
                                        Créer
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="update_article" name="update_article" value="update">
                                        Modifier
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="delete_article" name="delete_article" value="delete">
                                        Supprimer
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Fournisseurs</label>
                                <div class="col-sm-8">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="read_fournisseur" name="read_fournisseur" value="read">
                                        Afficher
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="create_fournisseur" name="create_fournisseur" value="create">
                                        Créer
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="update_fournisseur" name="update_fournisseur" value="update">
                                        Modifier
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="delete_fournisseur" name="delete_fournisseur" value="delete">
                                        Supprimer
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Commandes</label>
                                <div class="col-sm-8">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="read_commande" name="read_commande" value="read">
                                        Afficher
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="create_commande" name="create_commande" value="create">
                                        Créer
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="update_commande" name="update_commande" value="update">
                                        Modifier
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="delete_commande" name="delete_commande" value="delete">
                                        Supprimer
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Livraisons</label>
                                <div class="col-sm-8">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="read_livraison" name="read_livraison" value="read">
                                        Afficher
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="create_livraison" name="create_livraison" value="create">
                                        Créer
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="update_livraison" name="update_livraison" value="update">
                                        Modifier
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="delete_livraison" name="delete_livraison" value="delete">
                                        Supprimer
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Personnel</label>
                                <div class="col-sm-8">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="read_personnel" name="read_personnel" value="read">
                                        Afficher
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="create_personnel" name="create_personnel" value="create">
                                        Créer
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="update_personnel" name="update_personnel" value="update">
                                        Modifier
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="delete_personnel" name="delete_personnel" value="delete">
                                        Supprimer
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Zones</label>
                                <div class="col-sm-8">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="read_zone" name="read_zone" value="read">
                                        Afficher
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="create_zone" name="create_zone" value="create">
                                        Créer
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="update_zone" name="update_zone" value="update">
                                        Modifier
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="delete_zone" name="delete_zone" value="delete">
                                        Supprimer
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Sites</label>
                                <div class="col-sm-8">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="read_site" name="read_site" value="read">
                                        Afficher
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="create_site" name="create_site" value="create">
                                        Créer
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="update_site" name="update_site" value="update">
                                        Modifier
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="delete_site" name="delete_site" value="delete">
                                        Supprimer
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Clients</label>
                                <div class="col-sm-8">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="read_client" name="read_client" value="read">
                                        Afficher
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="create_client" name="create_client" value="create">
                                        Créer
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="update_client" name="update_client" value="update">
                                        Modifier
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="delete_client" name="delete_client" value="delete">
                                        Supprimer
                                    </label>
                                </div>
                            </div>


                        </div>

                    </div>
                    <div class="bg-default content-box text-center pad20A mrg25T">
                        @if(isset($profil))
                            <input type="hidden" id="id" name="id" value="{{$profil->id_profil}}">
                        @endif
                        <button class="btn btn-lg btn-primary" type="submit">VALIDER</button>
                        <button class="btn btn-lg btn-default" type="reset">ANNULER</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection('contenu')

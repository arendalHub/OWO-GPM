@extends('layouts.parametre')

@section('titre_contenu')
UTILISATEURS 
@endsection('titre_contenu')

@section('sous_titre_contenu')
    @if(isset($utilisateur))
        MODIFICATION D'UN COMPTE D'UTILISATEUR
        @php($action = url('/update_utilisateur'))
    @else
        CREATION D'UN COMPTE D'UTILISATEUR
        @php($action = url('/add_utilisateur'))
    @endif
@endsection('sous_titre_contenu')

@section('contenu')
<div class="panel">
    <div class="panel-body">
        <div class=" title-hero">
            <a class="btn btn-border btn-alt border-green btn-link font-green col-md-3" href="{{ url
                   ('/parametre/utilisateur/list') }}" title=""> <i class="glyph-icon icon-list"></i> <span>LISTE DES
                    UTILISATEURS</span></a>

            <br><br>
        </div>
        <div class="example-box-wrapper">

            <form class="form-horizontal bordered-row" action="{{$action}}" method="post" id="demo-form" data-parsley-validate>
                @csrf
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">NOM</label>
                            <div class="col-sm-6">
                                <input type="text" id="nom" name="nom" required class="form-control"
                                       value="{{isset($utilisateur)? $utilisateur->nom_utilisateur : old('nom') }}"
                                >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">PRENOM</label>
                            <div class="col-sm-6">
                                <input type="text" id="prenom" name="prenom" required class="form-control"
                                       value="{{isset($utilisateur)? $utilisateur->prenom_utilisateur : old('prenom')}}"
                                >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">SERVICE</label>
                            <div class="col-sm-6">
                                <input type="text" id="service" name="service" required class="form-control"
                                       value="{{isset($utilisateur)? $utilisateur->service_utilisateur : old('service')}}"
                                >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">POSTE</label>
                            <div class="col-sm-6">
                                <input type="text" id="poste" name="poste" required class="form-control"
                                       value="{{isset($utilisateur)? $utilisateur->poste_utilisateur : old('poste') }}"
                                >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">NOM D'UTILISATEUR</label>
                            <div class="col-sm-6">
                                <input type="text" id="login" name="login" required class="form-control {{ $errors->has('login') ? 'parsley-error' : '' }}"
                                       value="{{isset($utilisateur)? $utilisateur->login : old('login') }}"
                                       @if(isset($utilisateur))
                                           disabled
                                       @endif
                                >
                                @if($errors->has('login'))
                                    <span class="parsley-error"> Le nom d'utilisateur doit être unique.</span>
                                @endif
                            </div>
                        </div>

                        {{-- <div class="form-group">
                            <label class="col-sm-3 control-label">PROFIL</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="profil" name="profil">
                                    <option>--Choissisez un profil--</option>
                                @foreach($profils as $profil)
                                    {{$selected = ''}}
                                    @if((isset($utilisateur) && ($profil->id_profil == $utilisateur->id_profil)) ||
                                    old('profil') == $profil->id_profil)
                                        {{$selected = 'selected'}}
                                    @endif
                                    <option value="{{$profil->id_profil}}" {{$selected}}>{{$profil->libelle_profil}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div> --}}

                        <div class="form-group">
                            <label class="col-sm-3 control-label">PROFIL</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="profil_temporaire" name="profil_temporaire">
                                    <option value="Stock"
                                            @if((isset($utilisateur) && ($utilisateur->profil_temporaire=="Stock") || old('profil_temporaire')=="Stock"))
                                                selected
                                            @endif
                                    >Stock</option>
                                    <option value="Personnel"
                                            @if((isset($utilisateur) &&($utilisateur->profil_temporaire=="Personnel")
                                            || old('profil_temporaire')=="Personnel"))
                                                selected
                                            @endif
                                    >Personnel</option>
                                    >Stock</option>
                                    <option value="Administrateur"
                                            @if((isset($utilisateur) &&($utilisateur->profil_temporaire=="Administrateur")
                                            || old('profil_temporaire')=="Administrateur"))
                                                selected
                                            @endif
                                    >Administrateur</option>

                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                    <div class="bg-default content-box text-center pad20A mrg25T">
                        @if(isset($utilisateur))
                            <input type="hidden" id="id" name="id" value="{{$utilisateur->id_utilisateur}}">
                        @endif
                        <button class="btn btn-lg btn-primary" type="submit">VALIDER</button>
                        <button class="btn btn-lg btn-default" type="reset">ANNULER</button>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection('contenu')

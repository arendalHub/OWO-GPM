@extends('layouts.personnel')

@section('titre_contenu')
EMPLOYES
@endsection('titre_contenu')

@section('sous_titre_contenu')
@if(isset($employe))
MODIFICATION D'UN EMPLOYE
@php($action = url('/update_employe'))
@else
CREATION D'UN EMPLOYE
@php($action = url('/add_employe'))
@endif
@endsection('sous_titre_contenu')

@section('contenu')

<div class="panel">
    <div class="panel-body">

        <div class=" title-hero">
            <a class="btn btn-border btn-alt border-green btn-link font-green col-md-4" href="{{ url
                ('personnel/employe/list') }}" title=""> <i class="glyph-icon icon-list"></i> <span>LISTE DES
                    EMPLOYES</span></a>

            <br><br>
        </div>
        <div class="example-box-wrapper">
            <form method="post" action="{{$action}}" class="form-horizontal bordered-row" id="demo-form"
                data-parsley-validate accept-charset="UTF-8">
                @csrf
                <div id="form-wizard-4" class="form-wizard">
                    <ul>
                        <li class="active">
                            <a href="#step-1" data-toggle="tab">
                                <label class="wizard-step">1</label>
                                <span class="wizard-description">
                                    Etape 1
                                    <small>Informations générales de l'employé</small>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#step-2" data-toggle="tab">
                                <label class="wizard-step">2</label>
                                <span class="wizard-description">
                                    Etape 2
                                    <small>Informations complémentaires de l'employé</small>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#step-3" data-toggle="tab">
                                <label class="wizard-step">3</label>
                                <span class="wizard-description">
                                    Etape 3
                                    <small>Dossier de l'employé</small>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="step-1">
                            <div class="content-box">
                                <h3 class="content-box-header text-center bg-blue">
                                    Informations générales
                                </h3>
                                <div class="content-box-wrapper">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">* NOM :</label>
                                        <div class="col-sm-6">
                                            <input type="text" id="nom" name="nom" placeholder="Nom de l'employé"
                                                required class="form-control"
                                                value="{{isset($employe)? $employe->nom_employe : old('nom') }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">* PRENOM(S) :</label>
                                        <div class="col-sm-6">
                                            <input type="text" id="prenom" name="prenom"
                                                placeholder="Prénom de l'employé" required class="form-control"
                                                value="{{isset($employe)? $employe->prenom_employe : old('prenom')}}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">* DATE DE NAISSANCE :</label>
                                        <div class="col-sm-6">
                                            <input type="date" id="date_naiss" name="date_naiss"
                                                placeholder="Date de naissance de l'employé" required
                                                class="form-control"
                                                value="{{isset($employe)? $employe->date_naiss_employe : old('date_naiss')}}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">* LIEU DE NAISSANCE :</label>
                                        <div class="col-sm-6">
                                            <input type="text" id="lieu_naiss" name="lieu_naiss"
                                                placeholder="Lieu de naissance de l'employé" required
                                                class="form-control" value="{{isset($employe)? $employe->lieu_naiss_employe : old
                                                       ('lieu_naiss')}}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">* SEXE :</label>
                                        <div class="col-sm-6">
                                            <label class="radio-inline">
                                                <input type="radio" id="sexe" name="sexe" required value="M"
                                                    @if((isset($employe) && $employe->sexe_employe=="M") ||
                                                old('sexe')=="M")
                                                checked
                                                @endif
                                                >
                                                Masculin
                                                :</label>
                                            <label class="radio-inline">
                                                <input type="radio" id="sexe" name="sexe" required value="F"
                                                    @if((isset($employe) && $employe->sexe_employe=="F") ||
                                                old('sexe')=="F")
                                                checked
                                                @endif
                                                >
                                                Féminin
                                                :</label>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">* TELEPHONE :</label>
                                        <div class="col-sm-6">
                                            <input type="text" id="num_tel" name="num_tel"
                                                placeholder="Téléphone de l'employé" required
                                                class="input-mask form-control" data-inputmask="'mask':' 99-99-99-99'"
                                                value="{{isset($employe)? $employe->num_tel_employe : old
                                                       ('num_tel')}}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">* ADRESSE :</label>
                                        <div class="col-sm-6">
                                            <textarea name="adresse" id="adresse"
                                                class="form-control">{{isset($employe)? $employe->adresse_employe : old('adresse')}}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">* TELEPHONE URGENCE :</label>
                                        <div class="col-sm-6">
                                            <input type="text" id="num_tel_urgence" name="num_tel_urgence"
                                                placeholder="Telephone d'urgence" required
                                                class="input-mask form-control" data-inputmask="'mask':' 99-99-99-99'"
                                                value="{{isset($employe)? $employe->num_tel_employe : old
                                                       ('num_tel')}}">
                                        </div>
                                    </div>

                                    <div class="bg-default content-box text-center pad20A mrg25T">
                                        <a href="#step-2" data-toggle="tab" class="btn btn-md btn-blue-alt pull-right"
                                            type="submit"><i class="glyph-icon icon-arrow-right"></i> </a> <br> <br>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="step-2">
                            <div class="content-box">
                                <h3 class="content-box-header text-center bg-blue-alt">
                                    Informations complémentaires
                                </h3>
                                <div class="content-box-wrapper">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">PÈRE :</label>
                                        <div class="col-sm-6">
                                            <input type="text" id="pere" name="pere" placeholder="Père de l'employé"
                                                class="form-control"
                                                value="{{isset($employe)? $employe->pere_employe : old('pere')}}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">MÈRE :</label>
                                        <div class="col-sm-6">
                                            <input type="text" id="mere" name="mere" placeholder="Mère de l'employé"
                                                class="form-control"
                                                value="{{isset($employe)? $employe->mere_employe : old('mere')}}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">* SITUATION MATRIMONIALE :</label>
                                        <div class="col-sm-6">
                                            <select class="form-control" id="situation_mat" name="situation_mat"
                                                required>
                                                <option value="Celibataire" @if((isset($employe) && $employe->
                                                    situation_mat_employe=="Celibataire") || old('situation_mat')=="Celibataire")
                                                    selected
                                                    @endif
                                                    >Célibataire</option>
                                                <option value="Marie" @if((isset($employe) && $employe->
                                                    situation_mat_employe=="Marie") || old('situation_mat')=="Marie")
                                                    selected
                                                    @endif
                                                    >Marié(e)</option>
                                                <option value="Veuf" @if((isset($employe) && $employe->
                                                    situation_mat_employe=="Veuf") || old('situation_mat')=="Veuf")
                                                    selected
                                                    @endif
                                                    >Veuf(ve)</option>
                                                <option value="Divorce" @if((isset($employe) && $employe->
                                                    situation_mat_employe=="Divorce") || old('situation_mat')=="Divorce")
                                                    selected
                                                    @endif
                                                    >Divorcé(e)</option>

                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">* NOMBRE D'ENFANTS :</label>
                                        <div class="col-sm-6">
                                            <input min=0 type="number" id="nb_enfant" name="nb_enfant"
                                                placeholder="Nombre d'enfants" required class="form-control" value="{{isset($employe)? $employe->nb_enfant_employe : old
                                                       ('nb_enfant')}}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">* TYPE PIECE D'IDENTITE :</label>
                                        <div class="col-sm-6">
                                            <select class="form-control" id="type_piece" name="type_piece" required>
                                                <option value="CNI" @if((isset($employe) && $employe->
                                                    type_piece_employe=="CNI") || old('type_piece')=="CNI")
                                                    selected
                                                    @endif
                                                    >CNI</option>
                                                <option value="Carte electeur" @if((isset($employe) && $employe->
                                                    type_piece_employe=="Carte electeur")
                                                    || old('type_piece')=="Carte electeur")
                                                    selected
                                                    @endif
                                                    >Carte d'électeur</option>
                                                <option value="Permis de conduire" @if((isset($employe) && $employe->
                                                    type_piece_employe=="Permis de conduire") ||
                                                    old('type_piece')=="Permis de conduire")
                                                    selected
                                                    @endif
                                                    >Permis de conduire</option>
                                                <option value="Passport" @if((isset($employe) && $employe->
                                                    type_piece_employe=="Passport") || old('type_piece')=="Passport")
                                                    selected
                                                    @endif
                                                    >Passport</option>

                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">* N° PIECE D'IDENTITE :</label>
                                        <div class="col-sm-6">
                                            <input type="text" id="num_piece" name="num_piece"
                                                placeholder="Numéro de la piece d'identité" required
                                                class="form-control" value="{{isset($employe)? $employe->num_piece_employe : old
                                                       ('num_piece')}}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">* NIVEAU D'ETUDES :</label>
                                        <div class="col-sm-6">
                                            <input type="text" id="niveau_etudes" name="niveau_etudes"
                                                placeholder="Niveau d'études de l'employé" required class="form-control"
                                                value="{{isset($employe)? $employe->niveau_etudes_employe : old('niveau_etudes')}}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">* DATE ENTRÉE :</label>
                                        <div class="col-sm-6">
                                            <input type="date" id="date_entree" name="date_entree"
                                                placeholder="Date d'entrée" required class="form-control"
                                                value="{{isset($employe)? $employe->date_entree_employe : old('date_entree')}}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">DATE DE DEPART :</label>
                                        <div class="col-sm-6">
                                            <input type="date" id="date_depart" name="date_depart"
                                                placeholder="Date de départ" class="form-control"
                                                value="{{isset($employe)? $employe->date_depart_employe : old('date_depart')}}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">N° CNSS :</label>
                                        <div class="col-sm-6">
                                            <input type="text" id="num_cnss" name="num_cnss" placeholder="N° CNSS"
                                                class="form-control"
                                                value="{{isset($employe)? $employe->num_cnss_employe : old('num_cnss')}}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">* TYPE CONTRAT :</label>
                                        <div class="col-sm-6">
                                            <select class="form-control" id="contrat" name="contrat" required>
                                                <option value="Prestation de sercices" @if((isset($employe) &&
                                                    $employe->contrat_employe=="Prestation de sercices") ||
                                                    old('contrat')=="Prestation de sercices")
                                                    selected
                                                    @endif
                                                    >Prestation de sercices</option>
                                                <option value="CDD" @if((isset($employe) && $employe->
                                                    contrat_employe=="CDD")
                                                    || old('contrat')=="CDD")
                                                    selected
                                                    @endif
                                                    >CDD</option>
                                                <option value="CDI" @if((isset($employe) && $employe->
                                                    contrat_employe=="CDI") || old('contrat')=="CDI")
                                                    selected
                                                    @endif
                                                    >CDI</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="bg-default content-box pad20A mrg25T">
                                        <a href="#step-1" data-toggle="tab" class="btn btn-md btn-blue-alt pull-left"
                                            type="submit"><i class="glyph-icon icon-arrow-left"></i> </a>
                                        <a href="#step-3" data-toggle="tab" class="btn btn-md btn-blue-alt pull-right"
                                            type="submit"><i class="glyph-icon icon-arrow-right"></i> </a> <br><br>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="step-3">
                            <div class="content-box">
                                <h3 class="content-box-header text-center bg-green">
                                    Dossier
                                </h3>
                                <div class="content-box-wrapper">

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">PHOTO :</label>
                                        <div class="col-sm-6">
                                            <input type="file" disabled class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">NAISSANCE :</label>
                                        <div class="col-sm-6">
                                            <input type="file" disabled class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">NATIONNALITE :</label>
                                        <div class="col-sm-6">
                                            <input type="file" disabled class="form-control" id="">
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">CNI :</label>
                                        <div class="col-sm-6">
                                            <input type="file" disabled class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">PASSPORT :</label>
                                        <div class="col-sm-6">
                                            <input type="file" disabled class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">DIPLOME N°1 :</label>
                                        <div class="col-sm-6">
                                            <input type="file" disabled class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">DIPLOME N°2 :</label>
                                        <div class="col-sm-6">
                                            <input type="file" disabled class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">DIPLOME N°3 :</label>
                                        <div class="col-sm-6">
                                            <input type="file" disabled class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">ATTESTATION N°1 :</label>
                                        <div class="col-sm-6">
                                            <input type="file" disabled class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">ATTESTATION N°2 :</label>
                                        <div class="col-sm-6">
                                            <input type="file" disabled class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">ATTESTATION N°3 :</label>
                                        <div class="col-sm-6">
                                            <input type="file" disabled class="form-control" id="">
                                        </div>
                                    </div>

                                    <div class="bg-default content-box pad20A mrg25T">
                                        <div class="col-md-1">
                                            <a href="#step-2" data-toggle="tab"
                                                class="btn btn-md btn-blue-alt pull-left" type="submit"><i
                                                    class="glyph-icon icon-arrow-left"></i> </a>
                                        </div>
                                        {{-- </div> --}}

                                        {{-- <div class="bg-default content-box text-center pad20A mrg25T"> --}}
                                        <div class="col-md-11 text-center">
                                            @if(isset($employe))
                                            <input type="hidden" id="id" name="id" value="{{$employe->id_employe}}">
                                            @endif
                                            <button class="btn btn-lg btn-primary" type="submit">VALIDER</button>
                                            <button class="btn btn-lg btn-default" type="reset">ANNULER</button>
                                        </div>
                                        <br> <br>
                                    </div>

                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection('contenu')

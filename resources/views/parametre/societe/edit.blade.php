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
                <a class="btn btn-border btn-alt border-green btn-link font-green col-md-3" href="{{ url
                ('personnel/employe/list') }}" title=""> <i class="glyph-icon icon-list"></i> <span>LISTE DES EMPLOYES</span></a>

                <br><br>
            </div>
            <div class="example-box-wrapper">
                <form method="post" action="{{$action}}" class="form-horizontal bordered-row" id="demo-form" data-parsley-validate accept-charset="UTF-8">
                    @csrf
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">NOM</label>
                                <div class="col-sm-6">
                                    <input type="text" id="nom" name="nom" placeholder="Nom de l'employé"
                                           required class="form-control"
                                           @if(isset($employe))
                                           value="{{old('nom',$employe->nom_employe)}}"
                                            @endif
                                    >
                                </div>
                            </div>

                        </div>
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">PRENOM(S)</label>
                                <div class="col-sm-6">
                                    <input type="text" id="prenom" name="prenom" placeholder="Nom de l'employé"
                                           required class="form-control"
                                           @if(isset($employe))
                                           value="{{old('prenom',$employe->prenom_employe)}}"
                                            @endif
                                    >
                                </div>
                            </div>

                        </div>
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">DATE DE NAISSANCE</label>
                                <div class="col-sm-6">
                                    <input type="date" id="date_naiss" name="date_naiss" placeholder="Date de naissance de l'employé"
                                           required class="form-control"
                                           @if(isset($employe))
                                           value="{{old('date_naiss',$employe->date_naiss_employe)}}"
                                           @endif
                                    >
                                </div>
                            </div>

                        </div>
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">LIEU DE NAISSANCE</label>
                                <div class="col-sm-6">
                                    <input type="text" id="lieu_naiss" name="lieu_naiss" placeholder="Lieu de naissance de l'employé"
                                           required class="form-control"
                                           @if(isset($employe))
                                           value="{{old('lieu_naiss',$employe->lieu_naiss_employe)}}"
                                            @endif
                                    >
                                </div>
                            </div>

                        </div>
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">SEXE</label>
                                <div class="col-sm-6">
                                    <label class="radio-inline">
                                        <input type="radio" id="sexe" name="sexe" value="M"
                                               @if(isset($employe) && $employe->sexe_employe=="M")
                                               checked
                                                @endif
                                        >
                                        Masculin
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" id="sexe" name="sexe" value="F"
                                               @if(isset($employe) && $employe->sexe_employe=="M")
                                               checked
                                                @endif
                                        >
                                        Féminin
                                    </label>

                                </div>
                            </div>

                        </div>
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">TELEPHONE</label>
                                <div class="col-sm-6">
                                    <input type="number" id="num_tel" name="num_tel" placeholder="Téléphone de l'employé"
                                           required class="form-control"
                                           @if(isset($employe))
                                           value="{{old('num_tel',$employe->num_tel_employe)}}"
                                            @endif
                                    >
                                </div>
                            </div>

                        </div>
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">ADRESSE</label>
                                <div class="col-sm-6">
                                    <input type="text" id="adresse" name="adresse" placeholder="Adresse de l'employé"
                                           required class="form-control"
                                           @if(isset($employe))
                                           value="{{old('adresse',$employe->adresse_employe)}}"
                                            @endif
                                    >
                                </div>
                            </div>

                        </div>
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">PÈRE</label>
                                <div class="col-sm-6">
                                    <input type="text" id="pere" name="pere" placeholder="Père de l'employé" required class="form-control"
                                           @if(isset($employe))
                                           value="{{old('pere',$employe->pere_employe)}}"
                                           @endif
                                    >
                                </div>
                            </div>

                        </div>
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">MÈRE</label>
                                <div class="col-sm-6">
                                    <input type="text" id="mere" name="mere" placeholder="Mère de l'employé"
                                           required class="form-control"
                                           @if(isset($employe))
                                           value="{{old('mere',$employe->mere_employe)}}"
                                            @endif
                                    >
                                </div>
                            </div>

                        </div>
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">TELEPHONE URGENCE</label>
                                <div class="col-sm-6">
                                    <input type="number" id="num_tel_urgence" name="num_tel_urgence"
                                           placeholder="Telephone d'urgence"
                                           required class="form-control"
                                           @if(isset($employe))
                                           value="{{old('num_tel_urgence',$employe->num_tel_urgence_employe)}}"
                                            @endif
                                    >
                                </div>
                            </div>

                        </div>
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">SITUATION MATRIMONIALE</label>
                                <div class="col-sm-6">
                                    <input type="text" id="situation_mat" name="situation_mat" placeholder="Situation
                                     matrimoniale"
                                           required class="form-control"
                                           @if(isset($employe))
                                           value="{{old('situation_mat',$employe->situation_mat_employe)}}"
                                            @endif
                                    >
                                </div>
                            </div>

                        </div>
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">NOMBRE D'ENFANTS</label>
                                <div class="col-sm-6">
                                    <input type="number" id="nb_enfant" name="nb_enfant" placeholder="Nombre
                                    d'enfants"
                                           required class="form-control"
                                           @if(isset($employe))
                                           value="{{old('nb_enfant',$employe->nb_enfant_employe)}}"
                                            @endif
                                    >
                                </div>
                            </div>

                        </div>
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">N° IDENTITÉ</label>
                                <div class="col-sm-6">
                                    <input type="number" id="num_identite" name="num_identite" placeholder="Numéro d'identité"
                                           required class="form-control"
                                           @if(isset($employe))
                                           value="{{old('num_identite',$employe->num_identite_employe)}}"
                                            @endif
                                    >
                                </div>
                            </div>

                        </div>
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">DATE ENTRÉE</label>
                                <div class="col-sm-6">
                                    <input type="date" id="date_entree" name="date_entree" placeholder="Date d'entrée"
                                           required class="form-control"
                                           @if(isset($employe))
                                           value="{{old('date_entree',$employe->date_entree_employe)}}"
                                            @endif
                                    >
                                </div>
                            </div>

                        </div>
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">N° CNSS</label>
                                <div class="col-sm-6">
                                    <input type="text" id="num_cnss" name="num_cnss" placeholder="N° CNSS"
                                           required class="form-control"
                                           @if(isset($employe))
                                           value="{{old('num_cnss',$employe->num_cnss_employe)}}"
                                            @endif
                                    >
                                </div>
                            </div>

                        </div>
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">TYPE CONTRAT</label>
                                <div class="col-sm-6">
                                    <input type="text" id="contrat" name="contrat" placeholder="Type de
                                    contrat"
                                           required class="form-control"
                                           @if(isset($employe))
                                           value="{{old('contrat',$employe->contrat_employe)}}"
                                            @endif
                                    >
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="bg-default content-box text-center pad20A mrg25T">
                        @if(isset($employe))
                            <input type="hidden" id="id" name="id" value="{{$employe->id_employe}}">
                        @endif
                        <button class="btn btn-lg btn-primary" type="submit">VALIDER</button>
                        <button class="btn btn-lg btn-default" type="reset">ANNULER</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection('contenu')

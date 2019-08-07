@extends('layouts.parametre')

@section('titre_contenu')
    SOCIETE
@endsection('titre_contenu')

@section('sous_titre_contenu')
    @php($disabled = '')
    @if(isset($societe))
        @if(isset($todo))
            EDITION DES INFORMATIONS DE LA SOCIETE
        @else
            INFORMATIONS DE LA SOCIETE
            @php($disabled = 'disabled')
        @endif
    @else
        AJOUT DES INFORMATIONS DE LA SOCIETE
    @endif
@endsection('sous_titre_contenu')

@section('contenu')

    <div class="panel">
        <div class="panel-body">

            @if(!isset($todo))
                <div class=" title-hero">
                    <a class="btn btn-border btn-alt border-green btn-link font-green col-md-2" href="{{ url
                ('parametre/societe/edit/1') }}" title=""> <i class="glyph-icon icon-edit"></i>
                        <span>EDITER</span></a>

                    <br><br>

                </div>
            @endif
            <div class="example-box-wrapper">
                <form method="post" action="/edit_societe" class="form-horizontal bordered-row" id="demo-form" data-parsley-validate accept-charset="UTF-8">
                    @csrf
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">RAISON SOCIALE</label>
                                <div class="col-sm-6">
                                    <input type="text" id="raison_sociale" name="raison_sociale" placeholder="Raison sociale de la societe"
                                           required class="form-control" {{$disabled}}
                                           value="{{isset($societe)? $societe->raison_sociale_societe : old('raison_sociale')}}"
                                    >
                                </div>
                            </div>

                        </div>
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">ACTIVITE(S)</label>
                                <div class="col-sm-6">
                                    <textarea name="activites" id="activites" class="form-control" {{$disabled}}>{{isset($societe)? $societe->activites_societe : old('activites')}}</textarea>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">ADRESSE</label>
                                <div class="col-sm-6">
                                    <textarea name="adresse" id="adresse" class="form-control" {{$disabled}}>{{isset
                                    ($societe)? $societe->adresse_societe : old('adresse')}}</textarea>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">

                                <label class="col-sm-3 control-label">BP</label>
                                <div class="col-sm-6">
                                    <input type="text" id="bp" name="bp" placeholder="Boite Postale de la societe"
                                           required class="form-control" {{$disabled}}
                                           value="{{isset($societe)? $societe->bp_societe : old('bp')}}"
                                    >
                                </div>
                            </div>

                        </div>
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">TELEPHONE 1</label>
                                <div class="col-sm-6">
                                    <input type="text" id="telephone1" name="telephone1" placeholder="Téléphone N°1 de la societe"
                                           required class="form-control" {{$disabled}}
                                           value="{{isset($societe)? $societe->telephone1_societe : old('telephone1')}}"
                                    >
                                </div>
                            </div>

                        </div>
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">TELEPHONE 2</label>
                                <div class="col-sm-6">
                                    <input type="text" id="telephone2" name="telephone2" placeholder="Téléphone N°2 de la societe"
                                           required class="form-control" {{$disabled}}
                                           value="{{isset($societe)? $societe->telephone2_societe : old('telephone2')}}"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">NIF</label>
                                <div class="col-sm-6">
                                    <input type="text" id="nif" name="nif" placeholder="NIF de la societe"
                                           required class="form-control" {{$disabled}}
                                           value="{{isset($societe)? $societe->nif_societe : old('nif')}}"
                                    >
                                </div>
                            </div>

                        </div>
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">NUMERO CFE</label>
                                <div class="col-sm-6">
                                    <input type="text" id="num_cfe" name="num_cfe"
                                           placeholder="N° CFE"
                                           required class="form-control" {{$disabled}}
                                           value="{{isset($societe)? $societe->num_cfe_societe : old('num_cfe')}}"
                                    >
                                </div>
                            </div>

                        </div>
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">EMAIL</label>
                                <div class="col-sm-6">
                                    <input type="email" id="email" name="email" placeholder="Email de la societe"
                                           required class="form-control" {{$disabled}}
                                           value="{{isset($societe)? $societe->email_societe : old('email')}}"
                                    >
                                </div>
                            </div>

                        </div>
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">SITE WEB</label>
                                <div class="col-sm-6">
                                    <input type="text" id="site_web" name="site_web" placeholder="Site web de la societe"
                                           required class="form-control" {{$disabled}}
                                           value="{{isset($societe)? $societe->site_web_societe : old('site_web')}}"
                                    >
                                </div>
                            </div>

                        </div>
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">AUTRES INFORMATIONS</label>
                                <div class="col-sm-6">
                                    <textarea name="autres_infos" id="autres_infos" class="form-control"
                                            {{$disabled}}>{{isset($societe)? $societe->autres_infos_societe : old('autres_infos')}}</textarea>
                                </div>
                            </div>

                        </div>

                    </div>
                    @if(isset($todo))
                        <div class="bg-default content-box text-center pad20A mrg25T">
                            @if(isset($societe))
                                <input type="hidden" id="id" name="id" value="{{$societe->id_societe}}">
                            @endif
                            <button class="btn btn-lg btn-primary" type="submit">VALIDER</button>
{{--                            <button class="btn btn-lg btn-default" type="reset">ANNULER</button>--}}
                            <a href="{{url('/parametre/societe')}}" class="btn btn-lg btn-default" >ANNULER</a>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection('contenu')

@extends('layouts.parametre')

@section('titre_contenu')
UTILISATEURS 
@endsection('titre_contenu')

@section('sous_titre_contenu')
    {{$action = url('/add_utilisateur')}}

    {{$sous_titre = 'CREATION D\'UN COMPTE D\'UTILISATEUR'}}
    @if(isset($utilisateur))
        {{$sous_titre = 'MODIFICATION D\'UN COMPTE D\'UTILISATEUR'}}
        {{$action = url('/update_utilisateur')}}
    @endif
@endsection('sous_titre_contenu')

@section('contenu_page')
<div class="panel">
    <div class="panel-body">
        <div class=" title-hero">
            <a class="btn btn-border btn-alt border-green btn-link font-green col-md-3" href="{{ url
                   ('/parametre/utilisateur/list') }}" title=""> <i class="glyph-icon icon-list"></i> <span>LISTE DES
                    UTILISATEURS</span></a>
            <h3 class="col-md-9 col-md-push-4">
                {{$sous_titre}}
            </h3>
            <br><br>
        </div>
        <div class="example-box-wrapper">
            <form class="form-horizontal bordered-row" action="{{$action}}" method="post" id="demo-form"
                  data-parsley-validate>
                @csrf
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">

                        <div class="form-group">
                            <label class="col-sm-3 control-label">NOM D'UTILISATEUR</label>
                            <div class="col-sm-6">
                                <input type="text" id="login" name="login" required class="form-control"
                                       @if(isset($utilisateur))
                                           value="{{$utilisateur->login_utilisateur}}"
                                       @endif
                                >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">PROFIL</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="profil" name="profil">
                                    <option>--Choissisez un profil--</option>
                                @foreach($profils as $profil)
                                    {{$selected = ''}}
                                    @if(isset($utilisateur) && ($profil->id_profil == $utilisateur->id_profil))
                                        {{$selected = 'selected'}}
                                    @endif
                                    <option value="{{$profil->id_profil}}" {{$selected}}>{{$profil->libelle_profil}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

{{--                        <div class="form-group">--}}
{{--                            <label class="col-sm-3 control-label">MOT DE PASSE</label>--}}
{{--                            <div class="col-sm-6">--}}
{{--                                <input type="text" id="ps1" required class="form-control">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label class="col-sm-3 control-label">CONFIRMER MOT DE PASSE</label>--}}
{{--                            <div class="col-sm-6">--}}
{{--                                <input type="text" data-parsley-equalto="#ps1" required class="form-control">--}}
{{--                            </div>--}}
{{--                        </div>--}}
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
@endsection('contenu_page')

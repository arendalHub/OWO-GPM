@extends('layouts.personnel')

@section('titre_contenu')
    SITES
@endsection('titre_contenu')

@section('sous_titre_contenu')
    {{$sous_titre = 'CREATION DE SITE'}}
    {{$action = url('/add_site')}}
    @if(isset($site))
        {{$sous_titre = 'MODIFICATION DE SITE'}}
        {{$action = url('/update_site')}}
    @endif
@endsection('sous_titre_contenu')

@section('contenu_page')

    <div class="panel">
        <div class="panel-body">

            <div class=" title-hero">
                <a class="btn btn-border btn-alt border-green btn-link font-green col-md-3" href="{{ url
                ('personnel/site/list') }}" title=""> <i class="glyph-icon icon-list"></i> <span>LISTE DES SITES</span></a>
                <h3 class="col-md-9 col-md-push-5">
                    {{$sous_titre}}
                </h3>
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
                                    <input type="text" id="nom" name="nom" placeholder="Nom du site"
                                           required class="form-control"
                                    @if(isset($site))
                                        value="{{old('nom',$site->nom_site)}}"
                                    @endif
                                    >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">ADRESSE</label>
                                <div class="col-sm-6">
                                    <input type="text" id="adresse" name="adresse" placeholder="Adresse du site"
                                           required class="form-control"
                                    @if(isset($site))
                                        value="{{old('nom',$site->adresse_site)}}"
                                    @endif
                                    >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">DATE DEBUT TRAVAUX</label>
                                <div class="col-sm-6">
                                    <input type="date" id="date_debut_travaux" name="date_debut_travaux" placeholder="Nom du site" required class="form-control"
                                    @if(isset($site))
                                        value="{{old('date_debut_travaux',$site->date_debut_travaux_site)}}"
                                    @endif
                                    >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">DATE FIN TRAVAUX</label>
                                <div class="col-sm-6">
                                    <input type="date" id="date_fin_travaux" name="date_fin_travaux" placeholder="Nom
                                     du site" required class="form-control"
                                    @if(isset($site))
                                        value="{{old('date_fin_travaux',$site->date_fin_travaux_site)}}"
                                    @endif
                                    >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">DUREE</label>
                                <div class="col-sm-6">
                                    <input type="text" id="duree_travaux" name="duree_travaux" placeholder="Durée des
                                     travaux"
                                           required class="form-control"
                                    @if(isset($site))
                                        value="{{old('duree_travaux',$site->duree_travaux_site)}}"
                                    @endif
                                    >
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-3 control-label">SECTION</label>
                                <div class="col-sm-6">
                                    <select class="form-control" id="section" name="section">
                                        <option>--Choissisez une section--</option>
                                        @foreach($sections as $section)
                                            {{$selected = ''}}
                                            @if(isset($section) && ($section->id_section == $section->id_section))
                                                {{$selected = 'selected'}}
                                            @endif
                                            <option value="{{$section->id_section}}"
                                                    {{$selected}}>{{$section->nom_section}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="bg-default content-box text-center pad20A mrg25T">
                        @if(isset($site))
                            <input type="hidden" id="id" name="id" value="{{$site->id_site}}">
                        @endif
                        <button class="btn btn-lg btn-primary" type="submit">VALIDER</button>
                        <button class="btn btn-lg btn-default" type="reset">ANNULER</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection('contenu_page')

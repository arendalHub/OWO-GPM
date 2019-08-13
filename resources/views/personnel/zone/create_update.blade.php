@extends('layouts.personnel')

@section('titre_contenu')
    ZONES
@endsection('titre_contenu')

@section('sous_titre_contenu')
    @if(isset($zone))
        MODIFICATION D'UNE ZONE
        @php($action = url('/update_zone'))
    @else
        CREATION D'UNE ZONE
        @php($action = url('/add_zone'))
    @endif
@endsection('sous_titre_contenu')

@section('contenu')

    <div class="panel">
        <div class="panel-body">

            <div class=" title-hero">
                <a class="btn btn-border btn-alt border-green btn-link font-green col-md-3" href="{{ url('personnel/zone/list') }}" title=""> <i class="glyph-icon icon-list"></i> <span>LISTE DES ZONES</span></a>
                <br><br>
            </div>
            <div class="example-box-wrapper">
                <form method="post" action="{{$action}}" class="form-horizontal bordered-row" id="demo-form" data-parsley-validate accept-charset="UTF-8">
                    @csrf
                    <div class="row">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">NOM</label>
                                <div class="col-sm-6">
                                    <input type="text" id="nom_zone" name="nom_zone" placeholder="Nom de la zone"
                                           required class="form-control {{ $errors->has('nom_zone') ? 'parsley-error' : '' }}"
                                        value="{{isset($zone)? $zone->nom_zone : old('nom_zone')}}"
                                    >
                                    @if($errors->has('nom_zone'))
                                        <span class="parsley-error"> Le nom de la zone doit être unique.</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">SITUATION GEOGRAPHIQUE</label>
                                <div class="col-sm-6">
                                    <input type="text" id="situation_geo_zone" name="situation_geo_zone" placeholder="Situation géographique de la zone"
                                           required class="form-control"
                                           value="{{isset($zone)? $zone->situation_geo_zone : old('situation_geo_zone')}}"
                                    >
                                </div>
                            </div>


                    </div>
                    <div class="bg-default content-box text-center pad20A mrg25T">
                        @if(isset($zone))
                            <input type="hidden" id="id" name="id" value="{{$zone->id_zone}}">
                        @endif
                        <button class="btn btn-lg btn-primary" type="submit">VALIDER</button>
                        <button class="btn btn-lg btn-default" type="reset">ANNULER</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection('contenu')

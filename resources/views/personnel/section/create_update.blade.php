@extends('layouts.personnel')

@section('titre_contenu')
    SECTIONS
@endsection('titre_contenu')

@section('sous_titre_contenu')
    {{$sous_titre = 'CREATION DE SECTION'}}
    {{$action = url('/add_section')}}
    @if(isset($section))
        {{$sous_titre = 'MODIFICATION DE SECTION'}}
        {{$action = url('/update_section')}}
    @endif
@endsection('sous_titre_contenu')

@section('contenu_page')

    <div class="panel">
        <div class="panel-body">

            <div class=" title-hero">
                <a class="btn btn-border btn-alt border-green btn-link font-green col-md-3" href="{{ url
                ('/zone/section/list') }}" title=""> <i class="glyph-icon icon-list"></i> <span>LISTE DES SECTIONS</span></a>
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
                                    <input type="text" id="nom" name="nom" placeholder="Nom de la section"
                                           required class="form-control"
                                           @if(isset($section))
                                           value="{{old('nom',$section->nom_section)}}"
                                            @endif
                                    >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">ZONE</label>
                                <div class="col-sm-6">
                                    <select class="form-control" id="zone" name="zone">
                                        <option>--Choissisez une zone--</option>
                                        @foreach($zones as $zone)
                                            @if(isset($section) && ($zone->id_zone == $section->id_zone))
                                                {{$selected = 'selected'}}
                                            @endif
                                            <option value="{{$zone->id_zone}}" {{$selected}}>{{$zone->libelle_zone}}</option>
                                        @endforeach
                                    </select>
                                </div>




                            </div>

                        </div>
                        <div class="bg-default content-box text-center pad20A mrg25T">
                            @if(isset($section))
                                <input type="hidden" id="id" name="id" value="{{$section->id_section}}">
                            @endif
                            <button class="btn btn-lg btn-primary" type="submit">VALIDER</button>
                            <button class="btn btn-lg btn-default" type="reset">ANNULER</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection('contenu_page')

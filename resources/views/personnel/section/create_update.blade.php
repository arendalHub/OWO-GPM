@extends('layouts.personnel')

@section('titre_contenu')
    SECTIONS
@endsection('titre_contenu')

@section('sous_titre_contenu')
    @if(isset($section))
        MODIFICATION D'UNE SECTION
        @php($action = url('/update_section'))
    @else
        CREATION D'UNE SECTION
        @php($action = url('/add_section'))
    @endif

@endsection('sous_titre_contenu')

@section('contenu')

    <div class="panel">
        <div class="panel-body">

            <div class=" title-hero">
                <a class="btn btn-border btn-alt border-green btn-link font-green col-md-3" href="{{ url
                ('/personnel/section/list') }}" title=""> <i class="glyph-icon icon-list"></i> <span>LISTE DES SECTIONS</span></a>
                <br><br>
            </div>
            <form method="post" action="{{$action}}" class="form-horizontal bordered-row" id="demo-form" data-parsley-validate accept-charset="UTF-8">
                @csrf
                <div class="row">
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="nom_section">NOM</label>
                        <div class="col-sm-6">
                            <input type="text" id="nom_section" name="nom_section" placeholder="Nom de la section"
                                   required class="form-control {{ $errors->has('nom_section') ? 'parsley-error' : '' }}"
                                   value="{{isset($section)? $section->nom_section : old('nom_section')}}"
                            >
                            @if($errors->has('nom_section'))
                                <span class="parsley-error"> Le nom de la section doit être unique.</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">ZONE</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="zone" name="zone">
                                @foreach($zones as $zone)
                                    {{$selected = ''}}
                                    @if((isset($section) && ($zone->id_zone == $section->id_zone)) || old('zone')
                                    ==$zone->id_zone)
                                        {{$selected = 'selected'}}
                                    @endif
                                    <option value="{{$zone->id_zone}}" {{$selected}}>{{$zone->nom_zone}}</option>
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
@endsection('contenu')

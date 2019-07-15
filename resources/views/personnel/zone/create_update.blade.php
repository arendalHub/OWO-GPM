@extends('layouts.personnel')

@section('titre_contenu')
    ZONES
@endsection('titre_contenu')

@section('sous_titre_contenu')
    {{$sous_titre = 'CREATION DE ZONE'}}
    {{$action = url('/add_zone')}}
    @if(isset($zone))
        {{$sous_titre = 'MODIFICATION DE ZONE'}}
        {{$action = url('/update_zone')}}
    @endif
@endsection('sous_titre_contenu')

@section('contenu_page')

    <div class="panel">
        <div class="panel-body">

            <div class=" title-hero">
                <a class="btn btn-border btn-alt border-green btn-link font-green col-md-3" href="{{ url
                ('personnel/zone/list') }}" title=""><span>LISTE DES ZONES</span></a>
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
                                <label class="col-sm-3 control-label">LIBELLE</label>
                                <div class="col-sm-6">
                                    <input type="text" id="libelle" name="libelle" placeholder="Libellé du zone"
                                           required class="form-control"
                                    @if(isset($zone))
                                        value="{{old('libelle',$zone->libelle_zone)}}"
                                    @endif
                                    >
                                </div>
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
@endsection('contenu_page')

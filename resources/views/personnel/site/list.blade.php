@extends('layouts.personnel')

@section('titre_contenu')
    SITES
@endsection('titre_contenu')

@section('sous_titre_contenu')
    LISTE DES SITES
    @if (Session::has('message'))
        <div class="alert alert-close alert-success col-md-8 col-md-offset-2">
            <a href="#" title="Close" class="glyph-icon alert-close-btn icon-remove"></a>
            <div class="bg-green alert-icon">
                <i class="glyph-icon icon-check"></i>
            </div>
            <div class="alert-content text-center">
                <h4 class="alert-title">{{Session::get('message')}}</h4>
                {{-- <p></p> --}}
                <p></p>
            </div>
        </div> <br>
    @endif
@endsection('sous_titre_contenu')

@section('contenu')

    <div class="panel">
        <div class="panel-body">
            <div class=" title-hero">
                <a class="btn btn-border btn-alt border-green btn-link font-green col-md-2" href="{{ url
                ('personnel/site/create_update') }}" title=""> <i class="glyph-icon icon-plus"></i> <span>NOUVEAU SITE</span></a>

                <br><br>
            </div>
            <div class="example-box-wrapper">

                <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOM</th>
                        <th>ADRESSE</th>
                        <th>COORDONNES GPS</th>
                        <th>DATE DEBUT TRAVAUX</th>
                        <th>DATE FIN TRAVAUX</th>
                        <th>DUREE</th>
                        <th>SECTION</th>
                        <th>ZONE</th>
                        <th>ACTIONS</th>
                    </tr>
                    </thead>
                <tbody>

                    @foreach($sites as $site)
                        <tr class="odd gradeX">
                            <td>{{$site->id_site}}</td>
                            <td>{{$site->nom_site}}</td>
                            <td>{{$site->adresse_site}}</td>
                            <td>{{$site->longitude_site.', '.$site->lattitude_site}}</td>
                            <td>{{$site->date_debut_travaux_site}}</td>
                            <td>{{$site->date_fin_travaux_site}}</td>
                            <td>{{$site->duree_travaux_site}}</td>
                            <td>
                                @foreach($sections as $section)
                                    {{$site->id_section==$section->id_section ? $section->nom_section:''}}
                                @endforeach
                            </td>
                            <td>
                                @foreach($zones as $zone)
                                    {{$site->id_zone==$zone->id_zone ? $zone->nom_zone:''}}
                                @endforeach
                            </td>
                            <td class="center">
                                <a class="btn btn-blue-alt col-md-4" href="{{url('/personnel/site/create_update/'
                                .$site->id_site)}}" title="MODIFIER">
                                    <i class="glyph-icon icon-pencil"></i>
                                </a>
                                <form method="post" action="{{url('/delete_site')}}" class="col-md-6">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$site->id_site}}">

                                    <button type="button" class="btn btn-danger col-md-12" data-toggle="modal"
                                            title="SUPPRIMER" data-target="#myModal{{$site->id_site}}">
                                        <i class="glyph-icon icon-trash"></i>
                                    </button>

                                    <div class="modal fade bs-example-modal-sm" id="myModal{{$site->id_site}}"
                                         tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title">Confirmation</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>VOULEZ VOUS VRAIMENT SUPPRIMER?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
                                                    <button type="submit" class="btn btn-primary">Oui</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection('contenu')

@extends('layouts.personnel')

@section('titre_contenu')
    SITES
@endsection('titre_contenu')

@section('sous_titre_contenu')
    LISTE DES SITES
@endsection('sous_titre_contenu')

@section('contenu_page')

    <div class="panel">
        <div class="panel-body">
            <div class=" title-hero">
                <a class="btn btn-border btn-alt border-green btn-link font-green col-md-2" href="{{ url
                ('personnel/site/create_update') }}" title=""> <i class="glyph-icon icon-plus"></i> <span>NOUVEAU SITE</span></a>
                <h3 class="col-md-10 col-md-push-7">
                    LISTE DES SITES
                </h3>
                <br><br>
            </div>
            <div class="example-box-wrapper">

                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="datatable-example">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOM</th>
                        <th>ADRESSE</th>
                        <th>DATE DEBUT TRAVAUX</th>
                        <th>DATE FIN TRAVAUX</th>
                        <th>DUREE</th>
                        <th>SECTION</th>
                        <th>ACTIONS</th>
                    </tr>
                    </thead>
                <tbody>

                    @foreach($sites as $site)
                        <tr class="odd gradeX">
                            <td>{{$site->id_site}}</td>
                            <td>{{$site->nom_site}}</td>
                            <td>{{$site->adresse_site}}</td>
                            <td>{{$site->date_deb_travaux_site}}</td>
                            <td>{{$site->date_fin_travaux_site}}</td>
                            <td>{{$site->duree_travaux_site}}</td>
                            <td>
                                @foreach($sections as $section)
                                    {{$site->id_section==$section->id_section ? $section->nom_section:''}}
                                @endforeach
                            </td>
                            <td class="center">
                                <a class="btn btn-border btn-alt border-blue-alt btn-link font-blue-alt col-md-5"
                                   href="{{url
                                ('/personnel/site/create_update/'.$site->id_site)}}"><span>Modifier</span></a>
                                <form method="post" action=" {{url('delete_site')}}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$site->id_site}}">

                                    <button type="button" class="btn btn-border btn-alt border-red btn-link font-red
                                    col-md-5 col-md-push-2"
                                            data-toggle="modal"
                                            data-target="#myModal{{$site->id_site}}">Supprimer</button>

                                    <div class="modal fade bs-example-modal-sm" id="myModal{{$site->id_site}}"
                                         tabindex="-1" role="dialog"
                                         aria-labelledby="mySmallModalLabel" aria-hidden="true">
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
@endsection('contenu_page')

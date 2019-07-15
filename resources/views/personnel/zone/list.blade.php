@extends('layouts.personnel')

@section('titre_contenu')
    ZONES
@endsection('titre_contenu')

@section('sous_titre_contenu')
    LISTE DES ZONES
@endsection('sous_titre_contenu')

@section('contenu_page')

    <div class="panel">
        <div class="panel-body">
            <div class=" title-hero">
                <a class="btn btn-border btn-alt border-green btn-link font-green col-md-2" href="{{ url
                ('personnel/zone/create_update') }}" title=""><span>NOUVELLE ZONE</span></a>
                <h3 class="col-md-10 col-md-push-7">
                    LISTE DES ZONES
                </h3>
                <br><br>
                    <div class="alert alert-close alert-success col-md-6 col-md-push-3">
                        <a href="#" title="Fermer" class="glyph-icon alert-close-btn icon-remove"></a>
                        <div class="bg-green alert-icon">
                            <i class="glyph-icon icon-check"></i>
                        </div>
                        <div class="alert-content">
                            <h4 class="alert-title">Profil ajouté avec succès!</h4>
                        </div>
                    </div>
            </div>
            <div class="example-box-wrapper">

                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="datatable-example">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOM</th>
                        <th>ACTIONS</th>
                    </tr>
                    </thead>
                <tbody>

                    @foreach($zones as $zone)
                        <tr class="odd gradeX">
                            <td>{{$zone->id_zone}}</td>
                            <td>{{$zone->nom_zone}}</td>
                            <td class="center">
                                <a class="btn btn-border btn-alt border-blue-alt btn-link font-blue-alt col-md-5"
                                   href="{{url
                                ('/personnel/zone/create_update/'.$zone->id_zone)}}"><span>Modifier</span></a>
                                <form method="post" action=" {{url('delete_zone')}}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$zone->id_zone}}">

                                    <button type="button" class="btn btn-border btn-alt border-red btn-link font-red
                                    col-md-5 col-md-push-2"
                                            data-toggle="modal"
                                            data-target="#myModal{{$zone->id_zone}}">Supprimer</button>

                                    <div class="modal fade bs-example-modal-sm" id="myModal{{$zone->id_zone}}"
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

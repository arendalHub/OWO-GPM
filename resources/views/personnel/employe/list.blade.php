@extends('layouts.personnel')

@section('titre_contenu')
    EMPLOYES
@endsection('titre_contenu')

@section('sous_titre_contenu')
    LISTE DES EMPLOYES
@endsection('sous_titre_contenu')

@section('contenu')

    <div class="panel">
        <div class="panel-body">
            <div class=" title-hero">
                <a class="btn btn-border btn-alt border-green btn-link font-green col-md-2" href="{{ url
                ('personnel/employe/create_update') }}" title=""> <i class="glyph-icon icon-plus"></i> <span>NOUVEL EMPLOYE</span></a>
                <br><br>

            </div>
            <div class="example-box-wrapper">

                <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>MATRICULE</th>
                        <th>NOM & PRENOM(S)</th>
                        <th>DATE & LIEU NAISSANCE</th>
                        <th>SEXE</th>
                        <th>TELEPHONE</th>
                        <th>ADRESSE</th>
                        <th>ACTIONS</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($employes as $employe)
                        <tr class="odd gradeX">
                            <td>{{$employe->id_employe}}</td>
                            <td>{{$employe->matricule_employe}}</td>
                            <td>{{$employe->nom_employe.' '.$employe->prenom_employe}}</td>
                            <td>{{$employe->date_naiss_employe.' à '.$employe->lieu_naiss_employe}}</td>
                            <td>{{$employe->sexe_employe}}</td>
                            <td>{{$employe->num_tel_employe}}</td>
                            <td>{{$employe->adresse_employe}}</td>
                            <td class="center">

                                <button class="btn btn-black-opacity col-md-3" data-toggle="modal" data-target="
                                .bs-example-modal-lg" title="DETAILS"><i class="glyph-icon icon-eye"></i></button>

                                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title">DETAILS</h4>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table table-striped table-bordered">
                                                    <tbody>
                                                    <tr>
                                                        <td>ID: <b>{{$employe->id_employe}}</b></td>
                                                        <td>MATRICULE: <b>{{$employe->matricule_employe}}</b></td>
                                                        <td>NOM & PRENOM(S):<b>{{$employe->nom_employe.' '
                                                        .$employe->prenom_employe}}</b></td>
                                                        <td>DATE & LIEU DE
                                                            NAISSANCE<b>{{$employe->date_naiss_employe.'
                                                         à '
                                                        .$employe->lieu_naiss_employe}}</b></td>
                                                        <td>SEXE: <b>{{$employe->sexe_employe}}</b></td>
                                                        <td>TELEPHONE: <b>{{$employe->num_tel_employe}}</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>ADRESSE: <b>{{$employe->adresse_employe}}</b></td>
                                                        <td>PERE: <b>{{$employe->pere_employe}}</b></td>
                                                        <td>MERE: <b>{{$employe->mere_employe}}</b></td>
                                                        <td>TELEPHONE URGENCE:
                                                            <b>{{$employe->num_tel_urgence_employe}}</b></td>
                                                        <td>SITUATION MATRIMONIALE:
                                                            <b>{{$employe->situation_mat_employe}}</b></td>
                                                        <td>NOMBRE D'ENFANTS:
                                                            <b>{{$employe->nb_enfant_employe}}</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>N° IDENTITE: <b>{{$employe->num_identite_employe}}</b></td>
                                                        <td>NIVEAU D'ETUDES:
                                                            <b>{{$employe->niveau_etudes_employe}}</b></td>
                                                        <td>DATE ENTREE: <b>{{$employe->date_entree_employe}}</b></td>
                                                        <td>DATE DE DEPART:
                                                            <b>{{$employe->date_depart_employe}}</b></td>
{{--                                                        <td>DATE DE SORTIE
:<b>{{$employe->date_sortie_employe}}</b></td>--}}
                                                        <td>N° CNSS: <b>{{$employe->num_cnss_employe}}</b></td>
                                                        <td>TYPE DE CONTRAT: <b>{{$employe->contrat_employe}}</b></td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                                <button type="button" disabled class="btn btn-black">Imprimer <i class="glyph-icon icon-print"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-1"></div>

                                <a class="btn btn-blue-alt col-md-3" href="{{url
                                ('/parametre/personnel/create_update/'.$employe->id_employe)}}" title="MODIFIER">
                                    <i class="glyph-icon icon-pencil"></i>
                                </a>
                                <div class="col-md-1"></div>

                                <form method="post" action=" {{url('delete_employe')}}" class="col-md-4">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$employe->id_employe}}">

                                    <button type="button" class="btn btn-danger col-md-12" data-toggle="modal"
                                            title="SUPPRIMER"
                                            data-target="#myModal{{$employe->id_employe}}">
                                        <i class="glyph-icon icon-trash"></i>
                                    </button>

                                    <div class="modal fade bs-example-modal-sm" id="myModal{{$employe->id_employe}}"
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
@endsection('contenu')

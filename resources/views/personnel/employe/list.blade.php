@extends('layouts.personnel')

@section('titre_contenu')
    EMPLOYES
@endsection('titre_contenu')

@section('sous_titre_contenu')
    LISTE DES EMPLOYES
@endsection('sous_titre_contenu')

@section('contenu_page')

    <div class="panel">
        <div class="panel-body">
            <div class=" title-hero">
                <a class="btn btn-border btn-alt border-green btn-link font-green col-md-2" href="{{ url
                ('personnel/employe/create_update') }}" title=""> <i class="glyph-icon icon-plus"></i> <span>NOUVEL EMPLOYE</span></a>
                <h3 class="col-md-10 col-md-push-7">
                    LISTE DES EMPLOYES
                </h3>
                <br><br>

            </div>
            <div class="example-box-wrapper">

                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="datatable-example">
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
                                                <h4 class="modal-title">Informations Supplémentaires</h4>
                                            </div>
                                            <div class="modal-body">
                                                <table table table-striped table-bordered>
                                                    <thead>
                                                    <th>PERE</th>
                                                    <th>MERE</th>
                                                    <th>CONTACT URGENCE</th>
                                                    <th>SITUATION MATRIMONIALE</th>
                                                    <th>NOMBRE ENFANTS</th>
                                                    <th>N° IDENTITE</th>
                                                    <th>DATE ENTREE</th>
                                                    <th>DATE SORTIE</th>
                                                    <th>N° CNSS</th>
                                                    <th>TYPE CONTRAT</th>
                                                    </thead>
                                                    <tbody>
                                                        <td>{{$employe->pere_employe}}</td>
                                                        <td>{{$employe->mere_employe}}</td>
                                                        <td>{{$employe->num_tel_urgence_employe}}</td>
                                                        <td>{{$employe->situation_mat_employe}}</td>
                                                        <td>{{$employe->nb_enfant_employe}}</td>
                                                        <td>{{$employe->num_identite_employe}}</td>
                                                        <td>{{$employe->date_entree_employe}}</td>
                                                        <td>{{$employe->date_sortie_employe}}</td>
                                                        <td>{{$employe->num_cnss_employe}}</td>
                                                        <td>{{$employe->contrat_employe}}</td>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Fermer</button>
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
@endsection('contenu_page')

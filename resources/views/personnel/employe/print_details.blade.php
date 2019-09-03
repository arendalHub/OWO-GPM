{{-- {{$employe}} --}}
<style type="text/css">
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 5mm;
    }

    #table tr {
        background-color: white;
        color: black
    }

    #table tr th {
        border: 1px solid #aaa;
        width: 14%;
        text-align: center;
        padding: 15px
    }

    #table tr td {
        border: 1px solid #aaa;
        width: 14%;
        text-align: center;
        text-decoration: blink;
        padding: 15px
    }

    h2 {
        font: normal 175% Arial, Helvetica, sans-serif;
        color: #008000;
        letter-spacing: -1px;
        margin: 0 0 10px 0;
        padding: 5px 0 0 0;
    }
</style>

<page backtop='45mm' footer="date;heure;page;">

    <page_header>
        <hr>
        <table align="center">
            <tr>
                <td style="width:20%">
                    <img src="images/photo_2019-08-21_06-43-23.jpg" {{-- height="100" width="100" --}}/>
                </td>
                <td style="width:60%; text-align:center;">
                    <h2> PLETHO SARL-U </h2>
                    <small>Nettoyage industriel</small>
                    <br>
                    <small>
                        26, Rue des Myosotis
                        Kodjoviakopé - 07 BP 12467
                        Lomé - Togo
                        Tel :
                            (+228) 22 22 34 53
                        Gsm :
                            (+228) 90 11 12 32
                            (+228) 93 25 81 85

                    </small>
                </td>
                <td style="width:20%">
                    <img src="images/photo_2019-08-21_06-43-23.jpg" {{-- height="100" width="100" --}}/>
                </td>
            </tr>
        </table>
        <hr>
        <br>
    </page_header>

    <page_footer>


    </page_footer>

    <div style="color: rgb(50,50,50); width: 60%; margin: auto;" class="panel">
        <div class="panel panel-heading">

        </div>
        <div class="panel-body">
            <div style="width: 100%" class="example-box-wrapper">
                <div>
                    <h3 align="center">Détails de l'employé </h3>
                </div>
                <table id="table" margin-top style="font-size: 8px; width: all;" align="center">
                    <tbody>
                        <tr>
                            <td style="width: unset;">MATRICULE: <br> <b>{{$employe->matricule_employe}}</b></td>
                            <td style="width: unset;">NOM & PRENOM(S): <br><b>{{$employe->nom_employe.' '
                            .$employe->prenom_employe}}</b></td>
                            <td style="width: unset;">DATE & LIEU DE NAISSANCE: <br> <b>{{$employe->date_naiss_employe.' à '
                            .$employe->lieu_naiss_employe}}</b></td>
                            <td style="width: unset;">SEXE: <br> <b>{{$employe->sexe_employe}}</b></td>
                            <td style="width: unset;">TELEPHONE: <br> <b>{{$employe->num_tel_employe}}</b></td>
                            <td style="width: unset;">ADRESSE: <br> <b>{{$employe->adresse_employe}}</b></td>
                        </tr>
                        <tr>
                            <td style="width: unset;">PERE: <br> <b>{{$employe->pere_employe}}</b></td>
                            <td style="width: unset;">MERE: <br> <b>{{$employe->mere_employe}}</b></td>
                            <td style="width: unset;">TELEPHONE URGENCE: <br> <b>{{$employe->num_tel_urgence_employe}}</b></td>
                            <td style="width: unset;">SITUATION MATRIMONIALE: <br>
                                <b>{{$employe->situation_mat_employe}}</b></td>
                            <td style="width: unset;">NOMBRE D'ENFANTS: <br>
                                <b>{{$employe->nb_enfant_employe}}</b></td>
                            <td style="width: unset;">NIVEAU D'ETUDES: <br> <b>{{$employe->niveau_etudes_employe}}</b></td>
                        </tr>
                        <tr>
                            <td style="width: unset;">N° IDENTITE: <br> <b>{{$employe->num_identite_employe}}</b></td>
                            <td style="width: unset;">DATE ENTREE: <br> <b>{{$employe->date_entree_employe}}</b></td>
                            <td style="width: unset;">DATE DE DEPART: <br> <b>{{$employe->date_depart_employe}}</b></td>
                            <td style="width: unset;">DATE DE SORTIE : <br><b>{{$employe->date_sortie_employe}}</b></td>
                            <td style="width: unset;">TYPE CONTRAT: <br> <b>{{$employe->contrat_employe}}</b></td>
                            <td style="width: unset;">N° CNSS: <br> <b>{{$employe->num_cnss_employe}}</b></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <br/>

            <div style="width: 100%" class="example-box-wrapper">
                <div>
                    <h3 align="center">Dossier de l'employé</h3>
                </div>
                <table id="table" margin-top style="font-size: 8px; width: all;" align="center">
                    <tbody>
                        <tr>
                            <td>N° DOSSIER: 
                                <b>{{$dossier->num_dossier}}</b>
                            </td>
                            <td>PHOTO:
                                @if (is_null($dossier->photo) || $dossier->photo=='')
                                    <i>NON-RENSEIGNÉ</i>
                                @else
                                    <b>RENSEIGNÉ</b>    
                                @endif
                            </td>
                            <td>NAISSANCE: 
                                @if (is_null($dossier->naissance) || $dossier->naissance=='')
                                    <i>NON-RENSEIGNÉ</i>
                                @else
                                    <b>RENSEIGNÉ</b>
                                @endif
                            </td> 
                        </tr>
                        <tr>
                            <td>NATIONALITE: 
                                @if (is_null($dossier->nationalite) || $dossier->nationalite=='')
                                    <i>NON-RENSEIGNÉ</i>
                                @else
                                    <b>RENSEIGNÉ</b>  
                                @endif
                            </td> 
                            <td>CNI: 
                                @if (is_null($dossier->cni) || $dossier->cni=='')
                                    <i>NON-RENSEIGNÉ</i>
                                @else
                                    <b>RENSEIGNÉ</b>
                                @endif
                            </td> 
                            <td>PASSPORT: 
                                @if (is_null($dossier->passport) || $dossier->passport=='')
                                    <i>NON-RENSEIGNÉ</i>
                                @else
                                    <b>RENSEIGNÉ</b>  
                                @endif
                            </td> 
                        </tr>
                        <tr>
                            <td>DIPLOME 1: 
                                @if (is_null($dossier->diplome1) || $dossier->diplome1=='')
                                    <i>NON-RENSEIGNÉ</i>
                                @else
                                    <b>RENSEIGNÉ</b> 
                                @endif
                            </td> 
                            <td>DIPLOME 2: 
                                @if (is_null($dossier->diplome2) || $dossier->diplome2=='')
                                    <i>NON-RENSEIGNÉ</i>
                                @else
                                    <b>RENSEIGNÉ</b>  
                                @endif
                            </td> 
                            <td>DIPLOME 3: 
                                @if (is_null($dossier->diplome3) || $dossier->diplome3=='')
                                    <i>NON-RENSEIGNÉ</i>
                                @else
                                    <b>RENSEIGNÉ</b>  
                                @endif
                            </td> 
                        </tr>
                        <tr>
                            <td>ATTESTATION 1: 
                                @if (is_null($dossier->attestation1) || $dossier->attestation1=='')
                                    <i>NON-RENSEIGNÉ</i>
                                @else
                                    <b>RENSEIGNÉ</b>  
                                @endif
                            </td> 
                            <td>ATTESTATION 2: 
                                @if (is_null($dossier->attestation2) || $dossier->attestation2=='')
                                    <i>NON-RENSEIGNÉ</i>
                                @else
                                    <b>RENSEIGNÉ</b>  
                                @endif
                            </td> 
                            <td>ATTESTATION 3: 
                                @if (is_null($dossier->attestation3) || $dossier->attestation3=='')
                                    <i>NON-RENSEIGNÉ</i>
                                @else
                                    <b>RENSEIGNÉ</b> 
                                @endif
                            </td> 
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel-footer">

        </div>
    </div>
</page>

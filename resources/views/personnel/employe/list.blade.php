@extends('layouts.personnel')

@section('titre_contenu')
    EMPLOYES
@endsection('titre_contenu')

@section('sous_titre_contenu')
    LISTE DES EMPLOYES
    @if (Session::has('message'))
        <div class="alert alert-close alert-success col-md-8 col-md-offset-2">
            <a href="#" title="Close" class="glyph-icon alert-close-btn icon-remove"></a>
            <div class="bg-green alert-icon">
                <i class="glyph-icon icon-check"></i>
            </div>
            <div class="alert-content text-center">
                <h4 class="alert-title">{{Session::get('message')}}</h4>
                <p></p>
            </div>
        </div> <br>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-close alert-danger col-md-8 col-md-offset-2">
            <a href="#" title="Close" class="glyph-icon alert-close-btn icon-remove"></a>
            <div class="bg-green alert-icon">
                <i class="glyph-icon icon-check"></i>
            </div>
            <div class="alert-content text-center">
                <h4 class="alert-title">{{Session::get('error')}}</h4>
                <p></p>
            </div>
        </div> <br>
    @endif
@endsection('sous_titre_contenu')

@section('contenu')
    <div class="panel">
        <div class="panel-body">
            <div class=" title-hero">
                <a class="btn btn-border btn-alt border-green btn-link font-green" href="{{ url
                ('personnel/employe/create_update') }}" title=""> <i class="glyph-icon icon-plus"></i> <span>NOUVEL EMPLOYE</span></a>
                <a class="btn btn-border btn-alt border-green btn-link font-green pull-right" href="{{ url('personnel/employe/print_list') }}" title=""> <i class="glyph-icon icon-print"></i> <span>IMPRIMER</span></a>
                <br>

                <div class="content-box col-md-8 col-md-offset-2 border-blue">
                    <a href="#" class="icon-separator toggle-button">
                        <h3 class="text-center"> RECHERCHE PARAMETRÉE </h3>
                    </a>
                    <div class="content-box-wrapper hide" style="display: none;">
                        <form method="post" action="{{url('/sort_employe')}}">
                            @csrf
                            <div class="form-group remove-border col-md-6 text-center">
                                <label class="col-sm-5 control-label">TYPE DE CONTRAT:</label>
                                <div class="col-sm-7">
                                    <select name="contrat" class="form-control">
                                        <option value=""
                                        @if (old('contrat')=='')
                                            selected
                                        @endif
                                        >--TYPE DE CONTRAT--</option>
                                        <option value="Prestation de services"
                                        @if (old('contrat')=='Prestation de services')
                                            selected
                                        @endif
                                        >Prestation de services</option>
                                        <option value="CDD"
                                        @if (old('contrat')=='CDD')
                                            selected
                                        @endif
                                        >CDD</option>
                                        <option value="CDI"
                                        @if (old('contrat')=='CDI')
                                            selected
                                        @endif
                                        >CDI</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group remove-border col-md-3 text-center">
                                <label class="col-sm-5 control-label">CNSS:</label>
                                <div class="col-sm-7">
                                    <label>
                                        Oui
                                        <input type="radio" name="num_cnss" value="1">
                                    </label>
                                    <label>
                                        Non
                                        <input type="radio" name="num_cnss" value="0">
                                    </label>
                                </div>
                            </div>
                            <div class="form-group remove-border col-md-2 text-center">
                                <label class="col-sm-5 control-label">SEXE:</label>
                                <div class="col-sm-7">
                                    <label>
                                        M
                                        <input type="radio" id="sexe" name="sexe" value="M">
                                    </label>
                                    <label>
                                        F
                                        <input type="radio" id="sexe" name="sexe" value="F">
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info col-md-1">
                                <i class="glyph-icon icon-search"></i>
                                <div class="ripple-wrapper"></div> 
                            </button>
                            
                        </form>
                    </div>
                </div>

                <br><br>
                <br><br>
                <br><br>

            </div>
            <div class="example-box-wrapper">

                <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>MATRICULE</th>
                        <th>NOM & PRENOM(S)</th>
                        <th>DATE & LIEU NAISSANCE</th>
                        <th>SEXE</th>
                        <th>TELEPHONE</th>
                        <th>ADRESSE</th>
                        <th>CONTRAT</th>
                        <th>ACTIONS</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($employes as $employe)
                        <tr class="odd gradeX">
                            <td>{{$employe->matricule_employe}}</td>
                            <td>{{$employe->nom_employe.' '.$employe->prenom_employe}}</td>
                            <td>{{$employe->date_naiss_employe.' à '.$employe->lieu_naiss_employe}}</td>
                            <td>{{$employe->sexe_employe}}</td>
                            <td>{{$employe->num_tel_employe}}</td>
                            <td>{{$employe->adresse_employe}}</td>
                            <td>{{$employe->contrat_employe}}</td>
                            <td class="center">

                                <button class="btn btn-black-opacity col-md-3" data-toggle="modal" data-target="#myModal0{{$employe->id_employe}}" title="DETAILS DE L'EMPLOYE"><i class="glyph-icon icon-eye"></i></button>

                                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="myModal0{{$employe->id_employe}}">
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
                                                        <td>MATRICULE: <br> <b>{{$employe->matricule_employe}}</b></td>
                                                        <td>NOM & PRENOM(S): <br><b>{{$employe->nom_employe.' '
                                                        .$employe->prenom_employe}}</b></td>
                                                        <td>DATE & LIEU DE NAISSANCE<b>{{$employe->date_naiss_employe.' à '
                                                        .$employe->lieu_naiss_employe}}</b></td>
                                                        <td>SEXE: <br> <b>{{$employe->sexe_employe}}</b></td>
                                                        <td>TELEPHONE: <br> <b>{{$employe->num_tel_employe}}</b></td>
                                                        <td>ADRESSE: <br> <b>{{$employe->adresse_employe}}</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>PERE: <br> <b>{{$employe->pere_employe}}</b></td>
                                                        <td>MERE: <br> <b>{{$employe->mere_employe}}</b></td>
                                                        <td>TELEPHONE URGENCE: <br> <b>{{$employe->num_tel_urgence_employe}}</b></td>
                                                        <td>SITUATION MATRIMONIALE: <br>
                                                            <b>{{$employe->situation_mat_employe}}</b></td>
                                                        <td>NOMBRE D'ENFANTS: <br>
                                                            <b>{{$employe->nb_enfant_employe}}</b></td>
                                                        <td>NIVEAU D'ETUDES: <br> <b>{{$employe->niveau_etudes_employe}}</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>N° IDENTITE: <br> <b>{{$employe->num_identite_employe}}</b></td>
                                                        <td>DATE ENTREE: <br> <b>{{$employe->date_entree_employe}}</b></td>
                                                        <td>DATE DE DEPART: <br> <b>{{$employe->date_depart_employe}}</b></td>
                                                       <td>DATE DE SORTIE : <br><b>{{$employe->date_sortie_employe}}</b></td>
                                                        <td>TYPE CONTRAT: <br> <b>{{$employe->contrat_employe}}</b></td>
                                                        <td>N° CNSS: <br> <b>{{$employe->num_cnss_employe}}</b></td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer </button>
                                                <a class="btn btn-black" href="{{ url('personnel/employe/print_details/'.$employe->id_employe) }}">Imprimer <i class="glyph-icon icon-print"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn col-md-3" data-toggle="modal" data-target="#myModal00{{$employe->id_employe}}" title="DOSSIER DE L'EMPLOYE"><i class="glyph-icon icon-folder"></i></button>

                                <div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="myModal00{{$employe->id_employe}}">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">DOSSIER {{$employe->nom_employe.' '.$employe->prenom_employe}}</h4>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table table-striped table-bordered">
                                                    <tbody>
                                                        @php($monDossier = null)
                                                        @if (isset($dossiers))
                                                            @foreach($dossiers as $dossier)
                                                                @if($employe->id_dossier==$dossier->id_dossier)
                                                                    @php($monDossier = $dossier)
                                                                @endif
                                                            @endforeach 
                                                        @endif
                                                    <tr>
                                                        <td colspan="2">N° DOSSIER: 
                                                            <b>{{$monDossier->num_dossier}}</b>
                                                        </td>
                                                        
                                                        <td>PHOTO:
                                                            @if (is_null($monDossier->photo) || $monDossier->photo=='')
                                                                <br><small><i>NON-RENSEIGNÉ</i></small>
                                                            @else
                                                                <a href="{{ asset('storage/'.$monDossier->photo)}}" target="_blank"><img src="{{ asset('storage/'.$monDossier->photo)}}" height="70" width="70" class="meta-image img-bordered"></a>    
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>    
                                                        <td>NAISSANCE: 
                                                            @if (is_null($monDossier->naissance) || $monDossier->naissance=='')
                                                                <br><small><i>NON-RENSEIGNÉ</i></small>
                                                            @else
                                                                <a href="{{ asset('storage/'.$monDossier->naissance)}}" target="_blank" class="btn btn-border border-info"><i class="glyph-icon icon-file"></i></a>
                                                            @endif
                                                        </td> 
                                                        <td>NATIONALITE: 
                                                            @if (is_null($monDossier->nationalite) || $monDossier->nationalite=='')
                                                                <br><small><i>NON-RENSEIGNÉ</i></small>
                                                            @else
                                                                <a href="{{ asset('storage/'.$monDossier->nationalite)}}" target="_blank" class="btn btn-border border-info"><i class="glyph-icon icon-file"></i></a>  
                                                            @endif
                                                        </td> 
                                                        <td>CNI: 
                                                            @if (is_null($monDossier->cni) || $monDossier->cni=='')
                                                                <br><small><i>NON-RENSEIGNÉ</i></small>
                                                            @else
                                                                <a href="{{ asset('storage/'.$monDossier->cni)}}" target="_blank" class="btn btn-border border-info"><i class="glyph-icon icon-file"></i></a>  
                                                            @endif
                                                        </td> 
                                                    </tr>
                                                    <tr>    
                                                        <td>DIPLOME 1: 
                                                            @if (is_null($monDossier->diplome1) || $monDossier->diplome1=='')
                                                                <br><small><i>NON-RENSEIGNÉ</i></small>
                                                            @else
                                                                <a href="{{ asset('storage/'.$monDossier->diplome1)}}" target="_blank" class="btn btn-border border-info"><i class="glyph-icon icon-file"></i></a>  
                                                            @endif
                                                        </td> 
                                                        <td>DIPLOME 2: 
                                                            @if (is_null($monDossier->diplome2) || $monDossier->diplome2=='')
                                                                <br><small><i>NON-RENSEIGNÉ</i></small>
                                                            @else
                                                                <a href="{{ asset('storage/'.$monDossier->diplome2)}}" target="_blank" class="btn btn-border border-info"><i class="glyph-icon icon-file"></i></a>  
                                                            @endif
                                                        </td> 
                                                        <td>DIPLOME 3: 
                                                            @if (is_null($monDossier->diplome3) || $monDossier->diplome3=='')
                                                                <br><small><i>NON-RENSEIGNÉ</i></small>
                                                            @else
                                                                <a href="{{ asset('storage/'.$monDossier->diplome3)}}" target="_blank" class="btn btn-border border-info"><i class="glyph-icon icon-file"></i></a>  
                                                            @endif
                                                        </td> 
                                                    </tr>
                                                    <tr>    
                                                        <td>ATTESTATION 1: 
                                                            @if (is_null($monDossier->attestation1) || $monDossier->attestation1=='')
                                                                <br><small><i>NON-RENSEIGNÉ</i></small>
                                                            @else
                                                                <a href="{{ asset('storage/'.$monDossier->attestation1)}}" target="_blank" class="btn btn-border border-info"><i class="glyph-icon icon-file"></i></a>  
                                                            @endif
                                                        </td> 
                                                        <td>ATTESTATION 2: 
                                                            @if (is_null($monDossier->attestation2) || $monDossier->attestation2=='')
                                                                <br><small><i>NON-RENSEIGNÉ</i></small>
                                                            @else
                                                                <a href="{{ asset('storage/'.$monDossier->attestation2)}}" target="_blank" class="btn btn-border border-info"><i class="glyph-icon icon-file"></i></a>  
                                                            @endif
                                                        </td> 
                                                        <td>ATTESTATION 3: 
                                                            @if (is_null($monDossier->attestation3) || $monDossier->attestation3=='')
                                                                <br><small><i>NON-RENSEIGNÉ</i></small>
                                                            @else
                                                                <a href="{{ asset('storage/'.$monDossier->attestation3)}}" target="_blank" class="btn btn-border border-info"><i class="glyph-icon icon-file"></i></a>  
                                                            @endif
                                                        </td> 
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

            
                                <a class="btn btn-blue-alt col-md-3" href="{{url ('/personnel/employe/create_update/'.$employe->id_employe)}}" title="MODIFIER">
                                    <i class="glyph-icon icon-pencil"></i>
                                </a>

                                <form method="post" action=" {{url('delete_employe')}}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$employe->id_employe}}">

                                    <button type="button" class="btn btn-danger col-md-3" data-toggle="modal" title="SUPPRIMER" data-target="#myModal{{$employe->id_employe}}">
                                        <i class="glyph-icon icon-trash"></i>
                                    </button>

                                    <div class="modal fade bs-example-modal-sm" id="myModal{{$employe->id_employe}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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

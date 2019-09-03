@extends('layouts.personnel')

@section('titre_contenu')
    EMPLOYES
@endsection('titre_contenu')

@section('sous_titre_contenu')
    ESPACE D'AFFECTATIONS
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
            {{-- <div class=" title-hero">
                <a class="btn btn-border btn-alt border-green btn-link font-green col-md-2" href="{{ url
                ('personnel/employe/create_update') }}" title=""> <i class="glyph-icon icon-plus"></i> <span>NOUVEL EMPLOYE</span></a>
                <br><br>

            </div> --}}
            <div class="example-box-wrapper">

                <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>MATRICULE</th>
                        <th>NOM & PRENOM(S)</th>
                        <th>SEXE</th>
                        <th>CONTRAT</th>
                        <th>DECLARATION CNSS</th>
                        <th>AFFECTATION ACTUELLE</th>
                        {{-- <th>TELEPHONE</th> --}}
                        {{-- <th>ADRESSE</th> --}}
                        <th>ACTIONS</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($employes as $employe)
                        <tr class="odd gradeX">
                            <td>{{$employe->id_employe}}</td>
                            <td>{{$employe->matricule_employe}}</td>
                            <td>{{$employe->nom_employe.' '.$employe->prenom_employe}}</td>
                            <td>{{$employe->sexe_employe}}</td>
                            <td>{{$employe->contrat_employe}}</td>
                            <td>{{ ($employe->num_cnss_employe==null || $employe->num_cnss_employe=='') ? 'OUI' : 'NON' }}</td>
                            <td>
                                @if(isset($employe->id_site) && $employe->id_site != null && $employe->id_site != null)
                                    @foreach($sites as $site)
                                        {{$employe->id_site==$site->id_site ? $site->nom_site:''}}
                                    @endforeach
                                @else
                                    NON-AFFECTÉ
                                @endif
                            </td>
                            {{-- <td>{{$employe->num_tel_employe}}</td> --}}
                            {{-- <td>{{$employe->adresse_employe}}</td> --}}
                            <td class="center">
                                <form method="post" action="{{url('add_affectation')}}" class="col-md-6">
                                    @csrf 
                                    <input type="hidden" name="id" value="{{$employe->id_employe}}"> 

                                    <button class="btn btn-black-opacity" data-toggle="modal" data-target="#myModal0{{$employe->id_employe}}" title="AFFECTER L'EMPLOYE"><i class="glyph-icon icon-send"></i></button>

                                    <div class="modal fade bs-example-modal-sm" id="myModal0{{$employe->id_employe}}"
                                         tabindex="-1" role="dialog"
                                         aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
    
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title">AFFECTATION D'UN EMPLOYÉ</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group col-sm-12">
                                                        <label class="col-sm-4 control-label">* SITE :</label>
                                                        <div class="col-sm-6">
                                                            <select class="form-control" id="site" name="site" required>
                                                                @foreach($sites as $site)
                                                                    <option value="{{$site->id_site}}">{{$site->nom_site}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <div class="form-group col-sm-12">
                                                            <label class="col-sm-4 control-label">* DATE AFFECTATION :</label>
                                                            <div class="col-sm-6">
                                                                <input type="date" id="date_affectation" name="date_affectation" required class="form-control" value="{{old('date_affectation')}}"
                                                                >
                                                            </div>
                                                        </div>

                                                    </div>
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                                    <button type="submit" class="btn btn-primary">Valider</button>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                {{-- <div class="col-md-1"></div> --}}

                                <form method="post" action=" {{url('cancel_affectation')}}" class="col-md-6">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$employe->id_employe}}">

                                    <button type="button" class="btn btn-danger col-md-12" data-toggle="modal"
                                            title="ANNULER"
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

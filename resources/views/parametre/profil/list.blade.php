@extends('layouts.parametre')

@section('titre_contenu')
    PROFILS
@endsection('titre_contenu')

@section('sous_titre_contenu')
    LISTE DES PROFILS
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
                ('/parametre/profil/create_update') }}" title=""> <i class="glyph-icon icon-plus"></i> <span>NOUVEAU
                        PROFIL</span></a>
{{--                <h3 class="col-md-10 col-md-push-7">--}}
{{--                    LISTE DES PROFILS--}}
{{--                </h3>--}}
                <br><br>
            </div>
            <div class="example-box-wrapper">

                <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>LIBELLE</th>
                        <th>DROITS</th>
                        <th>ACTIONS</th>
                    </tr>
                    </thead>
                <tbody>

                    @foreach($profils as $profil)
                        <tr class="odd gradeX">
                            <td>{{$profil->id_profil}}</td>
                            <td>{{$profil->libelle_profil}}</td>
                            <td> [DROITS]</td>
                            <td class="center">

                                <a class="btn btn-blue-alt col-md-5" href="{{url('/parametre/profil/create_update/'.$profil->id_profil)}}" title="MODIFIER">
                                    <i class="glyph-icon icon-pencil"></i>
                                </a>
                                <form method="post" action=" {{url('delete_profil')}}" class="col-md-6">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$profil->id_profil}}">

                                    <button type="button" class="btn btn-danger col-md-12" data-toggle="modal"
                                            title="SUPPRIMER"
                                            data-target="#myModal{{$profil->id_profil}}">
                                        <i class="glyph-icon icon-trash"></i>
                                    </button>

                                    <div class="modal fade bs-example-modal-sm" id="myModal{{$profil->id_profil}}"
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

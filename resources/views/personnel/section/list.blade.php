@extends('layouts.personnel')

@section('titre_contenu')
    SECTIONS
@endsection('titre_contenu')

@section('sous_titre_contenu')
    LISTE DES SECTIONS
@endsection('sous_titre_contenu')

@section('contenu_page')

    <div class="panel">
        <div class="panel-body">
            <div class=" title-hero">
                <a class="btn btn-border btn-alt border-green btn-link font-green col-md-2" href="{{ url
                ('personnel/section/create_update') }}" title=""> <i class="glyph-icon icon-plus"></i> <span>NOUVELLE SECTION</span></a>
                <h3 class="col-md-10 col-md-push-7">
                    LISTE DES SECTIONS
                </h3>
                <br><br>
            </div>
            <div class="example-box-wrapper">

                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="datatable-example">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOM</th>
                        <th>ZONE</th>
                        <th>ACTIONS</th>
                    </tr>
                    </thead>
                <tbody>

                    @foreach($sections as $section)
                        <tr class="odd gradeX">
                            <td>{{$section->id_section}}</td>
                            <td>{{$section->nom_section}}</td>
                            <td>
                                @foreach($zones as $zone)
                                    {{$section->id_zone==$zone->id_zone ? $zone->nom_zone:''}}
                                @endforeach
                            </td>
                            <td class="center">
                                <a class="btn btn-blue-alt col-md-5" href="{{url('/parametre/personnel/create_update/'
                                .$section->id_section)}}" title="MODIFIER">
                                    <i class="glyph-icon icon-pencil"></i>
                                </a>
                                <form method="post" action=" {{url('delete_section')}}" class="col-md-6">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$section->id_section}}">

                                    <button type="button" class="btn btn-danger col-md-12" data-toggle="modal"
                                            title="SUPPRIMER"
                                            data-target="#myModal{{$section->id_section}}">
                                        <i class="glyph-icon icon-trash"></i>
                                    </button>

                                    <div class="modal fade bs-example-modal-sm" id="myModal{{$section->id_section}}"
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

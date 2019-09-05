@extends('layouts.stock')

@section('titre_contenu')
FAMILLE
@endsection('titre_contenu')

@section('sous_titre_contenu')
LISTE DES FAMILLES
@endsection('sous_titre_contenu')

@section('contenu_page')
<div class="panel">
    <div class="panel panel-heading">

    </div>
    <div class="panel-body">
        <div class="example-box-wrapper">
            <div class="row">
                <div class="col-md-8">
                    <form class="form-inline" action="{{url('/stock/famille/add_famille')}}">
                        <div class="form-group">
                            <input
                                required
                                type="text"
                                class="form-control"
                                placeholder="Ajouter une famille"
                                name="famille">
                        </div>
                        <div
                            class="form-group"
                            width="15%">
                        </div>
                        <div
                            class="form-group"
                            width="25%">
                            <button
                                type="submit"
                                class="btn btn-xs btn-primary">Valider</button>
                        </div>
                        @csrf
                    </form>
                    <hr>
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="datatable-1">
                        <thead>
                            <tr>
                                <th>Famille</th>
                            </tr>
                            <tr></tr>
                        </thead>
                        <tbody>
                            @if($fams != null && count($fams) > 0)
                            @php ($i=0)
                            @foreach($fams as $fam)
                            @php ($i++)
                            <tr>
                                <td>{{$fam->description_famille}}</td>
                                <td>
                                <a class="btn" title="Modifier la famille" data-toggle="modal" data-target="#edit_fam_modal{{$fam->id_famille}}">
                                        <i class="glyph-icon icon-pencil"></i>
                                    </a>
                                    <a class="btn" title="Supprimer la famille" href="{{url("/stock/famille/delete/ {$fam->id_famille}")}}">
                                        <i class="glyph-icon icon-trash"></i>
                                    </a>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="edit_fam_modal{{$fam->id_famille}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modifier Famille Article</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-inline" action="{{url("/stock/famille/modif_famille/{$fam->id_famille}")}}">
                                            <div class="form-group">
                                                <input
                                                    required
                                                    type="text"
                                                    class="form-control"
                                                    placeholder=""
                                                    name="famille"
                                                    value="">
                                            </div>
                                            <div
                                                class="form-group"
                                                width="15%">
                                            </div>
                                            <div
                                                class="form-group"
                                                width="25%">
                                                <button
                                                    type="submit"
                                                    class="btn btn-xs btn-primary">Valider</button>
                                            </div>
                                            @csrf
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button> --}}
                                    </div>
                                </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-footer">
        <div class="text-center">
            {{-- {{$stocks->links()}} --}}
        </div>
    </div>
</div>
@endsection('contenu_page')

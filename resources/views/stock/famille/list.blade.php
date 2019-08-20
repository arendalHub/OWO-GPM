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
                                <input required type="text" class="form-control" placeholder="Ajouter une famille" name="famille">
                            </div>
                            <div class="form-group" width="15%">
                            </div>
                            <div class="form-group" width="25%">
                                <button type="submit" class="btn btn-xs btn-primary">Valider</button>
                            </div>
                            @csrf
                        </form>
                        <hr>
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="datatable-1">
                            <thead>
                                <tr>
                                    <th>Famille</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($fams != null && count($fams) > 0)
                                    @php ($i=0)
                                    @foreach($fams as $fam)
                                        @php ($i++)
                                        <tr>
                                            <td>{{$fam->description_famille}}</td>
                                        </tr>
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

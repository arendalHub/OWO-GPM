@extends('layouts.stock')

@section('titre_contenu')
EMPLACEMENT
@endsection('titre_contenu')

@section('sous_titre_contenu')
LISTE DES EMPLACEMENTS
@endsection('sous_titre_contenu')

@section('contenu_page')
    <div class="panel">
        <div class="panel panel-heading">

        </div>
        <div class="panel-body">
            <div class="example-box-wrapper">
                <div class="row">
                    <div class="col-md-4">
                        <form class="form-inline" action="{{url('/stock/emplacement/add_etagere')}}">
                            <div class="form-group">
                                <input required type="text" class="form-control" placeholder="Ajouter une étagère" name="etagere">
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
                                    <th>Etagère</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($etageres != null && count($etageres) > 0)
                                    @php ($i=0)
                                    @foreach($etageres as $etagere)
                                        @php ($i++)
                                        <tr>
                                            <td>{{$etagere->lib_etagere}}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <form class="form-inline" action="{{url('/stock/emplacement/add_rangee')}}">
                            <div class="form-group">
                                <input required type="text" class="form-control" placeholder="Ajouter une rangée" name="rangee">
                            </div>
                            <div class="form-group" width="15%">
                            </div>
                            <div class="form-group" width="25%">
                                <button type="submit" class="btn btn-xs btn-primary">Valider</button>
                            </div>
                            @csrf
                        </form>
                        <hr>
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="datatable-2">
                            <thead>
                                <tr>
                                    <th>Rangée</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($rangees != null && count($rangees) > 0)
                                    @php ($i=0)
                                    @foreach($rangees as $rangee)
                                        @php ($i++)
                                        <tr>
                                            <td>{{$rangee->lib_rangee}}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <form class="form-inline" action="{{url('/stock/emplacement/add_box')}}">
                            <div class="form-group">
                                <input required type="text" class="form-control" placeholder="Ajouter un box" name="box">
                            </div>
                            <div class="form-group" width="15%">
                            </div>
                            <div class="form-group" width="25%">
                                <button type="submit" class="btn btn-xs btn-primary">Valider</button>
                            </div>
                            @csrf
                        </form>
                        <hr>
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="datatable-3">
                            <thead>
                                <tr>
                                    <th>Box</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @if($boxes != null && count($boxes) > 0)
                                    @php ($i=0)
                                    @foreach($boxes as $box)
                                        @php ($i++)
                                        <tr>
                                            <td>{{$box->lib_box}}</td>
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

@section('datatables')
$('#datatable-1').DataTable( {
    responsive: true,
    "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Tous"]],
    "language":{
        "lengthMenu": "_MENU_ éléments par page",
        "zeroRecords": "Aucun élément à afficher",
        "info": "Affichage de _START_ à _END_ éléments",
        "infoEmpty": "Aucun élément dans la table",
        "infoFiltered": "[Tri effectué sur les élément(s)]",
        "paginate":{
            "first": "Premier",
            "last": "Dernier",
            "next": "Suivant",
            "previous": "Précédent"
        }
    }
});

$('#datatable-2').DataTable( {
    responsive: true,
    "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Tous"]],
    "language":{
        "lengthMenu": "_MENU_ éléments par page",
        "zeroRecords": "Aucun élément à afficher",
        "info": "Affichage de _START_ à _END_ éléments",
        "infoEmpty": "Aucun élément dans la table",
        "infoFiltered": "[Tri effectué sur les élément(s)]",
        "paginate":{
            "first": "Premier",
            "last": "Dernier",
            "next": "Suivant",
            "previous": "Précédent"
        }
    }
});

$('#datatable-3').DataTable( {
    responsive: true,
    "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Tous"]],
    "language":{
        "lengthMenu": "_MENU_ éléments par page",
        "zeroRecords": "Aucun élément à afficher",
        "info": "Affichage de _START_ à _END_ éléments",
        "infoEmpty": "Aucun élément dans la table",
        "infoFiltered": "[Tri effectué sur les élément(s)]",
        "paginate":{
            "first": "Premier",
            "last": "Dernier",
            "next": "Suivant",
            "previous": "Précédent"
        }
    }
});
@endsection('datatables')

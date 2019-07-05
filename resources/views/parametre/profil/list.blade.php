@extends('layouts.parametre')

@section('titre_contenu')
PROFILS 
@endsection('titre_contenu')

@section('sous_titre_contenu')
LISTE DES PROFILS
@endsection('sous_titre_contenu')

@section('contenu_page')
    <div class="panel">
        <div class="panel-body">
            <h3 class="title-hero">
                LISTE DES PROFILS
            </h3>
            <div class="example-box-wrapper">

                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="datatable-example">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>LIBELLE</th>
                    <th>DROITS</th>
                    <th>ACTIONS</th>
                </tr>
                </thead>
                <tbody>
                <tr class="odd gradeX">
                    <td>1</td>
                    <td>Super Admnistrateur</td>
                    <td></td>
                    <td class="center">
                        <a class="btn btn-border btn-alt border-blue-alt btn-link font-blue-alt" href="#" title=""><span>Modifier</span></a>
                        <a class="btn btn-border btn-alt border-red btn-link font-red" href="#" title=""><span>Supprimer</span></a>   
                    </td>
                </tr>
                <tr class="odd gradeX">
                    <td>2</td>
                    <td>Admnistrateur</td>
                    <td></td>
                    <td class="center">
                        <a class="btn btn-border btn-alt border-blue-alt btn-link font-blue-alt" href="#" title=""><span>Modifier</span></a>
                        <a class="btn btn-border btn-alt border-red btn-link font-red" href="#" title=""><span>Supprimer</span></a>  
                    </td>
                </tr>
                <tr class="odd gradeX">
                    <td>3</td>
                    <td>Directeur</td>
                    <td></td>
                    <td class="center">
                        <a class="btn btn-border btn-alt border-blue-alt btn-link font-blue-alt" href="#" title=""><span>Modifier</span></a>
                        <a class="btn btn-border btn-alt border-red btn-link font-red" href="#" title=""><span>Supprimer</span></a>  
                    </td>
                </tr>
                <tr class="odd gradeX">
                    <td>4</td>
                    <td>Comptable</td>
                    <td></td>
                    <td class="center">
                        <a class="btn btn-border btn-alt border-blue-alt btn-link font-blue-alt" href="#" title=""><span>Modifier</span></a>
                        <a class="btn btn-border btn-alt border-red btn-link font-red" href="#" title=""><span>Supprimer</span></a>  
                    </td>
                </tr>
                <tr class="odd gradeX">
                    <td>5</td>
                    <td>Secretaire</td>
                    <td></td>
                    <td class="center">
                        <a class="btn btn-border btn-alt border-blue-alt btn-link font-blue-alt" href="#" title=""><span>Modifier</span></a>
                        <a class="btn btn-border btn-alt border-red btn-link font-red" href="#" title=""><span>Supprimer</span></a>  
                    </td>
                </tr>

                </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection('contenu_page')

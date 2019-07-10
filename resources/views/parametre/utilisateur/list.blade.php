@extends('layouts.parametre')

@section('titre_contenu')
UTILISATEURS 
@endsection('titre_contenu')

@section('sous_titre_contenu')
LISTE DES UTILISATEURS
@endsection('sous_titre_contenu')

@section('contenu_page')
    <div class="panel">
        <div class="panel-body">
            <h3 class="title-hero">
                LISTE DES UTILISATEURS
            </h3>
            <div class="example-box-wrapper">

                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="datatable-example">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>LOGIN</th>
                    <th>PROFIL</th>
                    <th>ACTION</th>
                </tr>
                </thead>
                <tbody>
                <tr class="odd gradeX">
                    <td>001</td>
                    <td>test 1</td>
                    <td>Comptable</td>
                    <td class="center"> </td>
                </tr>
                <tr class="odd gradeX">
                    <td>002</td>
                    <td>test 2</td>
                    <td>Administrateur</td>
                    <td class="center"> </td>
                </tr>
                <tr class="odd gradeX">
                    <td>003</td>
                    <td>test 3</td>
                    <td>Caissier</td>
                    <td class="center"> </td>
                </tr>
                <tr class="odd gradeX">
                    <td>004</td>
                    <td>test 4</td>
                    <td>Comptable</td>
                    <td class="center"> </td>
                </tr>
                <tr class="odd gradeX">
                    <td>004</td>
                    <td>test 4</td>
                    <td>Caissier</td>
                    <td class="center"> </td>
                </tr>
                <tr class="odd gradeX">
                    <td>005</td>
                    <td>test 5</td>
                    <td>Secretaire</td>
                    <td class="center"> </td>
                </tr>
                <tr class="odd gradeX">
                    <td>006</td>
                    <td>test 6</td>
                    <td>Comptable</td>
                    <td class="center"> </td>
                </tr>
                <tr class="odd gradeX">
                    <td>007</td>
                    <td>test 7</td>
                    <td>Super Administrateur</td>
                    <td class="center"> </td>
                </tr>
                <tr class="odd gradeX">
                    <td>008</td>
                    <td>test 8</td>
                    <td>Gerant</td>
                    <td class="center"> </td>
                </tr>
                <tr class="odd gradeX">
                    <td>009</td>
                    <td>test 9</td>
                    <td>Directeur</td>
                    <td class="center"> </td>
                </tr>
                <tr class="odd gradeX">
                    <td>0010</td>
                    <td>test 10</td>
                    <td>Administrateur</td>
                    <td class="center"> </td>
                </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection('contenu_page')

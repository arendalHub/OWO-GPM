@extends('layouts.parametre')

@section('titre_contenu')
PROFILS 
@endsection('titre_contenu')

@section('sous_titre_contenu')
CREATION / MODIFICATION DE PROFIL
@endsection('sous_titre_contenu')

@section('contenu_page')

<div class="panel">
    <div class="panel-body">
        <h3 class="title-hero">
            CREATION / MODIFICATION DE PROFIL
        </h3>
        <div class="example-box-wrapper">
            <form class="form-horizontal bordered-row" id="demo-form" data-parsley-validate>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">LIBELLE</label>
                            <div class="col-sm-6">
                                <input type="text" placeholder="Required Field" required class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">DROITS</label>
                            <div class="col-sm-6">
                                <select multiple class="multi-select" name="">
                                    <option>Droit 1</option>
                                    <option>Droit 2</option>
                                    <option>Droit 3</option>
                                    <option>Droit 4</option>
                                    <option>Droit 5</option>
                                    <option>Droit 6</option>
                                    <option>Droit 7</option>
                                    <option>Droit 8</option>
                                    <option>Droit 9</option>
                                    <option>Droit 10</option>
                                    <option>Droit 11</option>
                                    <option>Droit 12</option>
                                    <option>Droit 13</option>
                                    <option>Droit 14</option>
                                    <option>Droit 15</option>
                                    <option>Droit 16</option>
                                    <option>Droit 17</option>
                                    <option>Droit 18</option>
                                    <option>Droit 19</option>
                                    <option>Droit 20</option>
                                    <option>Droit 21</option>
                                    <option>Droit 22</option>
                                    <option>Droit 23</option>
                                    <option>Droit 24</option>
                                    <option>Droit 25</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="bg-default content-box text-center pad20A mrg25T">
                    <button class="btn btn-lg btn-primary">VALIDER</button>
                    <button class="btn btn-lg btn-default">ANNULER</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection('contenu_page')

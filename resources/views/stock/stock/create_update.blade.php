@extends('layouts.stock')
@section('titre_contenu')
STOCKS
@endsection('titre_contenu')

@section('sous_titre_contenu')
CRéER UN STOCK
@endsection('sous_titre_contenu')

@section('contenu_page')
    <div class="panel">
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <form class="form-horizontal bordered-row" id="demo-form" data-parsley-validate>
                        <span id="items-index" hidden>0</span>
                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Désignation du stock</label>
                                <div class="col-sm-6">
                                    <input class="form-control" required placeholder="Saisir une designation pour le stock" type="text"/>
                                </div>
                            </div>
                        </fieldset>
                        <div class="bg-default content-box text-center pad20A mrg25T">
                            <button type="submit" class="btn btn-lg btn-primary">Valider</button>
                            <button type="reset" onclick="resetForm()" class="btn btn-lg btn-default">Effacer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function addItemRow()
        {
            var tbody = $("#items-form-group").find("tbody") ;
            tbody.append('@include('stock.commande.itemspart', ["index"=>9])') ;
        }

        function removeItemRow(index)
        {
            var row = "items-row-"+index ;
            $(row).fadeOut(200, function (e) {
                $(row).remove() ;
            }) ;
        }

        function resetForm()
        {
            $("#items-form-group").find("tbody").html('') ;
        }
    </script>
@endsection('page_content')
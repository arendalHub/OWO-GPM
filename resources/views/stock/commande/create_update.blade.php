@extends('layouts.stock')
@section('titre_contenu')
    COMMANDES
@endsection('titre_contenu')

@section('sous_titre_contenu')
    ENREGISTREMENT / MODIFICATION D'UNE COMMANDE
@endsection('sous_titre_contenu')

@section('contenu_page')
    <div class="panel">
        <div class="panel-body">
            @if(Session::has('error'))
                @include('stock.error', ['type'=>'warning', 'key'=>'error'])
            @endif
            <div class="row">
                <div class="col-lg-12">
                    <form method="post" action="{{url("/stock/commande/do_create_update")}}" class="form-horizontal bordered-row" id="demo-form" data-parsley-validate>
                        <span id="items-index" hidden>0</span>
                        <fieldset>
                            <legend>Fournisseur</legend>
                            <div class="form-group">
                                <select name="id_fournisseur" required class="form-control">
                                    <option></option>
                                    @if($fournisseurs != null && count($fournisseurs) > 0)
                                        @foreach($fournisseurs as $fournisseur)
{{--                                            @if($update && $fournisseur->id_fournisseur == $Fournisseur->id_fournisseur)--}}
{{--                                                <option selected value="{{$fournisseur->id_fournisseur}}">{{$fournisseur->designation_fournisseur}}</option>--}}
{{--                                            @endif--}}
                                            <option value="{{$fournisseur->id_fournisseur}}">{{$fournisseur->designation_fournisseur}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </fieldset>
                        @if($update){{$commande}}@endif
                        <fieldset>
                            <legend>Stock de destination</legend>
                            <div class="form-group">
                                <input class="form-control" value="" name="emplacement_stock" type="text"/>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Demande initiale</legend>
                            <button onclick="addItemRow()" type="button" class="btn btn-link" id="action-indicator">Ajouter un élément</button>
                            <div id="items-form-group">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td>Article</td>
                                            <td>Quantité</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </fieldset>
                        <div class="bg-default content-box text-center pad20A mrg25T">
                            <button type="submit" class="btn btn-lg btn-primary">Valider</button>
                            <button type="reset" onclick="resetForm()" class="btn btn-lg btn-default">Effacer</button>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function addItemRow()
        {
            var tbody = $("#items-form-group").find("tbody") ;
            $.ajax({
                url: '{{url("/stock/commande/itemspart")}}',
                dataType: 'HTML',
                method: 'GET'
            }).done(function (html)
            {
                tbody.append(html) ;
            }) .fail(function (xhr)
            {
                alert(xhr.responseText) ;
            }) ;
        }

        function removeItemRow(index)
        {
            $('#'+index).fadeOut(200, function (e) {
                $(this).remove() ;
            }) ;
        }

        function resetForm()
        {
            $("#items-form-group").find("tbody").html('') ;
        }
    </script>
@endsection('page_content')
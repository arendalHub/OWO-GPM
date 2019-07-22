{{-- Page principale de la gestion des stocks, affiche les stocks --}}
@extends('layouts.stock')
@section('titre_contenu')
LIVRAISON
@endsection('titre_contenu')

@section('sous_titre_contenu')
    ENREGISTREMENT
@endsection('sous_titre_contenu')

@section('contenu_page')
    <div class="panel">
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    @if($commandes != null && count($commandes) > 0)
                        <form class="form-horizontal bordered-row" id="demo-form" data-parsley-validate action="{{url("/stock/livraison/do_create_update")}}" method="POST">
                            @csrf
                            <span id="items-index" hidden>0</span>
                            <fieldset>
                                <legend>Reference de commande</legend>
                                <div class="form-group">
                                    @if($commandes != null && count($commandes)>0)
                                        <select required onchange="resetForm(); addItemRow(''+this.value)" name="id_commande" class="form-control">
                                            <option></option>
                                            @foreach($commandes as $commande)
                                                <option value="{{$commande->id_commande}}">cmd-{{$commande->id_commande}}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Produits livrés</legend>
                                {{--                            <button id="add_btn" type="button" class="btn btn-link" id="action-indicator">Ajouter un élément</button>--}}
                                <div id="items-form-group">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <td>Article</td>
                                            <td>Quantité</td>
                                            <td>Prix (XOF)</td>
                                            <td>Date de péremption</td>
                                            <td>Date de fabrication</td>
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
                        </form>
                    @else
                        <span class="text-center">Toutes vos commandes ont été livrées !</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function addItemRow(id_commande)
        {
            var tbody = $("#items-form-group").find("tbody") ;
            $.ajax({
                url: '{{url("/stock/livraison/items")}}/'+id_commande,
                dataType: 'HTML',
                method: 'GET'
            }).done(function (html)
            {
                tbody.append(html) ;
            }) .fail(function (xhr)
            {
                console.log(xhr.responseText) ;
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
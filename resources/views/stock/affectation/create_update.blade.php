@extends('layouts.stock')

@section('titre_contenu')
AFFECTATIONS
@endsection('titre_contenu')

@section('sous_titre_contenu')
ENREGISTREMENT D'UNE AFFECTATION
@endsection('sous_titre_contenu')

@section('contenu_page')
<div class="panel">
    <div class="panel-heading">
        @if(Session::has('error'))
            @include('stock.error', ['type'=>'warning', 'key'=>'error'])
        @endif
        @if(Session::has('message'))
            @include('stock.error', ['type'=>'info', 'key'=>'message'])
        @endif
        <a href="{{url('/stock/affectation/list')}}" class="btn btn-primary">Retour sur la liste</a>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12">
                <form method="post" action="{{url('/stock/affectation/do_create_update')}}" class="form-horizontal bordered-row" id="demo-form" data-parsley-validate>
                    <span id="items-index" hidden>0</span>
                    <fieldset>
                        <legend>Magasin</legend>
                        <div class="form-group">
                            <select name="id_magasin" required class="form-control">
                                @if($magasins != null && count($magasins) > 0)
                                    {{-- @if(!$update)
                                        <option value="X" selected>---</option>
                                    @endif --}}
                                    @foreach($magasins as $magasin)
                                        @if($update && $magasin->id_magasin == $magasin->id_magasin)
                                            <option selected value="{{$magasin->id_magasin}}">{{$magasin->libelle_magasin}}</option>
                                        @endif
                                        <option value="{{$magasin->id_magasin}}">{{$magasin->libelle_magasin}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </fieldset>
                    @if($update){{$affectation}}@endif
                    <fieldset>
                        <legend>Liste des articles</legend>
                        <button onclick="addItemRow()" type="button" class="btn btn-link" id="action-indicator">Ajouter un article</button>
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
    function addItemRow() {
        var tbody = $("#items-form-group").find("tbody");
        $.ajax({
            url: '{{url("/stock/affectation/itemspart")}}',
            dataType: 'HTML',
            method: 'GET'
        }).done(function(html) {
            tbody.append(html);
        }).fail(function(xhr) {
            alert(xhr.responseText);
        });
    }

    function removeItemRow(index) {
        $('#' + index).fadeOut(200, function(e) {
            $(this).remove();
        });
    }

    function resetForm() {
        $("#items-form-group").find("tbody").html('');
    }
</script>
@endsection('page_content')

@if($articles != null && count($articles) > 0)
    @foreach($articles as $article)
        @if($article->quantite > 0)
            <tr>
                <td>
                    <input required name="id_article-{{$article->id_article}}" hidden value="{{$article->id_article}}"/>
                    {{$article->designation_article}}
                </td>
                <td>
                    <input required
                           name="quantite-{{$article->id_article}}"
                           value="0"
                           type="number"
                           min="0"
                           max="{{$article->quantite}}"
                           title="Laissez à zéro si aucune quantité de produits n'est livrée !"
                           class="form-control"/>
                </td>
                <td>
                    <input required
                           name="prix_entree-{{$article->id_article}}"
                           id="prix_entree-{{$article->id_article}}"
                           type="number"
                           min="0"
                           value="0"
                           class="form-control"/>
                </td>
                <td>
                    <input required
                           name="prix_sortie-{{$article->id_article}}"
                           type="number"
                           min="0"
                           value="0"
                           class="form-control"/>
                </td>
                <td>
                    <input required name="date_peremption-{{$article->id_article}}" type="date" class="form-control"/>
                </td>
                <td>
                    <input required name="date_fabrication-{{$article->id_article}}" type="date" class="form-control"/>
                </td>
            </tr>
        @endif
    @endforeach
@endif

<script type="application/javascript">
    function writeBothPrixEntreeSortie(prix_entree_input_id, prix_sortie_input_id)
    {
        var prix_entree_input = document.getElementById(prix_entree_input_id) ;
        var prix_sortie_input = document.getElementById(prix_sortie_input_id) ;
        prix_entree_input.onkeydown = function () {
             prix_sortie_input.value = prix_entree_input.value ;
        } ;
    }
</script>
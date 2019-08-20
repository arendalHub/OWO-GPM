<tr id="item-row-{{$id}}">
    <td>
        <select required name="id_article-item-row-{{$id}}" class="form-control">
            @if($articles != null && count($articles) > 0)
                @foreach($articles as $article)
                    <option value="{{$article->id_article}}">{{$article->designation_article}}</option>
                @endforeach
            @endif
        </select>
    </td>
    <td>
        <input required name="quantite-item-row-{{$id}}" type="number" min="1" class="form-control"/>
    </td>
    <td>
        <button class="btn btn-warning" type="button" onclick="<?php echo "removeItemRow('item-row-{$id}')" ?>">
            supprimer
        </button>
    </td>
</tr>

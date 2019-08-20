
<div style="color: rgb(50,50,50); width: 60%; margin: auto;" class="panel">
    <div class="panel panel-heading">
        <div>
            <h2>Liste des articles</h2>
        </div>
    </div>
    <div class="panel-body">
        <div style="width: 100%" class="example-box-wrapper">
            <table style="color: rgb(50,50,50);border-collapse: collapse;">
                <thead>
                <tr>
                    <th style="border-bottom: 1px solid #ddd;padding:10px;height:30px;">Code article</th>
                    <th style="border-bottom: 1px solid #ddd;padding:10px;height:30px;">Désignation</th>
                    <th style="border-bottom: 1px solid #ddd;padding:10px;height:30px;">Famille</th>
                    <th style="border-bottom: 1px solid #ddd;padding:10px;height:30px;">Consommable</th>
                    <th style="border-bottom: 1px solid #ddd;padding:10px;height:30px;">Emplacement</th>
                </tr>
                </thead>
                <tbody>
                @if($items != null && count($items) > 0)
                    @foreach($items as $item)
                        <tr>
                            <td style="border-bottom: 1px solid #ddd;padding:15px;">
                                {{$item->code_article}}
                            </td>
                            <td style="border-bottom: 1px solid #ddd;padding:15px;">
                                {{$item->designation_article}}
                            </td>
                            <td style="border-bottom: 1px solid #ddd;padding:15px;">
                                {{$item->description_famille}}
                            </td>
                            <td style="border-bottom: 1px solid #ddd;padding:15px;">
                                @if($item->consommable == 0)
                                    Non
                                @else
                                    Oui
                                @endif
                            </td>
                            <td style="border-bottom: 1px solid #ddd;padding:15px;">
                                Étagère : {{$item->lib_etagere}} | Rangée : {{$item->lib_rangee}} | Box :
                                {{$item->lib_box}}
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="panel-footer">

    </div>
</div>

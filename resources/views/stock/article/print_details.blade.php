
<div style="color: rgb(50,50,50); width: 60%; margin: auto;" class="panel">
    <div class="panel panel-heading">

    </div>
    <div class="panel-body">
        <div style="width: 100%" class="example-box-wrapper">
            <div>
                <h2>Détails de l'article</h2>
            </div>
            <table style="color: rgb(50,50,50);border-collapse: collapse;">
                <thead>
                    <tr>
                        <th style="border-bottom: 1px solid #ddd;padding:10px;height:30px;">Code article</th>
                        <th style="border-bottom: 1px solid #ddd;padding:10px;height:30px;">Désignation</th>
                        <th style="border-bottom: 1px solid #ddd;padding:10px;height:30px;">Famille</th>
                        <th style="border-bottom: 1px solid #ddd;padding:10px;height:30px;">Consommable</th>
                        <th style="border-bottom: 1px solid #ddd;padding:10px;height:30px;">Prix d'achat</th>
                        <th style="border-bottom: 1px solid #ddd;padding:10px;height:30px;">Prix de vente</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;padding:15px;">
                            {{$article->code_article}}
                        </td>
                        <td style="border-bottom: 1px solid #ddd;padding:15px;">
                            {{$article->designation_article}}
                        </td>
                        <td style="border-bottom: 1px solid #ddd;padding:15px;">
                            {{$article->description_famille}}
                        </td>
                        <td style="border-bottom: 1px solid #ddd;padding:15px;">
                            @if($article->consommable == 0)
                                Non
                            @else
                                Oui
                            @endif
                        </td>
                        <td style="border-bottom: 1px solid #ddd;padding:15px;">
                            {{$article->prix_achat}}
                        </td>
                        <td style="border-bottom: 1px solid #ddd;padding:15px;">
                            {{$article->prix_vente}}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <br/>

        <div style="width: 100%" class="example-box-wrapper">
            <div>
                <h2>Empmacement de l'article</h2>
            </div>
            <table style="color: rgb(50,50,50);border-collapse: collapse;">
                <thead>
                    <tr>
                        <th style="border-bottom: 1px solid #ddd;padding:10px;height:30px;">Etagère</th>
                        <th style="border-bottom: 1px solid #ddd;padding:10px;height:30px;">Rangée</th>
                        <th style="border-bottom: 1px solid #ddd;padding:10px;height:30px;">Box</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;padding:15px;">
                            {{$emplacement->lib_etagere}}
                        </td>
                        <td style="border-bottom: 1px solid #ddd;padding:15px;">
                            {{$emplacement->lib_rangee}}
                        </td>
                        <td style="border-bottom: 1px solid #ddd;padding:15px;">
                            {{$emplacement->lib_box}}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="panel-footer">

    </div>
</div>

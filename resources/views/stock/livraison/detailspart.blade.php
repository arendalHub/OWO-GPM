
<div style="color: rgb(50,50,50); width: 60%; margin: auto;" class="panel">
    <div class="panel panel-heading">
        <div>
            <h2>Informations de livraison</h2>
            <p>
            <h3>Reference de commande : CMD-{{$livraison->id_commande}}</h3>
            <hr/>
            <h3>Date : {{$livraison->date_livraison}}</h3>
            <hr/>
            <h3>Fournisseur : {{$livraison->designation_fournisseur}}</h3>
            </p>
        </div>
        <br/>
        <div>
            <h2>Facturation</h2>
            <p>
            <h3>Numero de bordereau : {{$livraison->num_bordereau}}</h3>
            <hr/>
            <h3>Numero de la facture : {{$livraison->num_facture}}</h3>
            <hr/>
            <h3>Total de la livraison : {{$total}} FCFA</h3>
            </p>
        </div>
    </div>
    <div class="panel-body">
        <div style="width: 100%" class="example-box-wrapper">
            <table style="color: rgb(50,50,50);border-collapse: collapse;">
                <thead>
                <tr>
                    <th style="border-bottom: 1px solid #ddd;padding:10px;height:30px;">Article</th>
                    <th style="border-bottom: 1px solid #ddd;padding:10px;height:30px;">Quantite</th>
                    <th style="border-bottom: 1px solid #ddd;padding:10px;height:30px;">Prix (FCFA)</th>
                    <th style="border-bottom: 1px solid #ddd;padding:10px;height:30px;">Date de péremption</th>
                    <th style="border-bottom: 1px solid #ddd;padding:10px;height:30px;">Date de fabrication</th>
                </tr>
                </thead>
                <tbody>
                @if($articles != null && count($articles) > 0)
                    @foreach($articles as $article)
                        <tr>
                            <td style="border-bottom: 1px solid #ddd;padding:15px;">{{$article->designation_article}}</td>
                            <td style="border-bottom: 1px solid #ddd;padding:15px;">{{$article->quantite}}</td>
                            <td style="border-bottom: 1px solid #ddd;padding:15px;">{{$article->prix_entree}}</td>
                            <td style="border-bottom: 1px solid #ddd;padding:15px;">{{$article->date_peremption}}</td>
                            <td style="border-bottom: 1px solid #ddd;padding:15px;">{{$article->date_fabrication}}</td>
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

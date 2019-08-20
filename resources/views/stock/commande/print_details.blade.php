
<div style="color: rgb(50,50,50); width: 60%; margin: auto;" class="panel">
    <div class="panel panel-heading">
        <div>
            <h2>Détails d'une commande</h2>
            <p>
                <h3>Référence de commande : Cmd-{{$commande->id_commande}}</h3>
                <hr/>
                <h3>Date : {{$commande->date_commande}}</h3>
                <hr/>
                <h3>Fournisseur : {{$fournisseur->designation_fournisseur}}</h3>
            </p>
        </div>
    </div>
    <div class="panel-body">
        <div style="width: 100%" class="example-box-wrapper">
            <h2>Articles commandés</h2>
            <table style="color: rgb(50,50,50);border-collapse: collapse;">
                <thead>
                    <tr>
                        <th style="border-bottom: 1px solid #ddd;padding:10px;height:30px;">Désignation</th>
                        <th style="border-bottom: 1px solid #ddd;padding:10px;height:30px;">Prix unitaire</th>
                        <th style="border-bottom: 1px solid #ddd;padding:10px;height:30px;">Quantité</th>
                        <th style="border-bottom: 1px solid #ddd;padding:10px;height:30px;">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total=0; ?>
                    @if($articles != null && count($articles) > 0)
                        @foreach($articles as $article)
                            <tr>
                                <td style="border-bottom: 1px solid #ddd;padding:15px;">
                                    {{$article->design}}
                                </td>
                                <td style="border-bottom: 1px solid #ddd;padding:15px;">
                                    {{$article->prix}}
                                </td>
                                <td style="border-bottom: 1px solid #ddd;padding:15px;">
                                    {{$article->qtt}}
                                </td>
                                <td style="border-bottom: 1px solid #ddd;padding:15px;">
                                    <td>{{$article->prix * $article->qtt}}</td>
                                    <?php $total=$total+$article->prix * $article->qtt; ?>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
                <h3>Coût estimé de la commande: {{$total}} FCFA</h3>
        </div>
        <div style="width: 100%" class="example-box-wrapper">
            <h2>Livraisons reçues</h2>
            <table style="color: rgb(50,50,50);border-collapse: collapse;">
                <thead>
                    <tr>
                        <th>Référence de livraison</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @if($livraisons != null && count($livraisons) > 0)
                        @foreach($livraisons as $livraison)
                            <tr>
                                <td>
                                    Liv-{{$livraison->id_livraison}}
                                </td>
                                <td>
                                    {{$livraison->date_livraison}}
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

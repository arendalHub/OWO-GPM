<style type="text/css">
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 5mm;
    }

    #table tr {
        background-color: white;
        color: black
    }

    #table tr th {
        border: 1px solid #aaa;
        width: 14%;
        text-align: center;
        padding: 15px
    }

    #table tr td {
        border: 1px solid #aaa;
        width: 14%;
        text-align: center;
        text-decoration: blink;
        padding: 15px
    }

    h2 {
        font: normal 175% Arial, Helvetica, sans-serif;
        color: #008000;
        letter-spacing: -1px;
        margin: 0 0 10px 0;
        padding: 5px 0 0 0;
    }
</style>

<page backtop='45mm' footer="date;heure;page;">

    <page_header>
        <hr>
        <table align="center">
            <tr>
                <td style="width:20%">
                    <img src="images/photo_2019-08-21_06-43-23.jpg" {{-- height="100" width="100" --}}/>
                </td>
                <td style="width:60%; text-align:center;">
                    <h2> PLETHO SARL-U </h2>
                    <small>Nettoyage industriel</small>
                    <br>
                    <small>
                        26, Rue des Myosotis
                        Kodjoviakopé - 07 BP 12467
                        Lomé - Togo
                        Tel :
                            (+228) 22 22 34 53
                        Gsm :
                            (+228) 90 11 12 32
                            (+228) 93 25 81 85

                    </small>
                </td>
                <td style="width:20%">
                    <img src="images/photo_2019-08-21_06-43-23.jpg" {{-- height="100" width="100" --}}/>
                </td>
            </tr>
        </table>
        <hr>
        <br>
    </page_header>

    <page_footer>


    </page_footer>

    <div style="color: rgb(50,50,50); width: 60%; margin: auto;" class="panel">
        <div class="panel panel-heading">
            <div>
                <h3 align="center">Détails d'une commande</h3>
                <p>
                    <h4>Référence de commande : Cmd-{{$commande->id_commande}}</h4>
                    <hr/>
                    <h4>Date : {{$commande->date_commande}}</h4>
                    <hr/>
                    <h4>Fournisseur : {{$fournisseur->designation_fournisseur}}</h4>
                </p>
            </div>
        </div>
        <div class="panel-body">
            <div style="width: 100%" class="example-box-wrapper">
                <h4 align="center">Articles commandés</h4>
                <table id="table" margin-top style="font-size: 8px; width: all;" align="center">
                    <thead>
                        <tr>
                            <th style="width: unset;">Désignation</th>
                            <th style="width: unset;">Prix unitaire</th>
                            <th style="width: unset;">Quantité</th>
                            <th style="width: unset;">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total=0; $total_ligne=0; ?>
                        @if($articles != null && count($articles) > 0)
                            @foreach($articles as $article)
                                <tr>
                                    <td style="width: unset;">
                                        {{$article->design}}
                                    </td>
                                    <td style="width: unset;">
                                        {{$article->prix}}
                                    </td>
                                    <td style="width: unset;">
                                        {{$article->qtt}}
                                    </td>
                                    <td style="width: unset;">
                                        <?php $total_ligne = $article->prix * $article->qtt; ?>
                                        {{$total_ligne}}
                                        <?php $total=$total+$article->prix * $article->qtt; ?>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                    <h4>Coût estimé de la commande: {{$total}} FCFA</h4>
            </div>
            <div style="width: 100%" class="example-box-wrapper">
                <h4 align="center">Livraisons reçues</h4>
                <table id="table" margin-top style="font-size: 8px; width: all;" align="center">
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
</page>

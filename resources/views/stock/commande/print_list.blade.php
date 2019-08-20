
<div style="color: rgb(50,50,50); width: 60%; margin: auto;" class="panel">
        <div class="panel panel-heading">
            <div>
                <h2>Liste des commandes</h2>
            </div>
        </div>
        <div class="panel-body">
            <div style="width: 100%" class="example-box-wrapper">
                <table style="color: rgb(50,50,50);border-collapse: collapse;">
                    <thead>
                    <tr>
                        <th style="border-bottom: 1px solid #ddd;padding:10px;height:30px;">Référence</th>
                        <th style="border-bottom: 1px solid #ddd;padding:10px;height:30px;">Date</th>
                        <th style="border-bottom: 1px solid #ddd;padding:10px;height:30px;">Fournisseur</th>
                        <th style="border-bottom: 1px solid #ddd;padding:10px;height:30px;">Livrée</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($commandes != null && count($commandes) > 0)
                        @foreach($commandes as $commande)
                            <tr>
                                <td style="border-bottom: 1px solid #ddd;padding:15px;">
                                    CMD-{{$commande->id_commande}}
                                </td>
                                <td style="border-bottom: 1px solid #ddd;padding:15px;">
                                    {{$commande->date_commande}}
                                </td>
                                <td style="border-bottom: 1px solid #ddd;padding:15px;">
                                    {{$commande->designation_fournisseur}}
                                </td>
                                <td style="border-bottom: 1px solid #ddd;padding:15px;">
                                    @if($commande->livre == 0)
                                        Non
                                    @else
                                        Oui
                                    @endif
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

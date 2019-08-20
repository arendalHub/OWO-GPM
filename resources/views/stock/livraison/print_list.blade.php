
<div style="color: rgb(50,50,50); width: 60%; margin: auto;" class="panel">
    <div class="panel panel-heading">
        <div>
            <h2>Liste des livraisons</h2>
        </div>
    </div>
    <div class="panel-body">
        <div style="width: 100%" class="example-box-wrapper">
            <table style="color: rgb(50,50,50);border-collapse: collapse;">
                <thead>
                <tr>
                    <th style="border-bottom: 1px solid #ddd;padding:10px;height:30px;">Référence</th>
                    <th style="border-bottom: 1px solid #ddd;padding:10px;height:30px;">Date livraison</th>
                    <th style="border-bottom: 1px solid #ddd;padding:10px;height:30px;">Total livraison</th>
                </tr>
                </thead>
                <tbody>
                @if($livraisons != null && count($livraisons) > 0)
                    @foreach($livraisons as $livraison)
                        <tr>
                            <td style="border-bottom: 1px solid #ddd;padding:15px;">
                                Liv-{{$livraison->id_livraison}}
                            </td>
                            <td style="border-bottom: 1px solid #ddd;padding:15px;">
                                {{$livraison->date_livraison}}
                            </td>
                            <td style="border-bottom: 1px solid #ddd;padding:15px;">
                                {{$livraison->total_livraison}}
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


<div style="color: rgb(50,50,50); width: 60%; margin: auto;" class="panel">
        <div class="panel panel-heading">
            <div>
                <h2>Etat du stock</h2>
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
                        <th style="border-bottom: 1px solid #ddd;padding:10px;height:30px;">Quantité Stock</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($stocks != null && count($stocks) > 0)
                        @foreach($stocks as $stock)
                            <tr>
                                <td style="border-bottom: 1px solid #ddd;padding:15px;">
                                    {{$stock->code_article}}
                                </td>
                                <td style="border-bottom: 1px solid #ddd;padding:15px;">
                                    {{$stock->designation_article}}
                                </td>
                                <td style="border-bottom: 1px solid #ddd;padding:15px;">
                                    {{$stock->description_famille}}
                                </td>
                                <td style="border-bottom: 1px solid #ddd;padding:15px;">
                                    {{$stock->qt}}
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

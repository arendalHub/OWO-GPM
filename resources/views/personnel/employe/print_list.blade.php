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

        <h3 align="center">Liste des Employés</h3>

        <table id="table" margin-top style="font-size: 8px; width: all;" align="center">
            <thead>
            <tr>
                <th style="width: unset;">MATRICULE</th>
                <th style="width: unset;">NOM & PRENOM(S)</th>
                <th style="width: unset;">DATE & LIEU NAISSANCE</th>
                <th style="width: unset;">SEXE</th>
                <th style="width: unset;">TELEPHONE</th>
                <th style="width: unset;">ADRESSE</th>

            </tr>
            </thead>
            <tbody>
            @if($employes != null && count($employes) > 0)
                @foreach($employes as $employe)
                    <tr>
                        <td style="width: unset;">
                            {{$employe->matricule_employe}}
                        </td>
                        <td style="width: unset;">
                            {{$employe->nom_employe.' '.$employe->prenom_employe}}
                        </td>
                        <td style="width: unset;">
                            {{$employe->date_naiss_employe.' à '.$employe->lieu_naiss_employe}}
                        </td>
                        <td style="width: unset;">
                            {{$employe->sexe_employe}}
                        </td>
                        <td style="width: unset;">
                            {{$employe->num_tel_employe}}
                        </td>
                        <td style="width: unset;">
                            {{$employe->adresse_employe}}
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>

</page>

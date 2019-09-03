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

        <h3 align="center">Liste des utilisateurs</h3>

        <table id="table" margin-top style="font-size: 8px; width: all;" align="center">
            <thead>
            <tr>
                <th style="width: unset;">Nom & prénom(s)</th>
                <th style="width: unset;">Login</th>
                <th style="width: unset;">Poste</th>
                <th style="width: unset;">Service</th>
                <th style="width: unset;">Profil</th>
                <th style="width: unset;">Statut</th>
            </tr>
            </thead>
            <tbody>
            @if($utilisateurs != null && count($utilisateurs) > 0)
                @foreach($utilisateurs as $utilisateur)
                    <tr >
                        <td style="width: unset;">
                            {{$utilisateur->nom_utilisateur.' '.$utilisateur->prenom_utilisateur}}
                        </td>
                        <td style="width: unset;">
                            {{$utilisateur->login}}
                        </td>
                        <td style="width: unset;">
                            {{$utilisateur->poste_utilisateur}}
                        </td>
                        <td style="width: unset;">
                            {{$utilisateur->service_utilisateur}}
                        </td>
                        <td style="width: unset;">
                            {{$utilisateur->profil_temporaire}}
                        </td>
                        <td style="width: unset;">
                            @if ($utilisateur->actif == 1)
                                ACTIF
                            @else
                                DESACTIVÉ
                            @endif
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>

</page>

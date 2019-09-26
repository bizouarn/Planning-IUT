<!-- Auteur Aymeric Bizouarn -->
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device.width, initial-scale=1.0">
    <meta content='width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>
    <title>Planning</title>
    <link id="stylesheet" rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="image/iut-vannes2.png"/>
    <script src="script.js"></script>
</head>
<body>
<!-- loading page -->
<div id="loader" class="loader"></div>
<SCRIPT LANGUAGE="JavaScript">
    function chargement() {
        document.getElementById('loader').setAttribute("style", "display:none;");
    }
</SCRIPT>
</body>
<!-- page -->
<body id="body">
<?php
//link fichier contenant les fonction php
require("function.php");
//redirige par default vers planning 1A1
$ret = testDataPost();
if ($ret == false) {
    echo "<script>
           chargement();
    </script>";
}
?>
<div class=main>
    <div class="menu">
        <div class="menu-b" onclick="clickMenu();">
            <img class="menu-b" src="image/menu_toggle.png" alt="erreur de chargement">
        </div>
        <script>
            clickMenu();
        </script>
        <div class="noneP">
            <button class="semaine left" onclick="semaine(-1);">
                <
            </button>
            <button class="semaine center" onclick="semaine(0);">
                |
            </button>
            <button class="semaine right" onclick="semaine(1);">
                >
            </button>
        </div>
        <div id='titre'>
            <?php
            echo getGroup();
            ?>
        </div>
        <div id='day' class='noneP'>
            <?php
            //affichage mois - annee //menu sup
            echo getTitre();
            ?>
        </div>
        <div id="heure" class="noneP">
            <script type="text/javascript">
                heure();
            </script>
        </div>
    </div>
    <div class="contenu">
        <div id="menuL" style="display:none;">
            <center id="CmenuL">
                <br>
                <div class="borderM">
                    <h1>Sélection</h1>
                    <form class="principale">
                        <form method="get">
                            <div class="selectG">
                                <SELECT id="get6" name="dept" class="styled-select blue semi-square">
                                    <OPTION id="get5" style="display:none;">
                                        <script>
                                            SetSelect("get5", "dept");
                                        </script>
                                    </OPTION>
                                    <OPTION/>
                                    INFO
                                    <OPTION disabled/>
                                    GEA
                                    <OPTION/>
                                    STID
                                    <OPTION disabled/>
                                    TC
                                </SELECT>
                                <SELECT id="get3" name="annee" class="styled-select blue semi-square">
                                    <OPTION id="get1" style="display:none;">
                                        <script>
                                            SetSelect("get1", "annee");
                                        </script>
                                    </OPTION>
                                    <OPTION/>
                                    1
                                    <OPTION/>
                                    2
                                </SELECT>
                                <SELECT id="get4" name="group" class="styled-select blue semi-square"
                                        onclick="refreshMenu(true)" required onmouseover="refreshMenu(false)">
                                    <OPTION id="get2" style="display: none">
                                        <script>
                                            SetSelect("get2", "group");
                                        </script>
                                    </OPTION>
                                    <OPTION class="selectInfo"/>
                                    A1
                                    <OPTION class="selectInfo"/>
                                    A2
                                    <OPTION class="selectInfo"/>
                                    B1
                                    <OPTION class="selectInfo"/>
                                    B2
                                    <OPTION class="selectInfo"/>
                                    C1
                                    <OPTION class="selectInfo"/>
                                    C2
                                    <OPTION class="selectInfo"/>
                                    D1
                                    <OPTION class="selectInfo"/>
                                    D2
                                    <OPTION class="selectGea1"/>
                                    1
                                    <OPTION class="selectGea1"/>
                                    2
                                    <OPTION class="selectGea1"/>
                                    3
                                    <OPTION class="selectGea1"/>
                                    4
                                    <OPTION class="selectGea1"/>
                                    5
                                    <OPTION class="selectGea1"/>
                                    6
                                    <OPTION class="selectGea2"/>
                                    GCF A
                                    <OPTION class="selectGea2"/>
                                    GCF B
                                    <OPTION class="selectGea2"/>
                                    GCF C
                                    <OPTION class="selectGea2"/>
                                    GMO 1
                                    <OPTION class="selectGea2"/>
                                    GMO 2
                                    <OPTION class="selectGea2"/>
                                    GRH
                                    <OPTION class="selectTc1"/>
                                    1
                                    <OPTION class="selectTc1"/>
                                    2
                                    <OPTION class="selectTc1"/>
                                    3
                                    <OPTION class="selectTc1"/>
                                    4
                                </SELECT>
                            </div>
                            <button type="submit" class="styled-select blue semi-square">Valider</button>
                        </form>
                        <button onclick="SaveTab()" class="styled-select blue semi-square">Sauvegarder</button>
                        <br>
                        <br>
                    </form>
                </div>
                <div>
                    <!--<div>
                        <h1>Salle libre</h1>
                    </div>
                    <div>
                        <h2 style="width:80%;">
                            <?php
                    //affiche salle libre
                    echo getSalleLibre();
                    ?>
                        </h2>
                    </div>-->
                    <?php
                    include "config/data/actu.php";
                    ?>
                </div>
            </center>
        </div>
        <div id="grille">
            <div class="p-1 c-1"></div>
            <div class="p-1 c0">8h</div>
            <div class="p-1 c1">9h</div>
            <div class="p-1 c2">10h</div>
            <div class="p-1 c3">11h</div>
            <div class="p-1 c4">12h</div>
            <div class="midi">13h</div>
            <div class="p-1 c5">14h</div>
            <div class="p-1 c6">15h</div>
            <div class="p-1 c7">16h</div>
            <div class="p-1 c8">17h</div>
            <div class="p-1 c9">18h</div>
            <div class="p-1 c10"></div>
            <div class="border"></div>
            <?php affichage(); ?>
        </div>
    </div>
</div>
</body>
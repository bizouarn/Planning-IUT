<!-- rajouter le formatage automatique des date avec les annee bissextile (date("L") l'année est bissextile 1 si bissextile.) --!>
<!-- Auteur Aymeric Bizouarn -->
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device.width, initial-scale=1.0">
    <meta content='width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <title>Planning</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <?php
        //link fichier contenant les fonction php
        require("function.php");
        //redirige par default vers planning 1A1
        testDataPost();
    ?>
</head>
<body>
    <div class=main>
        <div class="menu">
            <div class="menu-b" onclick="clickMenu();">
                <img class="menu-b" src="menu_toggle.png" >
            </div>
            <script>
                clickMenu();
            </script>
            <div>
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
                        <h1>Séléction groupe</h1>
                        <form class="principale">
                            <form method="get">
                                <div class="selectG">
                                    <SELECT id="get3" name="annee" class="styled-select blue semi-square">
                                        <OPTION id="get1" style="display:none;">
                                            <script>
                                        SetSelect("get1","annee");
                                            </script>
                                        </OPTION>
                                        <OPTION/>1
                                        <OPTION/>2
                                    </SELECT>
                                    <SELECT id="get4" name="group" class="styled-select blue semi-square">
                                        <OPTION id="get2" style="display:none;">
                                            <script>
                                                SetSelect("get2","group");
                                            </script>
                                        </OPTION>
                                        <OPTION/>A1
                                        <OPTION/>A2
                                        <OPTION/>B1
                                        <OPTION/>B2
                                        <OPTION/>C1
                                        <OPTION/>C2
                                        <OPTION/>D1
                                        <OPTION/>D2
                                    </SELECT>    
                                </div>
                                <button type="submit" class="styled-select blue semi-square">Valider</button>
                            </form>
                            <br>
                            <button onclick="SaveTab()" class="styled-select blue semi-square">Sauvegarder</button>
                            <br>
                            <br>
                        </form>
                    </div>
                    <br>
                    <div class="borderM">
                        <div>
                            <h1>Salle libre</h1>
                        </div>
                        <div>
                            <h2 style="width:80%;">
                            <?php
                            //affiche salle libre
                                echo getSalleLibre();
                            ?>
                            </h2>
                        </div>
                    </div>
                    <br>
                    <div id="footer">© 2016 RYDIN Nathan and LUX Mathieu<br>© 2019 Aymeric Bizouarn All Rights Reserved</div>  
                </center>
            </div>
            <div id="grille">
                <div class="p-1 c-1"></div>
                <div class="p-1 c0" >8h</div>
                <div class="p-1 c1" >9h</div>
                <div class="p-1 c2" >10h</div>
                <div class="p-1 c3" >11h</div>
                <div class="p-1 c4" >12h</div>
                <div class="midi">13h</div>
                <div class="p-1 c5" >14h</div>
                <div class="p-1 c6" >15h</div>
                <div class="p-1 c7" >16h</div>
                <div class="p-1 c8" >17h</div>
                <div class="p-1 c9" >18h</div>
                <div class="p-1 c10" ></div>
                <div class="border" ></div>
                <?php affichage(); ?>
            </div>
        </div>
    </div>
</body>
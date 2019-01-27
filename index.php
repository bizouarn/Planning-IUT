<!-- Auteur Aymeric Bizouarn -->
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device.width, initial-scale=1.0">
    <title>Planning</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>
    <div id="base">
        <div id="menuL">
            <center>
                <form class="principale" method="get">
                        Sélection<br>
                        <div class="Fbleu">
                            <SELECT name="annee" class="styled-select blue semi-square">
                                <OPTION id="get1" style="display:none;">
                                    <script>
                                        SetSelect("get1","annee");
                                    </script>
                                </OPTION>
                                <OPTION/>1
                                <OPTION/>2
                            </SELECT>
                            <SELECT name="group" class="styled-select blue semi-square">
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
                    <br>
                    <br>
                    <div class="Fbleu">
                        salle libre
                        <div>
                            <?php 
                                $calendrier = file_get_contents('https://planning.univ-ubs.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?data=8241fc3873200214d31fc22145ae5a6cec380acd54f6ef25e1268055ef30541b9a26113b894fb6da29a910ab7215b887c302758449fbd53d8090dc208afc81e5136669d5d81b5e7ff495e3e8910fd4f00234b9d7b7225c8ea1274940c72ac622ccc019f28c3c7ac7d185f78efad292c1dad50f9fd694f7ca66ac3b5bb16186c9fa4f195065c394d2c620cd00283f4678fe6ab6da2293ad64ccf919b9001e989c65927d16c1d48c75726fb359153126e7d1bb95aa76bef7d8d0227a9394e52778fb6e940cb2d3a56888ba8c04e1d259f061540aba384fd665b32d4d8861081fe4aaa7c6ceb5591f3946551e502748cea27c5ae48e50baec33fa071546b18e95a20708d34c57a1da7a7750cf289ce6252e6bd86c85873e1c03b30d31395117d746e7f559b7bccd65af84d53637f997c2bbc0eedfac82f8d3b4da002bcfa505c0761a787b160c28c9a281387a2f046e602bdd2d76016b33c64a702ee0a972bd97defd66a78bd25745edf6150f206ca035a50f8fe6833571a4dc62da66decc7af531d58d0e49222e3438c9ecd866fc6c483b019a969a850bab1d3e80ce50c697a6cbdfec911fef26aa4301a92bd24b3ff5897adb757bc75e7989f8a8107660e456f83281813fc5508b8931158c3605c92f1b555888d70acd5cc474870aa232b90d7dc5b2f46281e2f62068482f72fa02eaa7722c6408a02313ba269e6232c8774b7ed07358d414703280a2af4afcdcd9ed9be971c9a61f4bd352a65d5e30d44e96a8e65f7b70e4ed7ec1728da241243ca80c473dd584ba796ed8f287e3b203dcea3ec25333f96991f10666eebe4cb3d7b137948aacbf38926fd37f0ddabcb03f08cb128c93bc4fcb6de69584c3bcdb178ee67ee5dd161cc423ab504cdf3c1acef8543cfd5b81b930e6b6cec0db97247709248af069ff1fd12df955944ed43e152021893c651df862915e9dacf760c9a92ce180bab4d2ceceb0fc');
                                $regExpMatch = '/SUMMARY:(.*)/';
                                $regExpDate = '/DTSTART:(.*)/';
                                $regExpLoc = '/LOCATION:(.*)/';
                                $regExpDesc = '/DESCRIPTION:(.*)/';
                                $regExpStamp = '/DTEND:(.*)/';
                                //vairable sale
                                $salleL["126"]="B126 ";
                                $salleL["141"]="B141 ";
                                $salleL["024"]="B024 ";
                                $salleL["029"]="B026 ";
                                $salleL["003"]="B003 ";
                                $salleL["005"]="B005 ";
                                $salleL["022"]="B022 ";
                                $salleL["028"]="B028 ";
                                $salleL["035"]="B035 ";
                                $salleL["037"]="B037 ";

                                // Varaible utile balise
                                $br='<br>';
                                // Variable info .ics
                                $n = preg_match_all($regExpMatch, $calendrier, $matchTableau, PREG_PATTERN_ORDER);
                                preg_match_all($regExpDate, $calendrier, $dateTableau, PREG_PATTERN_ORDER);
                                preg_match_all($regExpLoc, $calendrier, $locTableau, PREG_PATTERN_ORDER);
                                preg_match_all($regExpDesc, $calendrier, $descTableau, PREG_PATTERN_ORDER);
                                preg_match_all($regExpStamp, $calendrier, $StampTableau, PREG_PATTERN_ORDER);
                                for ($j=0 ; $j < $n ; ++$j){
                                    $annee = substr($dateTableau[0][$j], 8, 4);
                                    $mois = substr($dateTableau[0][$j], 12, 2);
                                    $jour = substr($dateTableau[0][$j], 14, 2);
                                    $heure = substr($dateTableau[0][$j], 17, 2)+1;
                                    $min = substr($dateTableau[0][$j], 19, 2);
                                    $match = substr($matchTableau[0][$j], 8);
                                    $loc = substr($locTableau[0][$j], 11);
                                    $desc = substr($descTableau[0][$j], 12);
                                    $temps1 = substr($StampTableau[0][$j], 15, 2)+1;
                                    $temps2 = substr($StampTableau[0][$j], 17, 2);
                                    if($heure<date("g")-1 && $temps1>date("g")-1 && $jour==date("d") && $mois==date("m")){
                                        $salleL[substr($loc,2,3)]="";
                                    }
                                }
                                echo implode("",$salleL);
                            ?>
                        </div>
                    </div>
                </form>    
            </center>
        </div>
        <div id="grille">
            <div height="100%" ></div>
            <div class="menu c-2">
                <div class="menu-b" onclick="clickMenu()">
                    <img class="menu-b" src="menu_toggle.png" >
                </div>
                <script>
                    clickMenu();
                </script>
                <div>
                    <?php
                        $group=$_GET["group"];
                        $annee=$_GET["annee"];
                        echo "planning : ".$annee.$group;
                    ?>
                </div>
                <div id="day" class="noneP">
                    <script type="text/javascript">        
                        date();
                    </script>
                </div>
                <div id="heure" class="noneP">
                    <script type="text/javascript">        
                    heure();
                    </script>
                </div>
            </div>
            <div class="p-1 c-1">
            </div>
            <div class="p-1 c0" >8h00</div>
            <div class="p-1 c1" >9h45</div>
            <div class="p-1 c2" >11h30</div>
            <div class="midi">13h00</div>
            <div class="p-1 c3" >14h00</div>
            <div class="p-1 c4" >15h45</div>
            <div class="p-1 c6" >17h15</div>
            <div class="border" ></div>
            <?php
            // Variable récuperer méthode GET
            $Dcontenu =array("vide","vide","vide","vide","vide","vide","vide");
            if(isset($_GET["group"])){
                $group=$_GET["group"];
            }
            else{
                $group="";
            }
            if(isset($_GET["annee"])){
                $annee=$_GET["annee"];
            }
            else{
                $annee="";
            }
            $promo=$annee.$group;

            if(isset($_GET["jD"])){
                $jD=$_GET["jD"];
            }
            else{
                $jD=0;
            }

            $tt = (date("d")+$jD); //date du jour
            if($tt>31){
                $tt=(date("d"));
            }
            if($_GET["annee"] === "1"){
                $calendrier = file_get_contents('https://planning.univ-ubs.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?data=8241fc38732002147feaa7994a14fb1e46e84f7c9b78e263799f3e18454a68d7f9e7187a83de3688b2feb32c6fb898ec6388e00a65894b9fae26dd6b71b817bb50b37189fa0b8d2bddf02cf567b7259696298c15bc4f3e24');}
            elseif($_GET["annee"] === "2"){
                $calendrier = file_get_contents('https://planning.univ-ubs.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?data=8241fc38732002143b1bc5c15e9c597333135e66642c0dd1c49517ea8b2cbd3c32cc6302479afc71919bff1d45be9ae8f3f538b5e4811620ae26dd6b71b817bb50b37189fa0b8d2bfd0da62a685d5ae129d569558fe3e2977ce7540d959896bb178a078aeae0784c6ad17ef2b6df6255a422892ae67c9785');} 
            else{
                echo "<meta http-equiv='refresh' content='0; URL=./?annee=1&group=A1'>";
            }
            // Variable type info .ics
            $regExpMatch = '/SUMMARY:(.*)/';
            $regExpDate = '/DTSTART:(.*)/';
            $regExpLoc = '/LOCATION:(.*)/';
            $regExpDesc = '/DESCRIPTION:(.*)/';
            $regExpStamp = '/DTEND:(.*)/';

            // Varaible utile balise
            $br='<br>';
            // Variable info .ics
            $n = preg_match_all($regExpMatch, $calendrier, $matchTableau, PREG_PATTERN_ORDER);
            preg_match_all($regExpDate, $calendrier, $dateTableau, PREG_PATTERN_ORDER);
            preg_match_all($regExpLoc, $calendrier, $locTableau, PREG_PATTERN_ORDER);
            preg_match_all($regExpDesc, $calendrier, $descTableau, PREG_PATTERN_ORDER);
            preg_match_all($regExpStamp, $calendrier, $StampTableau, PREG_PATTERN_ORDER);

            // Date du jour
            if($tt==date("d")){
                echo "<div class='p0 HASH noneP'></div>";
            }

            // Affichage cours
            for($d=0 ; $d < 7; ++$d){
                for ($j=0 ; $j < $n ; ++$j){
                    $pos = "p".$d.$j;
                    $div1='<div class=$pos id="box">';
                    // Récupération des données
                    $annee = substr($dateTableau[0][$j], 8, 4);
                    $mois = substr($dateTableau[0][$j], 12, 2);
                    $jour = substr($dateTableau[0][$j], 14, 2);
                    $heure = substr($dateTableau[0][$j], 17, 2)+1;
                    $min = substr($dateTableau[0][$j], 19, 2);
                    $match = substr($matchTableau[0][$j], 8);
                    $loc = substr($locTableau[0][$j], 11);
                    $desc = substr($descTableau[0][$j], 12);
                    $temps1 = substr($StampTableau[0][$j], 15, 2)+1;
                    $temps2 = substr($StampTableau[0][$j], 17, 2);

                    // si aucune info GET: sortir
                    if($promo==""){
                        break;
                    }

                    $descTab = explode("\\n",$desc);
                    // Mise en forme
                    $date = $jour."/".$mois."/".$annee;
                    $horaire = " ".$heure."h".$min."-".$temps1."h".$temps2;
                    $hor = $heure."-".$min;
                    //horaire 1h30
                    if($hor=="8-00"){
                        $c="0";
                    }
                    else if($hor=="9-45"){
                        $c="1";
                    }
                    else if($hor=="11-30"){
                        $c="2";
                    }
                    else if($hor=="14-00"){
                        $c="3";
                    }
                    else if($hor=="15-45" && $temps2==15){
                        $c="4";
                    }
                    else if($hor=="16-30"){
                        $c="5";
                    }
                    else if($hor=="17-15" && $temps2==45){
                        $c="6";
                    }
                    else if($hor=="17-30"){
                        $c="6";
                    }
                    //horaire 45min
                    else if($hor=="17-15" && $temps2==00){
                        $c="6-2";
                    }
                    else if($hor=="15-45" && $temps2==30){
                        $c="4-2";
                    }
                    else{
                        $c="-";
                    }
                //couleur case
                    $typeCase = "NUL";
                    if(strpos($match,"CM")){
                        $typeCase = "CM";
                    }
                    if(strpos($match,"TD")){
                        $typeCase = "TD";
                    }
                    if(strpos($match,"TP")){
                        $typeCase = "TP";
                    }
                //affichage selon le groupe
                    if(($jour==$tt+$d && $mois==date("m") && $tt+$d!=date("d") )||($jour==$tt+$d && $mois==date("m") && $heure>date("H")-1)){
                        //si jour vide (ne pas afficher sur portable)
                        if($jour==$tt+$d){
                            $Dcontenu[$d] = "";
                        }
                        // affichage cours
                        if(strpos($match,"Gr")){
                            // si juste le groupe indiqué
                            if(strpos($match,$group)){
                                echo "<div id='box' class='p".$d." c".$c." ".$typeCase." noneP'>";
                                echo $match.$br.$horaire."  ".$loc.$br;
                                echo $descTab[2];
                                echo "</div>";
                                echo "<div id='boxP' class='p".$d." c".$c." ".$typeCase." nonePC' style='grid-row: ".($d+1)."0".($c+1).";grid-column:2;'>";
                                echo $match.$br.$horaire."  ".$loc.$br;
                                echo $descTab[2];
                                echo "</div>";   
                            }
                            // si juste la lettre du groupe indiqué
                            if(strpos($match,"Gr ".substr($group,0,1)) &&
                               strpos($match,"Gr ".substr($group,0,1)."1")==false &&
                               strpos($match,"Gr ".substr($group,0,1)."2")==false
                              ){
                                echo "<div id='box' class='p".$d." c".$c." ".$typeCase." noneP'>";
                                echo $match.$br.$horaire."  ".$loc.$br;
                                echo $descTab[2];
                                echo "</div>";
                                echo "<div id='boxP' class='p".$d." c".$c." ".$typeCase." nonePC' style='grid-row: ".($d+1)."0".($c+1).";grid-column:2;'>";
                                echo $match.$br.$horaire."  ".$loc.$br;
                                echo $descTab[2];
                                echo "</div>";  
                            }
                        }
                        // si aucun groupe indiqué
                        if(strpos($match,"Gr")== FALSE){
                            echo "<div id='box' class='p".$d." c".$c." ".$typeCase." noneP'>";
                            echo $match.$br.$horaire."  ".$loc.$br;
                            echo $descTab[2];
                            echo "</div>";
                            echo "<div id='boxP' class='p".$d." c".$c." ".$typeCase." nonePC' style='grid-row: ".($d+1)."0".($c+1).";grid-column:2;'>";
                            echo $match.$br.$horaire."  ".$loc.$br;
                            echo $descTab[2];
                            echo "</div>";
                        }
                    }
                }
            }
            ?>
            <?php
            //afichage date du jour
            $moisG=date('m');
            $jour=$tt;
            $timestamp = mktime(0, 0, 0, $moisG, $jour, $annee);
            $jourC = date('D', $timestamp);
            $moisG = date('m', $timestamp);
            $jour = date('d', $timestamp);
            $jourL["Mon"]="Lundi";
            $jourL["Tue"]="mardi";
            $jourL["Wed"]="mercredi";
            $jourL["Thu"]="jeudi";
            $jourL["Fri"]="Vendredi";
            $jourL["Sat"]="Samedi";
            $jourL["Sun"]="Dimanche";
            $moisL["01"]="Janvier";
            $moisL["02"]="Février";
            $moisL["03"]="Mars";
            $moisL["04"]="Avril";
            $moisL["05"]="Mai";
            $moisL["06"]="Juin";
            $moisL["07"]="Juillet";
            $moisL["08"]="Août";
            $moisL["09"]="Septembre";
            $moisL["10"]="Octobre";
            $moisL["11"]="Novembre";
            $moisL["12"]="Décembre";
            for($d=0 ; $d < 7; ++$d){
                echo "<div class='p".$d." c-1 noneP ".$Dcontenu[$d]."'>".$jourL[$jourC].' '.$tt.' '.$moisL[$moisG]."</div>";
                echo "<div class='p".$d." c-1 ".$Dcontenu[$d]." nonePC' style='grid-row: ".($d+1)."00;grid-column:2;'>".$jourL[$jourC].' '.$tt.' '.$moisL[$moisG]."</div>";
                $tt = $tt+1;
                $jour=$tt;
                $timestamp = mktime(0, 0, 0, $moisG, $jour, $annee);
                $jourC = date('D', $timestamp);
                $moisG = date('m', $timestamp);
                if($moisG==2 && $jour>28){
                    $tt=1;
                }
                if($moisG%2==0 && $jour>30){
                    $tt=1;
                }
                if($jour>31){
                    $tt=1;
                }
                if($jour>31){
                    $tt=1;
                }
            }
            ?>
        </div>
    </div>
</body>
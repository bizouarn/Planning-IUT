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
    <div id="grille">
        <div class="menu c-2">
            <form method="get">    
                Promo :
                <SELECT name="annee" class="styled-select blue semi-square">
                    <OPTION/>1
                    <OPTION/>2
                </SELECT>
                <SELECT name="group" class="styled-select blue semi-square">
                    <OPTION/>A1
                    <OPTION/>A2
                    <OPTION/>B1
                    <OPTION/>B2
                    <OPTION/>C1
                    <OPTION/>C2
                    <OPTION/>D1
                    <OPTION/>D2
                </SELECT>
                <button type="submit" class="styled-select blue semi-square">></button>
            </form>
            <div id="day" class="noneP">
                <script type="text/javascript">        
                    date();
                </script>
            </div>
            <div id="heure">
                <script type="text/javascript">        
                heure();
                </script>
            </div>
        </div>
        <div class="midi">13h00<br>14h00</div>
        <div class="p-1 c-1"></div>
        <div class="p-1 c0" >8h00</div>
        <div class="p-1 c1" >9h45</div>
        <div class="p-1 c2" >11h30</div>
        <div class="p-1 c3" >14h00</div>
        <div class="p-1 c4" >15h45</div>
        <div class="p-1 c6" >17h15</div>
        <div class="border" ></div>
        <?php
        // Variable récuperer méthode GET
        $Dcontenu =array("noneP","noneP","noneP","noneP","noneP","noneP","noneP");
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
                            echo "<div id='box' class='p".$d." c".$c." ".$typeCase."'>";
                            echo $match.$br.$horaire."  ".$loc.$br;
                            echo $descTab[2];
                            echo "</div>";     
                        }
                        // si juste la lettre du groupe indiqué
                        if(strpos($match,"Gr ".substr($group,0,1)) &&
                           strpos($match,"Gr ".substr($group,0,1)."1")==false &&
                           strpos($match,"Gr ".substr($group,0,1)."2")==false
                          ){
                            echo "<div id='box' class='p".$d." c".$c." ".$typeCase."'>";
                            echo $match.$br.$horaire."  ".$loc.$br;
                            echo $descTab[2];
                            echo "</div>";     
                        }
                    }
                    // si aucun groupe indiqué
                    if(strpos($match,"Gr")== FALSE){
                        echo "<div id='box' class='p".$d." c".$c." ".$typeCase."'>";
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
            echo "<div class='p".$d." c-1 ".$Dcontenu[$d]."'>".$jourL[$jourC].' '.$tt.' '.$moisL[$moisG]."</div>";
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
</body>
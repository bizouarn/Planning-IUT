<!-- autheur Aymeric Bizouarn -->
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Terminal</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="./index.php" method="get">
                    <SELECT name="group" size="1">
                        <OPTION/>A1
                        <OPTION/>A2
                        <OPTION/>B1
                        <OPTION/>B2
                        <OPTION/>C1
                        <OPTION/>C2
                        <OPTION/>D1
                        <OPTION/>D2
                    </SELECT>
                    <SELECT name="annee" size="1">
                        <OPTION/>1
                        <OPTION/>2
                    </SELECT>
                    <button type="submit">choisir</button>
    </form>
    <div id="grille">
        <div class="p0 HASH noneP"></div>
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
        $Dcontenu ="noneP";
        $group=$_GET["group"];
        if($_GET["annee"] === "1"){
            $calendrier = file_get_contents('https://planning.univ-ubs.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?data=8241fc38732002147feaa7994a14fb1e46e84f7c9b78e263799f3e18454a68d7f9e7187a83de3688b2feb32c6fb898ec6388e00a65894b9fae26dd6b71b817bb50b37189fa0b8d2bddf02cf567b7259696298c15bc4f3e24');}
        elseif($_GET["annee"] === "2"){
            $calendrier = file_get_contents('https://planning.univ-ubs.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?data=8241fc38732002143b1bc5c15e9c597333135e66642c0dd1c49517ea8b2cbd3c32cc6302479afc71919bff1d45be9ae8f3f538b5e4811620ae26dd6b71b817bb50b37189fa0b8d2bfd0da62a685d5ae129d569558fe3e297bf5d2247571e81da178a078aeae0784c0749c01ddfb19be2cd705b9933add630');} 
        
        //variable type info .ics
        $regExpMatch = '/SUMMARY:(.*)/';
        $regExpDate = '/DTSTART:(.*)/';
        $regExpLoc = '/LOCATION:(.*)/';
        $regExpDesc = '/DESCRIPTION:(.*)/';
        $regExpStamp = '/DTEND:(.*)/';
        
        //varaible utile balise
        $br='<br>';
        //variable info .ics
        $n = preg_match_all($regExpMatch, $calendrier, $matchTableau, PREG_PATTERN_ORDER);
        preg_match_all($regExpDate, $calendrier, $dateTableau, PREG_PATTERN_ORDER);
        preg_match_all($regExpLoc, $calendrier, $locTableau, PREG_PATTERN_ORDER);
        preg_match_all($regExpDesc, $calendrier, $descTableau, PREG_PATTERN_ORDER);
        preg_match_all($regExpStamp, $calendrier, $StampTableau, PREG_PATTERN_ORDER);

        $tt = (date("d"));
        //affichage cours
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

                $descTab = explode("\\n",$desc);
                // Mise en forme
                $date = $jour."/".$mois."/".$annee;
                $horaire = " ".$heure."h".$min."-".$temps1."h".$temps2;
                $hor = $heure."-".$min;
                //list($compet, $rang, $tv) = explode("-",$desc);
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
                //group D
                if(($jour==$tt+$d && $mois==date("m") && $d!=0)||($jour==$tt+$d && $mois==date("m") && $heure>date("H"))){
                    if($jour==$tt){
                        $Dcontenu = "";
                    }
                    if($group == "D1" && (strpos($match,"Gr D") || strpos($match,"Gr D1") || strpos($match,"CM")) && strpos($match,"Gr D2")== FALSE){
                        echo "<div id='box' class='p".$d." c".$c." ".$typeCase."'>";
                        echo $match.$br.$horaire."  ".$loc.$br;
                        echo $descTab[2];
                        echo "</div>";
                    }
                    if($group == "D2" && (strpos($match,"Gr D") || strpos($match,"Gr D2") || strpos($match,"CM")) && strpos($match,"Gr D1")== FALSE){
                        echo "<div id='box' class='p".$d." c".$c." ".$typeCase."'>";
                        echo $match.$br.$horaire."  ".$loc.$br;
                        echo $descTab[2];
                        echo "</div>";
                    }
                    // c
                    if($group == "C1" && (strpos($match,"Gr C") || strpos($match,"Gr C1") || strpos($match,"CM")) && strpos($match,"Gr C2")== FALSE){
                        echo "<div id='box' class='p".$d." c".$c." ".$typeCase."'>";
                        echo $match.$br.$horaire."  ".$loc.$br;
                        echo $descTab[2];
                        echo "</div>";
                    }
                    if($group == "C2" && (strpos($match,"Gr C") || strpos($match,"Gr C2") || strpos($match,"CM")) && strpos($match,"Gr C1")== FALSE){
                        echo "<div id='box' class='p".$d." c".$c." ".$typeCase."'>";
                        echo $match.$br.$horaire."  ".$loc.$br;
                        echo $descTab[2];
                        echo "</div>";
                    }
                    // b
                    if($group == "B1" && (strpos($match,"Gr B") || strpos($match,"Gr B1") || strpos($match,"CM")) && strpos($match,"Gr B2")== FALSE){
                        echo "<div id='box' class='p".$d." c".$c." ".$typeCase."'>";
                        echo $match.$br.$horaire."  ".$loc.$br;
                        echo $descTab[2];
                        echo "</div>";
                    }
                    if($group == "B2" && (strpos($match,"Gr B") || strpos($match,"Gr B2") || strpos($match,"CM")) && strpos($match,"Gr B1")== FALSE){
                        echo "<div id='box' class='p".$d." c".$c." ".$typeCase."'>";
                        echo $match.$br.$horaire."  ".$loc.$br;
                        echo $descTab[2];
                        echo "</div>";
                    }
                    // a
                    if($group == "A1" && (strpos($match,"Gr A") || strpos($match,"Gr A1")!== FALSE || strpos($match,"CM")) && strpos($match,"Gr A2")== FALSE){
                        echo "<div id='box' class='p".$d." c".$c." ".$typeCase."'>";
                        echo $match.$br.$horaire."  ".$loc.$br;
                        echo $descTab[2];
                        echo "</div>";
                    }
                    if($group == "A2" && (strpos($match,"Gr A")!== FALSE || strpos($match,"Gr A2")!== FALSE || strpos($match,"CM")!== FALSE) && strpos($match,"Gr A1")== FALSE){
                        echo "<div id='box' class='p".$d." c".$c." ".$typeCase."'>";
                        echo $match.$br.$horaire."  ".$loc.$br;
                        echo $descTab[2];
                        echo "</div>";
                    }
                }
            }
        }
        //afichage date du jour
        echo "<div id='box' class='p0 c-1 ".$Dcontenu."'>".$tt.'/'.$mois.'/'.$annee."</div>";
        $tt = $tt+1;
        echo "<div id='box' class='p1 c-1'>".$tt.'/'.$mois.'/'.$annee."</div>";
        $tt = $tt+1;
        echo "<div id='box' class='p2 c-1'>".$tt.'/'.$mois.'/'.$annee."</div>";
        $tt = $tt+1;
        echo "<div id='box' class='p3 c-1'>".$tt.'/'.$mois.'/'.$annee."</div>";
        $tt = $tt+1;
        echo "<div id='box' class='p4 c-1'>".$tt.'/'.$mois.'/'.$annee."</div>";
        ?>
    </div>
</body>
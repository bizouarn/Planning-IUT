<?php
//sous-function
function getcalendar($promo)
{
    // récupération des calendrier
    if ($promo != null) {
        //test d'éxistance de fichier .ics en local sur le serveur et test de connexion avec le serveur de l'UBS.
        if (file_exists("ics/$promo.ics") && ((date("F d Y H i", filemtime("ics/$promo.ics")) == date("F d Y H i"))) || !$sock = @fsockopen('https://planning.univ-ubs.fr/ade/index.jsp', 80)) {
            $calendrier = file_get_contents("ics/$promo.ics");
        }
        if ($promo == "INFO1A1") {
            $calendrier = file_get_contents('https://planning.univ-ubs.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?data=8241fc3873200214628e9ee67d520db5e0fa50826f0818af4a82a8fde6ce3f14906f45af276f59ae8fac93f781e86152aa9968683a1f1049521e5a8e68029dc8c2973627c2eb073b470ee97407c72c318d3f4109b6629391');
        } elseif ($promo == "INFO1A2") {
            $calendrier = file_get_contents('https://planning.univ-ubs.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?data=8241fc387320021444b2068d37814033e0fa50826f0818af4a82a8fde6ce3f14906f45af276f59ae8fac93f781e86152aa9968683a1f1049521e5a8e68029dc8c2973627c2eb073b470ee97407c72c318d3f4109b6629391');
        } elseif ($promo == "INFO1B1") {
            $calendrier = file_get_contents('https://planning.univ-ubs.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?data=8241fc3873200214e3b4fdf609d53024e0fa50826f0818af4a82a8fde6ce3f14906f45af276f59ae8fac93f781e86152aa9968683a1f1049521e5a8e68029dc8c2973627c2eb073b470ee97407c72c318d3f4109b6629391');
        } elseif ($promo == "INFO1B2") {
            $calendrier = file_get_contents('https://planning.univ-ubs.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?data=8241fc3873200214e7816c0755e34543e0fa50826f0818af4a82a8fde6ce3f14906f45af276f59ae8fac93f781e86152aa9968683a1f1049521e5a8e68029dc8c2973627c2eb073b470ee97407c72c318d3f4109b6629391');
        } elseif ($promo == "INFO1C1") {
            $calendrier = file_get_contents('https://planning.univ-ubs.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?data=8241fc387320021473110dcf0fad1631e0fa50826f0818af4a82a8fde6ce3f14906f45af276f59ae8fac93f781e86152aa9968683a1f1049521e5a8e68029dc8c2973627c2eb073b470ee97407c72c318d3f4109b6629391');
        } elseif ($promo == "INFO1C2") {
            $calendrier = file_get_contents('https://planning.univ-ubs.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?data=8241fc38732002148ac4e83c0ad230abe0fa50826f0818af4a82a8fde6ce3f14906f45af276f59ae8fac93f781e86152aa9968683a1f1049521e5a8e68029dc8c2973627c2eb073b470ee97407c72c318d3f4109b6629391');
        } elseif ($promo == "INFO1D1") {
            $calendrier = file_get_contents('https://planning.univ-ubs.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?data=8241fc3873200214d5d9f8710563f588e0fa50826f0818af4a82a8fde6ce3f14906f45af276f59ae8fac93f781e86152aa9968683a1f1049521e5a8e68029dc8c2973627c2eb073b470ee97407c72c318d3f4109b6629391');
        } elseif ($promo == "INFO1D2") {
            $calendrier = file_get_contents('https://planning.univ-ubs.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?data=8241fc3873200214c281cf3d512a92b6e0fa50826f0818af4a82a8fde6ce3f14906f45af276f59ae8fac93f781e86152aa9968683a1f1049521e5a8e68029dc8c2973627c2eb073b3ed16e4ed8dfec978d3f4109b6629391');
        } elseif ($promo == "INFO2A1") {
            $calendrier = file_get_contents('https://planning.univ-ubs.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?data=8241fc38732002140684f27d200af967e0fa50826f0818af4a82a8fde6ce3f14906f45af276f59ae8fac93f781e86152b71afa816f3244e10b0fe1de1a6826fac2973627c2eb073b7d67a8d3d7529c488d3f4109b6629391');
        } elseif ($promo == "INFO2A2") {
            $calendrier = file_get_contents('https://planning.univ-ubs.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?data=8241fc3873200214fa1b59eb843d4b74e0fa50826f0818af4a82a8fde6ce3f14906f45af276f59ae8fac93f781e86152b71afa816f3244e10b0fe1de1a6826fac2973627c2eb073b41b114e94beae6fd8d3f4109b6629391');
        } elseif ($promo == "INFO2B1") {
            $calendrier = file_get_contents('https://planning.univ-ubs.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?data=8241fc38732002140c58e1ebb26d9256e0fa50826f0818af4a82a8fde6ce3f14906f45af276f59ae8fac93f781e86152b71afa816f3244e10b0fe1de1a6826fac2973627c2eb073b41b114e94beae6fd8d3f4109b6629391');
        } elseif ($promo == "INFO2B2") {
            $calendrier = file_get_contents('https://planning.univ-ubs.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?data=8241fc387320021424d4a82d60d96e19e0fa50826f0818af4a82a8fde6ce3f14906f45af276f59ae8fac93f781e861527a3ef22c78080a024b2c2a9e21a084f7c2973627c2eb073b41b114e94beae6fd8d3f4109b6629391');
        } elseif ($promo == "INFO2C1") {
            $calendrier = file_get_contents('https://planning.univ-ubs.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?data=8241fc3873200214d1a70d2981c233ffe0fa50826f0818af4a82a8fde6ce3f14906f45af276f59ae8fac93f781e86152b71afa816f3244e10b0fe1de1a6826fac2973627c2eb073bc6ba595ea089297d8d3f4109b6629391');
        } elseif ($promo == "INFO2C2") {
            $calendrier = file_get_contents('https://planning.univ-ubs.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?data=8241fc38732002145adfee73768645fce0fa50826f0818af4a82a8fde6ce3f14906f45af276f59ae8fac93f781e86152aa9968683a1f10494dd6499be9816867c2973627c2eb073b2fc65f66ad58a8f38d3f4109b6629391');
        } elseif ($promo == "INFO2D1") {
            $calendrier = file_get_contents('https://planning.univ-ubs.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?data=8241fc38732002141882cdcc4853ac78e0fa50826f0818af4a82a8fde6ce3f14906f45af276f59ae8fac93f781e86152b71afa816f3244e10b0fe1de1a6826fac2973627c2eb073b8f877ce5c4fd7da98d3f4109b6629391');
        } elseif ($promo == "INFO2D2") {
            $calendrier = file_get_contents('https://planning.univ-ubs.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?data=8241fc3873200214c6b88e35ecb85deae0fa50826f0818af4a82a8fde6ce3f14906f45af276f59ae8fac93f781e86152aa9968683a1f104970d3221b992403bec2973627c2eb073b227604b07387181d8d3f4109b6629391');
        } elseif ($promo == "STID1A1") {
            $calendrier = file_get_contents('https://planning.univ-ubs.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?data=8241fc38732002145da68ee7d4257b29e0fa50826f0818af4a82a8fde6ce3f14906f45af276f59ae8fac93f781e86152aa9968683a1f10494dd6499be9816867c2973627c2eb073b43b00c8d695a723a8d3f4109b6629391');
        } elseif ($promo == "STID1A2") {
            $calendrier = file_get_contents('https://planning.univ-ubs.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?data=8241fc3873200214b8ac04389650e78ae0fa50826f0818af4a82a8fde6ce3f14906f45af276f59ae8fac93f781e86152aa9968683a1f10494dd6499be9816867c2973627c2eb073bbc769bd960c176308d3f4109b6629391');
        } elseif ($promo == "STID1B1") {
            $calendrier = file_get_contents('https://planning.univ-ubs.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?data=8241fc387320021483c4463655706235e0fa50826f0818af4a82a8fde6ce3f14906f45af276f59ae8fac93f781e86152aa9968683a1f10494dd6499be9816867c2973627c2eb073b4891ad86ad6ff2588d3f4109b6629391');
        } elseif ($promo == "STID1B2") {
            $calendrier = file_get_contents('https://planning.univ-ubs.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?data=8241fc38732002149788dc11087ed4d9e0fa50826f0818af4a82a8fde6ce3f14906f45af276f59ae8fac93f781e86152aa9968683a1f10494dd6499be9816867c2973627c2eb073b43b00c8d695a723a8d3f4109b6629391');
        } elseif ($promo == "STID1C1") {
            $calendrier = file_get_contents('https://planning.univ-ubs.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?data=8241fc3873200214ce0cccd402da1eb9e0fa50826f0818af4a82a8fde6ce3f14906f45af276f59ae8fac93f781e86152aa9968683a1f10494dd6499be9816867c2973627c2eb073b43b00c8d695a723a8d3f4109b6629391');
        } elseif ($promo == "STID1C2") {
            $calendrier = file_get_contents('https://planning.univ-ubs.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?data=8241fc38732002145ada2d6f3881e90ce0fa50826f0818af4a82a8fde6ce3f14906f45af276f59ae8fac93f781e86152aa9968683a1f104985a0a3f75ee8b61ec2973627c2eb073b43b00c8d695a723a8d3f4109b6629391');
        } elseif ($promo == "STID1D1") {
            $calendrier = file_get_contents('https://planning.univ-ubs.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?data=8241fc3873200214360f760adfbc4532e0fa50826f0818af4a82a8fde6ce3f14906f45af276f59ae8fac93f781e86152aa9968683a1f10494dd6499be9816867c2973627c2eb073b66222c8f246217518d3f4109b6629391');
        } elseif ($promo == "STID1D2") {
            $calendrier = file_get_contents('https://planning.univ-ubs.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?data=8241fc3873200214f9d8178d7226cbb6e0fa50826f0818af4a82a8fde6ce3f14906f45af276f59ae8fac93f781e86152aa9968683a1f10494dd6499be9816867c2973627c2eb073b43b00c8d695a723a8d3f4109b6629391');
        } elseif ($promo == "STID2A1") {
            $calendrier = file_get_contents('https://planning.univ-ubs.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?data=8241fc387320021482c99d1b8992f943e0fa50826f0818af4a82a8fde6ce3f14906f45af276f59ae8fac93f781e86152aa9968683a1f10494dd6499be9816867c2973627c2eb073b43b00c8d695a723a8d3f4109b6629391');
        } elseif ($promo == "STID2A2") {
            $calendrier = file_get_contents('https://planning.univ-ubs.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?data=8241fc3873200214faa72bb69efce0e5e0fa50826f0818af4a82a8fde6ce3f14906f45af276f59ae8fac93f781e86152aa9968683a1f10494dd6499be9816867c2973627c2eb073b43b00c8d695a723a8d3f4109b6629391');
        } elseif ($promo == "STID2B1") {
            $calendrier = file_get_contents('https://planning.univ-ubs.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?data=8241fc38732002149707a6deed1a5036e0fa50826f0818af4a82a8fde6ce3f14906f45af276f59ae8fac93f781e86152aa9968683a1f10494dd6499be9816867c2973627c2eb073b43b00c8d695a723a8d3f4109b6629391');
        } elseif ($promo == "STID2B2") {
            $calendrier = file_get_contents('https://planning.univ-ubs.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?data=8241fc3873200214bc7f4043bcc092cce0fa50826f0818af4a82a8fde6ce3f14906f45af276f59ae8fac93f781e86152aa9968683a1f10494dd6499be9816867c2973627c2eb073b43b00c8d695a723a8d3f4109b6629391');
        } elseif ($promo == "STID2C1") {
            $calendrier = file_get_contents('https://planning.univ-ubs.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?data=8241fc3873200214b98dfdf1734b91c4e0fa50826f0818af4a82a8fde6ce3f14906f45af276f59ae8fac93f781e86152aa9968683a1f10494dd6499be9816867c2973627c2eb073b43b00c8d695a723a8d3f4109b6629391');
        } elseif ($promo == "STID2C2") {
            $calendrier = file_get_contents('https://planning.univ-ubs.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?data=8241fc3873200214176c7313597420a1e0fa50826f0818af4a82a8fde6ce3f14906f45af276f59ae8fac93f781e86152aa9968683a1f10494dd6499be9816867c2973627c2eb073b43b00c8d695a723a8d3f4109b6629391');
        } elseif ($promo == "STID2D1") {
            $calendrier = file_get_contents('https://planning.univ-ubs.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?data=8241fc38732002149b4a7395d720c451324cfcf2e9e6b4356213d7c347ee7c2df43b49ed91b3cccdb0db0d7caf18783a68fa32040f5bd2dd8b9c9c60da67e1cdd9834081c5882554cd59d94de6c8d1a4');
        } elseif ($promo == "STID2D2") {
            $calendrier = file_get_contents('https://planning.univ-ubs.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?data=8241fc3873200214754509b38d4d7efe324cfcf2e9e6b4356213d7c347ee7c2df43b49ed91b3cccdb0db0d7caf18783a68fa32040f5bd2dd8b9c9c60da67e1cdd9834081c5882554cd59d94de6c8d1a4');
        } else $calendrier = null;
        file_put_contents("ics/$promo.ics", $calendrier);
    }
    return $calendrier;
}

function compressionJM(&$jour, &$mois, &$annee, &$Sjour)
{
    $timestamp = mktime(0, 0, 0, $mois, $jour, $annee);
    $jour = date("j", $timestamp);
    $mois = date("m", $timestamp);
    $annee = date("Y", $timestamp);
    $Sjour = date("N", $timestamp);
}

function horaire($hor, $temps2)
{
    $c = (10 + $hor) * 100 + $temps2;
    return $c;
}

function getJour()
{
    $jourL["0"] = "err";
    $jourL["1"] = "Lundi";
    $jourL["2"] = "Mardi";
    $jourL["3"] = "Mercredi";
    $jourL["4"] = "Jeudi";
    $jourL["5"] = "Vendredi";
    $jourL["6"] = "Samedi";
    $jourL["7"] = "Dimanche";
    return $jourL;
}

function getMois()
{
    $jourL["0"] = "err";
    $moisL["1"] = "Janvier";
    $moisL["2"] = "Février";
    $moisL["3"] = "Mars";
    $moisL["4"] = "Avril";
    $moisL["5"] = "Mai";
    $moisL["6"] = "Juin";
    $moisL["7"] = "Juillet";
    $moisL["8"] = "Août";
    $moisL["9"] = "Septembre";
    $moisL["10"] = "Octobre";
    $moisL["11"] = "Novembre";
    $moisL["12"] = "Décembre";
    return $moisL;
}

function getSalle()
{
    $salleL["126"] = "B126 ";
    $salleL["141"] = "B141 ";
    $salleL["024"] = "B024 ";
    $salleL["029"] = "B026 ";
    $salleL["003"] = "B003 ";
    $salleL["005"] = "B005 ";
    $salleL["022"] = "B022 ";
    $salleL["028"] = "B028 ";
    $salleL["035"] = "B035 ";
    $salleL["037"] = "B037 ";
    return $salleL;
}

function typeCase($match)
{
    $typeCase = "NUL";
    if (strpos($match, "CM")) {
        $typeCase = "CM";
    }
    if (strpos($match, "TD")) {
        $typeCase = "TD";
    }
    if (strpos($match, "TP")) {
        $typeCase = "TP";
    }
    return $typeCase;
}

function getEmplacement($heure, $min, $temps1, $temps2)
{
    $ret = (2 + ($heure - 8) * 4 + $min / 15) . "/" . (2 + ($temps1 - 8) * 4 + $temps2 / 15);
    if ((2 + ($heure - 8) * 4 + $min / 15) < 0)
        $ret = "0/0";
    return "style='grid-row:" . $ret . ";'";
}

//function retourne info String
function getTitre()
{
    //affichage mois annee menu sup
    if (isset($_GET["D"])) {
        $jD = $_GET["D"] * 7 + 1;
    } else {
        $jD = 0;
    }
    $jourA = intval(date("d") + $jD);
    $moisA = date("m");
    $anneeA = date("Y");
    $Sjour = 0;
    compressionJM($jourA, $moisA, $anneeA, $Sjour);
    $moisL = getMois();
    $moisA = intval($moisA);
    $timestamp = mktime(0, 0, 0, $moisA, $jourA, $anneeA);
    $nSem = date("W", $timestamp);
    return $moisL[$moisA] . " " . $anneeA . " | Semaine " . $nSem;
}

function getGroup()
{
    if ($_GET["group"] != null && $_GET["annee"] != null) {
        $group = $_GET["group"];
        $annee = $_GET["annee"];
        return "Planning : " . $annee . $group;
    } else {
        return "";
    }
}

function getSalleLibre()
{
    $calendrier = file_get_contents('https://planning.univ-ubs.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?data=8241fc3873200214d31fc22145ae5a6cec380acd54f6ef25e1268055ef30541b9a26113b894fb6da29a910ab7215b887c302758449fbd53d8090dc208afc81e5136669d5d81b5e7ff495e3e8910fd4f00234b9d7b7225c8ea1274940c72ac622ccc019f28c3c7ac7d185f78efad292c1dad50f9fd694f7ca66ac3b5bb16186c9fa4f195065c394d2c620cd00283f4678fe6ab6da2293ad64ccf919b9001e989c65927d16c1d48c75726fb359153126e7d1bb95aa76bef7d8d0227a9394e52778fb6e940cb2d3a56888ba8c04e1d259f061540aba384fd665b32d4d8861081fe4aaa7c6ceb5591f3946551e502748cea27c5ae48e50baec33fa071546b18e95a20708d34c57a1da7a7750cf289ce6252e6bd86c85873e1c03b30d31395117d746e7f559b7bccd65af84d53637f997c2bbc0eedfac82f8d3b4da002bcfa505c0761a787b160c28c9a281387a2f046e602bdd2d76016b33c64a702ee0a972bd97defd66a78bd25745edf6150f206ca035a50f8fe6833571a4dc62da66decc7af531d58d0e49222e3438c9ecd866fc6c483b019a969a850bab1d3e80ce50c697a6cbdfec911fef26aa4301a92bd24b3ff5897adb757bc75e7989f8a8107660e456f83281813fc5508b8931158c3605c92f1b555888d70acd5cc474870aa232b90d7dc5b2f46281e2f62068482f72fa02eaa7722c6408a02313ba269e6232c8774b7ed07358d414703280a2af4afcdcd9ed9be971c9a61f4bd352a65d5e30d44e96a8e65f7b70e4ed7ec1728da241243ca80c473dd584ba796ed8f287e3b203dcea3ec25333f96991f10666eebe4cb3d7b137948aacbf38926fd37f0ddabcb03f08cb128c93bc4fcb6de69584c3bcdb178ee67ee5dd161cc423ab504cdf3c1acef8543cfd5b81b930e6b6cec0db97247709248af069ff1fd12df955944ed43e152021893c651df862915e9dacf760c9a92ce180bab4d2ceceb0fc');
    $regExpMatch = '/SUMMARY:(.*)/';
    $regExpDate = '/DTSTART:(.*)/';
    $regExpLoc = '/LOCATION:(.*)/';
    $regExpDesc = '/DESCRIPTION:(.*)/';
    $regExpStamp = '/DTEND:(.*)/';
    //vairable salle
    $salleL = getSalle();
    // Variable info .ics
    $n = preg_match_all($regExpMatch, $calendrier, $matchTableau, PREG_PATTERN_ORDER);
    preg_match_all($regExpDate, $calendrier, $dateTableau, PREG_PATTERN_ORDER);
    preg_match_all($regExpLoc, $calendrier, $locTableau, PREG_PATTERN_ORDER);
    preg_match_all($regExpDesc, $calendrier, $descTableau, PREG_PATTERN_ORDER);
    preg_match_all($regExpStamp, $calendrier, $StampTableau, PREG_PATTERN_ORDER);
    for ($j = 0; $j < $n; ++$j) {
        $annee = substr($dateTableau[0][$j], 8, 4);
        $mois = substr($dateTableau[0][$j], 12, 2);
        if (intval($mois) >= 4) {
            $Hdécalage = 2;
        } else {
            $Hdécalage = 1;
        }
        $jour = substr($dateTableau[0][$j], 14, 2);
        $heure = substr($dateTableau[0][$j], 17, 2) + $Hdécalage;
        $min = substr($dateTableau[0][$j], 19, 2);
        $match = substr($matchTableau[0][$j], 8);
        $loc = substr($locTableau[0][$j], 11);
        $desc = substr($descTableau[0][$j], 12);
        $temps1 = substr($StampTableau[0][$j], 15, 2) + $Hdécalage;
        $temps2 = substr($StampTableau[0][$j], 17, 2);
        if ($heure <= date("G") && $min <= date("i") && $temps1 >= date("G") && $temps2 >= date("i") && $jour == date("d") && $mois == date("m")) {
            $salleL[substr($loc, 2, 3)] = "";
        }
    }
    return implode("", $salleL);
}

//function principale
function testDataPost()
{
    $ret = false;
    if (isset($_GET["dept"])) {
        $dept = $_GET["dept"];
    } else {
        $dept = "";
    }
    if (isset($_GET["group"])) {
        $group = $_GET["group"];
    } else {
        $group = "";
    }
    if (isset($_GET["annee"])) {
        $annee = $_GET["annee"];
    } else {
        $annee = "";
    }
    $promo = $dept . $annee . $group;
    if ($promo == "") {
        $ret = true;
        if ($_COOKIE["planning"] != "dept=&annee=&group=" && $_COOKIE["planning"] != null) {
            echo "<meta http-equiv='refresh' content='0; URL=./?" . $_COOKIE["planning"] . "'>";
        } else {
            echo "<meta http-equiv='refresh' content='0; URL=./?dept=INFO&annee=1&group=A1'>";
        }
    }
    return $ret;
}

function affichage()
{
    // si aucune info GET: sortir
    if (isset($_GET["dept"])) {
        $dept = $_GET["dept"];
    } else {
        $dept = "";
    }
    if (isset($_GET["group"])) {
        $group = $_GET["group"];
    } else {
        $group = "";
    }
    if (isset($_GET["annee"])) {
        $annee = $_GET["annee"];
    } else {
        $annee = "";
    }
    $promo = $dept . $annee . $group;
    // récupère jD
    if (isset($_GET["D"])) {
        $jD = $_GET["D"] * 7;
    } else {
        $jD = 0;
    }
    $jour = date("j") + $jD + 1;
    $mois = date("n");
    $annee = date("Y");
    $Sjour = date("N");
    if ($Sjour > 5) {
        $Sjour = 7 - $Sjour;
    } else {
        $Sjour = $Sjour * (-1);
    }
    $jour = $jour + $Sjour;
    compressionJM($jour, $mois, $annee, $Sjour);

    $calendrier = getcalendar($promo);

    // Variable type info .ics
    $regExpMatch = '/SUMMARY:(.*)/';
    $regExpDate = '/DTSTART:(.*)/';
    $regExpLoc = '/LOCATION:(.*)/';
    $regExpDesc = '/DESCRIPTION:(.*)/';
    $regExpStamp = '/DTEND:(.*)/';

    // Variable info .ics
    $n = preg_match_all($regExpMatch, $calendrier, $matchTableau, PREG_PATTERN_ORDER);
    preg_match_all($regExpDate, $calendrier, $dateTableau, PREG_PATTERN_ORDER);
    preg_match_all($regExpLoc, $calendrier, $locTableau, PREG_PATTERN_ORDER);
    preg_match_all($regExpDesc, $calendrier, $descTableau, PREG_PATTERN_ORDER);
    preg_match_all($regExpStamp, $calendrier, $StampTableau, PREG_PATTERN_ORDER);

    $jourL = getJour();
    $moisL = getMois();

    $Dcontenu = array("vide", "vide", "vide", "vide", "vide", "vide", "vide", "vide", "vide", "vide", "vide", "vide", "vide", "vide", "vide", "vide", "vide", "vide", "vide", "vide", "vide");
    $DcontenuP = array("vide", "vide", "vide", "vide", "vide", "vide", "vide", "vide", "vide", "vide", "vide", "vide", "vide", "vide", "vide", "vide", "vide", "vide", "vide", "vide", "vide");

    for ($d = 0; $d < 15; ++$d) {
        // compression jour/mois
        $Sjour = 0;
        compressionJM($jour, $mois, $annee, $Sjour);
        if (intval($mois) >= 4) {
            $Hdécalage = 2;
        } else {
            $Hdécalage = 1;
        }
        for ($j = 0; $j < $n; ++$j) {
            // Récupération des données
            $anneeC = substr($dateTableau[0][$j], 8, 4);
            $moisC = substr($dateTableau[0][$j], 12, 2);
            $jourC = substr($dateTableau[0][$j], 14, 2);
            $heureC = substr($dateTableau[0][$j], 17, 2) + $Hdécalage;
            $minC = substr($dateTableau[0][$j], 19, 2);
            $matchC = substr($matchTableau[0][$j], 8);
            $locC = substr($locTableau[0][$j], 11);
            $descC = substr($descTableau[0][$j], 14);
            $heureFC = substr($StampTableau[0][$j], 15, 2) + $Hdécalage;
            $minFC = substr($StampTableau[0][$j], 17, 2);
            $descTab = explode("\\n", $descC);
            // Mise en forme
            $date = $jourC . "/" . $moisC . "/" . $anneeC;
            $horaire = " " . $heureC . "h" . $minC . "-" . $heureFC . "h" . $minFC;
            $hor = $heureC . "-" . $minC;
            //horaire 1h30
            $c = horaire($hor, $minC);
            //couleur case
            $typeCase = typeCase($matchC);
            //affichage cours
            if ($annee == $anneeC) {
                if (($jourC == $jour && $moisC == $mois) && ($d < 5)) {
                    //si jour vide
                    if ($jour == $jourC) {
                        $Dcontenu[$d] = "";
                    }

                    if (strstr($descTab[2], '(Exporté le:')) {
                        $descTab[2] = "";
                    }

                    $emp = getEmplacement($heureC, $minC, $heureFC, $minFC);
                    echo "<div id='box' class='p" . $d . " " . $typeCase . " noneP'" . $emp . ">";
                    echo "<Strong>".$matchC."</Strong><br>".$horaire . "  " . $locC;
                    echo $descTab[1] . " " . $descTab[2];
                    echo "</div>";
                }
            }
            if ($jour == $jourC && ($jourC >= date("d") || $moisC != date("m")) && $mois == $moisC && ($jourC != date("j") || (date("G") + date("i") / 60) <= ($heureFC + $minFC / 60))) {
                //si jour vide (ne pas afficher sur portable)
                if ($jour == $jourC) {
                    $DcontenuP[$d] = "";
                }
                echo "<div id='boxP' class='p" . $d . " c" . $c . " " . $typeCase . " nonePC' style='order: " . ($d + 1) . "0" . ($c + 1) . ";grid-column: 1;'>";
                echo "<strong>";
                echo $matchC . "</strong><br>" . $horaire . "  " . $locC;
                echo $descTab[2];
                echo "</div>";
            }
        }
        echo "<div class='p" . $d . " c-1 " . $DcontenuP[$d] . " nonePC' style='order: " . ($d + 1) . "00000;grid-column: 1; '>" . $jourL[$Sjour] . ' ' . ($jour) . ' ' . $moisL[intval($mois)] . "</div>";
        $dateCara = "";
        if (($jour) == date("j")) {
            $dateCara = "HASH";
        }
        if ($d < 5) {
            echo "<div class='p" . $d . " " . $dateCara . " c-1 " . $Dcontenu[$d] . " noneP'>" . $jourL[$Sjour] . ' ' . ($jour) . ' ' . $moisL[intval($mois)] . "</div>";
        }
        $jour = $jour + 1;
    }
}

?>

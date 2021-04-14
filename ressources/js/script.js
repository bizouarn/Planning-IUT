//affichage titre emploie du temps
function SetSelect(id, option) {
    let text = $_POST(option);
    document.getElementById(id).innerHTML = text;
}

//affiche la date pour chaque jour
function heure() {
    var ladate = new Date()
    var h = ladate.getHours();
    if (h < 10) {
        h = "0" + h
    }
    var m = ladate.getMinutes();
    if (m < 10) {
        m = "0" + m
    }
    var s = ladate.getSeconds();
    if (s < 10) {
        s = "0" + s
    }
    var text = (h + ":" + m + ":" + s);
    document.getElementById('heure').innerHTML = text;
    setTimeout(heure, 1000);
}

function date() {
    var mois = [
        "Janvier",
        "Février",
        "Mars",
        "Avril",
        "Mai",
        "Juin",
        "Juillet",
        "Août",
        "Septembre",
        "Octobre",
        "Novembre",
        "Décembre"
    ]
    var ladate = new Date()
    var d = ladate.getDate();
    var m = ladate.getMonth() + 1;
    var y = ladate.getFullYear();
    var text = (d + " " + mois[m] + " " + y);
    document.getElementById('day').innerHTML = text;
}

//POST mtéthode
function $_POST(param) {
    let vars = document.getElementById(param).value;
    return vars;
}

//menu overt ou fermer.
var on = true;//menu overt ou fermer.
function clickMenu() {
    if (on == false) {
        document.getElementById('menuBlack').setAttribute("style", "display:none;");
        document.getElementById('menuL').setAttribute("style", "display:none;");
        document.getElementById('grille').removeAttribute("class");
        on = true;
    } else {
        document.getElementById('menuBlack').removeAttribute("style");
        document.getElementById('menuL').removeAttribute("style");
        document.getElementById('grille').setAttribute("class", "on");
        on = false;
    }
}

//création de cookie pour enregistrer et lire le planning favory.
function creerCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function lireCookie(nom) {
// Ajoute le signe égale virgule au nom
    // pour la recherche
    var nom2 = nom + "=";
    // Array contenant tous les cookies
    var arrCookies = document.cookie.split(';');
    // Cherche l'array pour le cookie en question
    for (var i = 0; i < arrCookies.length; i++) {
        var a = arrCookies[i];
// Si c'est un espace, enlever
        while (a.charAt(0) == ' ') {
            a = a.substring(1, a.length);
        }
        if (c.andexOf(nom2) == 0) {
            return a.substring(nom2.length, a.length);
        }
    }
// Aucun cookie trouvé
    return null;
}

function SaveTab() {
    creerCookie("annee", document.getElementById("get3").value, 120);
    creerCookie("dept", document.getElementById("get5").value, 120);
    creerCookie("group", document.getElementById("get4").value, 120);
    if (document.getElementById("mode").value != null) {
        creerCookie("mode", document.getElementById("mode").value, 120);
    }
}

function ChangeMode() {
    if (document.getElementById("mode").value == "sombre" | document.getElementById("mode").value == "") {
        document.getElementById("stylesheet").setAttribute("href", "ressources/css/style white.css");
        document.getElementById("modeF").innerHTML = "Clair ☀️";
        post("mode", "clair");
    } else {
        document.getElementById("stylesheet").setAttribute("href", "ressources/css/style black.css");
        document.getElementById("modeF").innerHTML = "Sombre 🌙";
        post("mode", "sombre");
    }
    //window.location.assign("./?white");
}

//actualisation du contenu de page. (non implémenter)
function deleteContenu() {
    var item = document.getElementById("grille");
    item.parentNode.removeChild(item);
    var text = "<div class='p-1 c-1'></div><div class='p-1 c0'>8h</div><div class='p-1 c1' >9h</div><div class='p-1 c2'>10h</div><div class='p-1 c3' >11h</div><div class='p-1 c4' >12h</div>div class='midi'>13h</div><div class='p-1 c5' >14h</div><div class='p-1 c6' >15h</div><div class='p-1 c7' >16h</div><div class='p-1 c8' >17h</div><div class='p-1 c9' >18h</div><div class='p-1 c10' ></div><div class='border' ></div><?php affichage(); ?>";
    document.getElementById('body').innerHTML(text);
}

//changement semaine
function semaine(i) {
    let dval = parseInt($_POST("D"));
    if (dval == null) {
        dval = 0;
    }
    let val = parseInt(dval) + i;
    if (i == 0) {
        val = 0;
    }
    post("D", val);
    post_url();
    return val;
}

//changment des select du menu autre que le département.
var oneActivation = true;

function refreshMenu(action) {
    var newDept = document.getElementById("get6").value;
    var newAnnee = document.getElementById("get3").value;
    if (newDept != "INFO" && newDept != "STID" && !(newDept == "TC" && newAnnee == 2)) {
        changeElementsStyle(document.getElementsByClassName("selectInfo"), "display:none");
    } else {
        removeElementsStyle(document.getElementsByClassName("selectInfo"));
    }
    if (!(newDept == "GEA" && newAnnee == 1)) {
        changeElementsStyle(document.getElementsByClassName("selectGea1"), "display:none");
    } else {
        removeElementsStyle(document.getElementsByClassName("selectGea1"));
    }
    if (!(newDept == "GEA" && newAnnee == 2)) {
        changeElementsStyle(document.getElementsByClassName("selectGea2"), "display:none");
    } else {
        removeElementsStyle(document.getElementsByClassName("selectGea2"));
    }
    if (!(newDept == "TC" && newAnnee == 1)) {
        changeElementsStyle(document.getElementsByClassName("selectTc1"), "display:none");
    } else {
        removeElementsStyle(document.getElementsByClassName("selectTc1"));
    }
    if (!(newDept == "LP")) {
        changeElementsStyle(document.getElementsByClassName("selectLP"), "display:none");
    } else {
        removeElementsStyle(document.getElementsByClassName("selectLP"));
    }
    if (action) {
        if (oneActivation) {
            oneActivation = false;
            document.getElementById("get4").value = "";
        }
    }
}

function changeElementsStyle(list, value) {
    for (var i = 0; i < list.length; i++) {
        list[i].setAttribute("style", value);
    }
}

function removeElementsStyle(list) {
    for (var i = 0; i < list.length; i++) {
        list[i].removeAttribute("style");
    }
}

//générer requète post
function post(id, value) {
    document.getElementById(id).setAttribute("value", value);
}

function post_url(p) {
//Création dynamique du formulaire
    document.getElementById("jsPost").submit();
}

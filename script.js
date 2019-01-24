// menu
function heure(){
    var ladate=new Date()
    var h=ladate.getHours();
    if (h<10) {h = "0" + h}
    var m=ladate.getMinutes();
    if (m<10) {m = "0" + m}
    var s=ladate.getSeconds();
    if (s<10) {s = "0" + s}
    var text = (h+":"+m+":"+s);
    document.getElementById('heure').innerHTML = text;
    setTimeout(heure,1000);
}
function date(){
    var ladate=new Date()
    var d=ladate.getDate();
    var m=ladate.getMonth()+1;
    if (m<10) {m = "0" + m}
    var y=ladate.getFullYear();
    var text = (d+"/"+m+"/"+y);
    document.getElementById('day').innerHTML = text;
}
//affichage emploie du temps
//affiche la date pour chaque jour
function Setdate(idDiv,d, m, y){
    var ladate=new Date();
    var l=ladate.getDay();
    var jour=new Array(8);
    jour[1]="Lundi";
    jour[2]="mardi";
    jour[3]="mercredi";
    jour[4]="jeudi";
    jour[5]="Vendredi";
    jour[6]="Samedi";
    jour[7]="Dimanche";
    
    var mois=new Array(13);
    mois[1]="Janvier";
    mois[2]="Février";
    mois[3]="Mars";
    mois[4]="Avril";
    mois[5]="Mai";
    mois[6]="Juin";
    mois[7]="Juillet";
    mois[8]="Août";
    mois[9]="Septembre";
    mois[10]="Octobre";
    mois[11]="Novembre";
    mois[12]="Décembre";
    var text = (jour[l]+" "+d+" "+mois[m]);
    document.getElementById(idDiv).innerHTML = text;
}
var on = false;
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
    var mois =[
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
    var ladate=new Date()
    var d=ladate.getDate();
    var m=ladate.getMonth()+1;
    var y=ladate.getFullYear();
    var text = (d+" "+mois[m]+" "+y);
    document.getElementById('day').innerHTML = text;
}
//affichage emploie du temps
//affiche la date pour chaque jour
function SetSelect(id, option){
    var text=$_GET(option);
    document.getElementById(id).innerHTML = text;
}
function $_GET(param) {
	var vars = {};
	window.location.href.replace( location.hash, '' ).replace( 
		/[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
		function( m, key, value ) { // callback
			vars[key] = value !== undefined ? value : '';
		}
	);

	if ( param ) {
		return vars[param] ? vars[param] : null;	
	}
	return vars;
}
function clickMenu(){
if(on==false){
document.getElementById('menuL').setAttribute("style","display:none;");
document.getElementById('grille').setAttribute("style","grid-column: 1/3;grid-row:1;");
on=true;
}
else{
document.getElementById('menuL').removeAttribute("style");
document.getElementById('menuL').setAttribute("style","z-index: 2;background-color:black;grid-row:1;left:-200px;");
on=false;
}

function save(){
    var group = $_GET(group) ;
    var annee = $_GET(annee);
    setCookie("planning",group,annee,99);
}

}
function setCookie(cname, cvalue1,cvalue2, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue1 + cvalue2 + ";" + expires + ";path=/";
}
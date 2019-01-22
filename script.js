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
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
    <link rel="icon" type="image/png" href="../image/iut-vannes2.png"/>
    <script src="script.js"></script>
</head>
<body>
<?php
if(isset($_POST['login']) && isset($_POST['password'])){
    if(strcmp($_POST['login'],'admin')==0 && strcmp($_POST['password'],'admin')==0){
        $_SESSION['id']=$_POST['login'];
    }
}
if(!isset($_SESSION['id'])) {
    include "login.php";
} else {
    include "panel.php";
}
?>
</body>
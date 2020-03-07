<?php
session_start();
if(isset($_POST['login']) && isset($_POST['password'])){
    if(strcmp($_POST['login'],'adminBDE')==0 && strcmp($_POST['password'],'#BDEPassAdmin')==0){
        $_SESSION['id']=$_POST['login'];
        echo("connection réussit : ".$_SESSION['id']);
    }
}
header('Location: index.php');
exit();
?>
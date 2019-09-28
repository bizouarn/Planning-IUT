<!-- Auteur Aymeric Bizouarn -->
<div class=main>
    <div class="homeClick"><h1>Planning IUT</h1></div>
    <div class="title">
        <button onclick="redirection('deconnexion.php')">Deconnection</button>
    </div>
    <div class="menu">
        <button onclick="redirection('?page=main')">MainPage</button>
    </div>
    <div class="contenu">
        <?php
        if(isset($_GET['page'])){
            include "panel/".$_GET['page'].".php";
        } else {
            include "panel/main.php";
        }
        ?>
    </div>
</div>
</body>
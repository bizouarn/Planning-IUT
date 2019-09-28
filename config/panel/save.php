<form>
    <?php
    if(isset($_SESSION['id'])) {
        if (isset($_POST['saveText']) && isset($_POST['file'])) {
            echo "<h1>Information Enregistrer</h1>";
            file_put_contents("data/" . $_POST['file'], $_POST['saveText']);
        } else {
            echo "<h1>Ereur</h1>";
        }
        echo "<p class=\"submit\">
        <input onclick=\"redirection(\" ?page=" . $_POST['page'] . "\")\" type=\"submit\" name=\"commit\" value=\"retour au menu\">
    </p>";
    }
    ?>
</form>
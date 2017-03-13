<?php
require_once './Model/trocaPagina.php';

session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="js/jquery-3.1.1.js" type="text/javascript"></script>
    </head>
    <body>
        <header>
            <?php
            if (isset($_SESSION['nomeUsuario'])) {
                include "view/userbar.php";
            }
            ?>
        </header>
        <main>
            <?php
            $p = new trocaPagina();
            if ($p->pagina == "view/login.php" && isset($_SESSION['nomeUsuario'])) {
                echo "<script>window.location = 'index.php'</script>";
            }
            include $p->pagina;
            ?>
        </main>
        <footer></footer>
    </body>
</html>

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
        <link rel="stylesheet" href="css/index.css"/>
    </head>
    <body>
        <header>
            <div id="userbar">
                <?php
                if (isset($_SESSION['nomeUsuario'])) {
                    include "view/userbar.php";
                }
                ?>
            </div>
            <a id="logo" href="index.php"><img src="img/logo.png" width="250"/></a>
            <div id="menu-bar">
                <nav id="menu">
                    <div class="menu-item-container">
                        <a href="#" data-menu-item="contato" class="menu-item">Contato</a>
                    </div>
                    <div class="menu-item-container">
                        <a href="#" data-menu-item="produtos" class="menu-item">Produtos</a>
                    </div>
                    <div class="menu-item-container">
                        <a href="#" data-menu-item="empresa" class="menu-item">Empresa</a>
                    </div>
                </nav>
            </div>
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

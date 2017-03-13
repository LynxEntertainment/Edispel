<?php

require_once '../controller/usuarioController.php';

$uc = new UsuarioController();
if ($uc->realizarLogin($_POST['login_usuario'], $_POST['senha_usuario'])) {
    session_start();
    $_SESSION['idUsuario'] = $uc->getUsuario()->getIdUsuario();
    $_SESSION['nomeUsuario'] = $uc->getUsuario()->getNomeUsuario();
    $_SESSION['ativadoUsuario'] = $uc->getUsuario()->getAtivadoUsuario();
    if ($_SESSION['ativadoUsuario']) {
        echo "<script>window.location = '../index.php'</script>";
    } else {
        echo "<script>window.alert('Altere sua senha para ativar o usuário.');</script>";
        echo "<script>window.location = '../index.php?view=alterarSenha'</script>";
    }
} else {
    echo "<script>window.alert('Login ou senha incorretos.');</script>";
    echo "<script>window.location = '../index.php?view=login'</script>";
}
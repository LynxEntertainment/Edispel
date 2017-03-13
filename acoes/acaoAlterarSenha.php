<?php

include_once "../controller/usuarioController.php";
session_start();

$uc = new usuarioController();

if($uc->alterarSenha($_POST['senha_usuario'], $_POST['senha_antiga'])){
        echo "<script>alert('Senha alterada com sucesso')</script>";
        echo "<script>window.location = '../index.php'</script>";
} else {
        echo "<script>window.alert('Falha ao alterar senha. Verifique se sua senha anterior está correta');</script>";
        echo "<script>window.location = '../index.php?view=alterarSenha'</script>";
}
<?php

@require_once 'Consulta.php';
@require_once '../model/Consulta.php'; 

class Usuario {

    private $idUsuario;
    private $loginUsuario;
    private $senhaUsuario;
    private $nomeUsuario;
    private $ativadoUsuario;

    function __construct() {
        
    }

    function getAtivadoUsuario() {
        return $this->ativadoUsuario;
    }

    function setAtivadoUsuario($ativadoUsuario) {
        $this->ativadoUsuario = $ativadoUsuario;
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getLoginUsuario() {
        return $this->loginUsuario;
    }

    function getSenhaUsuario() {
        return $this->senhaUsuario;
    }

    function getNomeUsuario() {
        return $this->nomeUsuario;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setLoginUsuario($loginUsuario) {
        $this->loginUsuario = $loginUsuario;
    }

    function setSenhaUsuario($senhaUsuario) {
        $this->senhaUsuario = $senhaUsuario;
    }

    function setNomeUsuario($nomeUsuario) {
        $this->nomeUsuario = $nomeUsuario;
    }

    public function realizarLogin($login, $senha) {
        $sql = "SELECT * FROM usuario "
                . "WHERE login_usuario = ? "
                . "AND senha_usuario = ? ";
        $c = new Consulta($sql);

        $dados = array($login, md5($senha));
        $retorno = $c->executaConsulta($dados);
        if ($retorno->rowCount() > 0) {
            return $retorno;
        } else {
            return NULL;
        }
    }

    public function alterarSenha($senhaNova,$senhaAntiga) {
        $sql = "UPDATE usuario SET "
                . "senha_usuario = ?,"
                . "ativado_usuario = 1 "
                . "WHERE id_usuario = ?"
                . "AND senha_usuario = ?";
        $c = new Consulta($sql);

        $dados = array(md5($senhaNova), $_SESSION['idUsuario'],md5($senhaAntiga));
        if ($c->executaConsulta($dados)) {
            return true;
        } else {
            return false;
        }
    }

}

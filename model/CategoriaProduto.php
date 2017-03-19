<?php

@include_once './Consulta.php';
@include_once 'model/Consulta.php';

class CategoriaProduto {
    private $idCategoria;
    private $nomeCategoria;
    
    function getIdCategoria() {
        return $this->idCategoria;
    }

    function getNomeCategoria() {
        return $this->nomeCategoria;
    }

    function setIdCategoria($idCategoria) {
        $this->idCategoria = $idCategoria;
    }

    function setNomeCategoria($nomeCategoria) {
        $this->nomeCategoria = $nomeCategoria;
    }
    
    public static function listarCategoria(){
        $sql = "SELECT * FROM categoria_produto"
                . " ORDER BY nome_categoria";
        
        $c = new Consulta($sql);
        
        
        $retorno = $c->executaConsulta(NULL);
        
        if (!empty($retorno) && $retorno->rowCount()) {
            return $retorno;
        } else {
            return NULL;
        }

    }
    
    public function inserirCategoria(){
        $sql =  "INSERT INTO categoria_produto(nome_categoria) "
                . "VALUES(?)";
        
        $dados = array($this->nomeCategoria);
        
        $c = new Consulta($sql);
        
        if($c->executaConsulta($dados)){
            return true;
        } else {
            return false;
        }
    }
    
    public function ultimoInserido(){
        $sql = "SELECT * FROM categoria_produto "
                . "ORDER BY id_categoria DESC "
                . "LIMIT 1";
        
        $c = new Consulta($sql);
        
        $retorno = $c->executaConsulta(NULL);
        
        if(!empty($retorno) && $retorno->rowCount()){
            foreach($retorno as $item){
                return $item["id_categoria"];
            }
        } else {
            return NULL;
        }
    }
}

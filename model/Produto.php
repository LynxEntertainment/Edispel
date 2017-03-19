<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Produto
 *
 * @author zeeli
 */

@include_once "model/Consulta.php";
@include_once "Consulta.php";

class Produto {
    private $idProduto;
    private $categoriaProduto;
    private $codProduto;
    private $nomeProduto;
    private $descricaoProduto;
    
    function getIdProduto() {
        return $this->idProduto;
    }

    function getCategoriaProduto() {
        return $this->categoriaProduto;
    }

    function getCodProduto() {
        return $this->codProduto;
    }

    function getNomeProduto() {
        return $this->nomeProduto;
    }

    function getDescricaoProduto() {
        return $this->descricaoProduto;
    }

    function setIdProduto($idProduto) {
        $this->idProduto = $idProduto;
    }

    function setCategoriaProduto($categoriaProduto) {
        $this->categoriaProduto = $categoriaProduto;
    }

    function setCodProduto($codProduto) {
        $this->codProduto = $codProduto;
    }

    function setNomeProduto($nomeProduto) {
        $this->nomeProduto = $nomeProduto;
    }

    function setDescricaoProduto($descricaoProduto) {
        $this->descricaoProduto = $descricaoProduto;
    }
    
    function inserirProduto(){
        $sql = "INSERT INTO produto("
                . "nome_produto, "
                . "descricao_produto, "
                . "cod_produto, "
                . "FK_categoria) "
                . "VALUES (?,?,?,?)";
        
        $dados = array(
            $this->nomeProduto,
            $this->descricaoProduto,
            $this->codProduto,
            $this->categoriaProduto);
        
        $c = new Consulta($sql);
        
        if($c->executaConsulta($dados)){
            return true;
        } else {
            return false;
        }
    }
}

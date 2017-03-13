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
class Produto {
    private $idProduto;
    private $categoriaProduto;
    private $codProduto;
    private $nomeProduto;
    private $descricaoProduto;
    
    function __construct($idProduto) {
        $this->idProduto = $idProduto;
    }

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
}

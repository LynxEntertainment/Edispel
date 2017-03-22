<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of produtoController
 *
 * @author zeeli
 */

@include_once "../model/Produto.php";
@include_once "model/Produto.php";

class produtoController {
    private $produto;
    
    public function __construct() {
        $this->produto = new Produto();
    }
    
    public function novo($nome,$descricao,$codigo,$categoria){
        $this->produto->setNomeProduto($nome);
        $this->produto->setDescricaoProduto($descricao);
        $this->produto->setCodProduto($codigo);
        $this->produto->setCategoriaProduto($categoria);
    }
    
    public function setId($id){
        $this->produto->setIdProduto($id);
    }
    
    function getProduto() {
        return $this->produto;
    }

    function setProduto($produto) {
        $this->produto = $produto;
    }
    
    public function inserirProduto(){
        if($this->produto->inserirProduto()){
            $this->produto->ultimoInserido();
            return true;
        } else {
            return false;
        }
    }
    
    public function selecionarProduto(){
        if($this->produto->getIdProduto() != NULL){
            $dados = $this->produto->selecionarProduto();
            
            $this->produto->setNomeProduto($dados['nome_produto']);
            $this->produto->setDescricaoProduto($dados['descricao_produto']);
            $this->produto->setCodProduto($dados['cod_produto']);
            $this->produto->setCategoriaProduto($dados['FK_categoria']);
            return true;
        } else {
            return false;
        }
    }
}

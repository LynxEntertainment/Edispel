<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Foto
 *
 * @author zeeli
 */
class Foto {
    private $idFoto;
    private $produtoFoto;
    private $caminhoFoto;
    private $ordemFoto;
    function __construct($idFoto, $produtoFoto) {
        $this->idFoto = $idFoto;
        $this->produtoFoto = $produtoFoto;
    }

    function getIdFoto() {
        return $this->idFoto;
    }

    function getProdutoFoto() {
        return $this->produtoFoto;
    }

    function getCaminhoFoto() {
        return $this->caminhoFoto;
    }

    function getOrdemFoto() {
        return $this->ordemFoto;
    }

    function setIdFoto($idFoto) {
        $this->idFoto = $idFoto;
    }

    function setProdutoFoto($produtoFoto) {
        $this->produtoFoto = $produtoFoto;
    }

    function setCaminhoFoto($caminhoFoto) {
        $this->caminhoFoto = $caminhoFoto;
    }

    function setOrdemFoto($ordemFoto) {
        $this->ordemFoto = $ordemFoto;
    }
}

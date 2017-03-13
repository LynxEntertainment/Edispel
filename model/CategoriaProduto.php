<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategoriaProduto
 *
 * @author zeeli
 */
class CategoriaProduto {
    private $idCategoria;
    private $nomeCategoria;
    function __construct($idCategoria) {
        $this->idCategoria = $idCategoria;
    }

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


}

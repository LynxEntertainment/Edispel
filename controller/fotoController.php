<?php

@include_once '../model/Foto.php';
@include_once 'model/Foto.php';

class fotoController {

    private $foto;

    function __construct() {
        $this->foto = new Foto();
    }

    public function novo($produto, $caminho, $ordem) {
        $this->foto->setCaminhoFoto($caminho);
        $this->foto->setProdutoFoto($produto);
        $this->foto->setOrdemFoto($ordem);
    }

    function getFoto() {
        return $this->foto;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

    public function inserirFoto() {
        if ($this->foto->inserirFoto()) {
            return true;
        } else {
            return false;
        }
    }

    public static function inserirVarias($produto, $fotos) {
        $pasta = "fotos/pr" . $produto . "/";
        $nome = date("d-m-Y-H-i-s") . "-";

        if (!file_exists("../" . $pasta)) {
            mkdir("../" . $pasta, 0777, true);
        }

        $tam = count($fotos['name']);

        for ($i = 0; $i < $tam; $i++) {
            $nome = date("d-m-Y-H-i-s") . "-" . $i . "." . pathinfo($fotos['name'][$i], PATHINFO_EXTENSION);
            move_uploaded_file($fotos['tmp_name'][$i], "../" . $pasta . $nome);

            $fc = new fotoController();
            $fc->novo($produto, $pasta . $nome, $i);

            if (!$fc->inserirFoto()) {
                return false;
            }
        }

        return true;
    }

}

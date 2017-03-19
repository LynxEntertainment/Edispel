<?php



@include_once "model/CategoriaProduto.php";
@include_once "../model/CategoriaProduto.php";

class categoriaProdutoController {
    private $categoriaProduto;
    
    function __construct() {
        $this->categoriaProduto = new CategoriaProduto();
    }
    
    public function novo($nome){
        $this->categoriaProduto->setNomeCategoria($nome);
    }
    
    function getCategoriaProduto() {
        return $this->categoriaProduto;
    }

    function setCategoriaProduto($categoriaProduto) {
        $this->categoriaProduto = $categoriaProduto;
    }
    
    public static function listarCategoria(){
        return CategoriaProduto::listarCategoria();
    }
    
    public function inserirCategoria(){
        if($this->categoriaProduto->inserirCategoria()){
            $this->categoriaProduto->setIdCategoria($this->categoriaProduto->ultimoInserido());
            
            if($this->categoriaProduto->getIdCategoria() != NULL){
                return true;
            } else {
                return false;
            }
        }
    }
    
}

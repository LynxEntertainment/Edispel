<?php

include_once '../controller/produtoController.php';
include_once '../controller/categoriaProdutoController.php';

$pc = new produtoController();

if ($_POST['categoria_produto'] != 0) {
    $pc->novo($_POST['nome_produto'], $_POST['descricao_produto'], $_POST['cod_produto'], $_POST['categoria_produto']);

    if ($pc->inserirProduto()) {
        echo "<script>alert('Produto inserido')</script>";
    } else {
        echo "<script>alert('Falha')</script>";
    }
} else {
    if (strlen($_POST['nova_categoria']) > 0) {
        $cpc = new categoriaProdutoController();

        $cpc->novo($_POST['nova_categoria']);

        if ($cpc->inserirCategoria()) {
            $pc->novo($_POST['nome_produto'], $_POST['descricao_produto'], $_POST['cod_produto'], $cpc->getCategoriaProduto()->getIdCategoria());

            if ($pc->inserirProduto()) {
                echo "<script>alert('Produto inserido')</script>";
            } else {
                echo "<script>alert('Falha')</script>";
            }
        } else {
            echo "<script>alert('Falha ao inserir nova categoria')</script>";
        }
    } else {
        $pc->novo($_POST['nome_produto'], $_POST['descricao_produto'], $_POST['cod_produto'], NULL);

        if ($pc->inserirProduto()) {
            echo "<script>alert('Produto inserido')</script>";
        } else {
            echo "<script>alert('Falha')</script>";
        }
    }
}
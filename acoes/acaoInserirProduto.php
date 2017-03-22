<?php

include_once '../controller/produtoController.php';
include_once '../controller/categoriaProdutoController.php';
include_once '../controller/fotoController.php';

$pc = new produtoController();

if ($_POST['categoria_produto'] != 0) {
    $pc->novo($_POST['nome_produto'], $_POST['descricao_produto'], $_POST['cod_produto'], $_POST['categoria_produto']);

    if ($pc->inserirProduto()) {
        if (!fotoController::inserirVarias($pc->getProduto()->getIdProduto(), $_FILES['foto'])) {
            echo "<script>alert('Falha ao inserir fotos no banco de dados')</script>";
            echo "<script>window.locaton = '../index.php?view=inserirProduto'</script>";
        }
        echo "<script>alert('Produto inserido!')</script>";
        echo "<script>window.location = '../index.php?view=editarProduto&id=" . $pc->getProduto()->getIdProduto() . "'</script>";
    } else {
        echo "<script>alert('Falha')</script>";
        echo "<script>window.locaton = '../index.php?view=inserirProduto'</script>";
    }
} else {
    if (strlen($_POST['nova_categoria']) > 0) {
        $cpc = new categoriaProdutoController();

        $cpc->novo($_POST['nova_categoria']);

        if ($cpc->inserirCategoria()) {
            $pc->novo($_POST['nome_produto'], $_POST['descricao_produto'], $_POST['cod_produto'], $cpc->getCategoriaProduto()->getIdCategoria());

            if ($pc->inserirProduto()) {
                if (!fotoController::inserirVarias($pc->getProduto()->getIdProduto(), $_FILES['foto'])) {
                    echo "<script>alert('Falha ao inserir fotos no banco de dados')</script>";
                    echo "<script>window.locaton = '../index.php?view=inserirProduto'</script>";
                }
                echo "<script>alert('Produto inserido!')</script>";
                echo "<script>window.location = '../index.php?view=editarProduto&id=" . $pc->getProduto()->getIdProduto() . "'</script>";
            } else {
                echo "<script>alert('Falha')</script>";
                echo "<script>window.locaton = '../index.php?view=inserirProduto'</script>";
            }
        } else {
            echo "<script>alert('Falha ao inserir nova categoria')</script>";
            echo "<script>window.locaton = '../index.php?view=inserirProduto'</script>";
        }
    } else {
        $pc->novo($_POST['nome_produto'], $_POST['descricao_produto'], $_POST['cod_produto'], NULL);

        if ($pc->inserirProduto()) {
            if (!fotoController::inserirVarias($pc->getProduto()->getIdProduto(), $_FILES['foto'])) {
                echo "<script>alert('Falha ao inserir fotos no banco de dados')</script>";
                echo "<script>window.locaton = '../index.php?view=inserirProduto'</script>";
            }
            echo "<script>alert('Produto inserido!')</script>";
            echo "<script>window.location = '../index.php?view=editarProduto&id=" . $pc->getProduto()->getIdProduto() . "'</script>";
        } else {
            echo "<script>alert('Falha')</script>";
            echo "<script>window.locaton = '../index.php?view=inserirProduto'</script>";
        }
    }
}
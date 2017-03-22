<?php
@include_once 'controller/categoriaProdutoController.php';
@include_once '../controller/categoriaProdutoController.php';
@include_once 'controller/produtoController.php';
@include_once '../controller/produtoController.php';

$pc = new produtoController();

$pc->setId($_GET["id"]);
$pc->selecionarProduto();

$produto = $pc->getProduto();
?>
<form id="inserir-produto" action="acoes/acaoInserirProduto.php" method="post">
    <input type="text" id="cod_produto" name="cod_produto" placeholder="Código" value="<?php echo $produto->getCodProduto();?>"/>
    <input type="text" id="nome_produto" name="nome_produto" placeholder="Nome" value="<?php echo $produto->getNomeProduto();?>"/>
    <textarea id="descricao_produto" name="descricao_produto" placeholder="Descrição" maxlength="500"><?php echo $produto->getDescricaoProduto(); ?></textarea>
    <select id="categoria_produto" name="categoria_produto" onchange="categoria()">
        <?php
        $lista = categoriaProdutoController::listarCategoria();
        
        foreach($lista as $item){
            echo "<option value='".$item["id_categoria"]."'";
            if($item['id_categoria'] == $produto->getCategoriaProduto()){
                echo " selected";
            }
            echo ">".$item["nome_categoria"]."</option>";
        }
        ?>
        <option value="0">Nova Categoria</option>
    </select>
    <input type="text" id="nova_categoria" name="nova_categoria" placeholder="Nova Categoria"/>
    <button type="submit">Inserir</button>
</form>

<script type="text/javascript">
    $(document).ready(function(){
        categoria();
    });
    
    function categoria(){
        var seletorCat = document.getElementById("categoria_produto");
        var campoNovaCat = document.getElementById("nova_categoria");
        
        if(seletorCat.value == 0){
            campoNovaCat.disabled = false;
        } else {
            campoNovaCat.disabled = true;
        }
    }
</script>
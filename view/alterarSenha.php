<form id="form-alterar-senha" action="acoes/acaoAlterarSenha.php" method="post">
    <input type="password" id="senha_usuario" name="senha_usuario" placeholder="Nova Senha"/>
    <input type="password" id="confirmar_senha" name="confirmar_senha" placeholder="Confirmar Senha"/>
    <input type="password" id="senha_antiga" name="senha_antiga" placeholder="Senha Antiga"/>
    <div id="msg-erro"></div>
    <input id="btn-alterar-senha" type="button" value="Alterar" onclick="validarSenhas()"/>
</form>

<style>
    .campo-errado{
        background: red;
    }
</style>

<script type="text/javascript">

    function validarSenhas() {
        var msgErro = document.getElementById("msg-erro");
        msgErro.innerHTML = "";
        var senha = document.getElementById("senha_usuario").value;
        var confirmaSenha = document.getElementById("confirmar_senha").value;
        var senhaAntiga = document.getElementById("senha_antiga").value;
        var tamanhoMinimo = false;
        var senhasIguais = false;
            if (senha.length >= 6) {
                tamanhoMinimo = true;
                $("#senha_usuario").removeClass("campo-errado");
            } else {
                $("#senha_usuario").addClass("campo-errado");
                msgErro.innerHTML = msgErro.innerHTML + "Senha deve ter no mínimo 6 caracteres</br>";
            }
            
            if (senha === confirmaSenha) {
                senhasIguais = true;
                $("#confirmar_senha").removeClass("campo-errado");
            } else {
                $("#confirmar_senha").addClass("campo-errado");
                msgErro.innerHTML = msgErro.innerHTML + "Senha e confirmação devem estar iguais</br>";
            }
            
            if(senhaAntiga.length === 0){
                $("#senha_antiga").addClass("campo-errado")
                msgErro.innerHTML = msgErro.innerHTML + "Confirme sua senha antiga";
            } else {
                $("#senha_antiga").removeClass("campo-errado");
            }

        if (tamanhoMinimo && senhasIguais && senhaAntiga.length > 0) {
            document.getElementById("form-alterar-senha").submit();
        }
    }
</script>
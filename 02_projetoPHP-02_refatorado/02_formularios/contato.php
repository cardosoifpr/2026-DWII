<?php
$nome   = "Rafaela Cardoso";
$pagina_atual = "contato";
$caminho_raiz = "../";
$titulo_pagina = "Contato";

$nome_visitante = $_POST['nome_visitante'] ?? '';
$assunto = $_POST['assunto'] ?? '';
$mensagem = $_POST['mensagem'] ?? '';
$erros = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_visitante = trim($_POST['nome_visitante'] ?? '');
    $mensagem = trim($_POST['mensagem'] ?? '');

    if (empty($nome_visitante))  {
        $erros[] = 'O campo Nome é obrigatório.';
    }

    if (empty($assunto)) {
        $erros[] = 'Selecione um assunto.';
    }

    if (empty($mensagem)) {
        $erros[] = 'O campo Mensagem é obrigatório.';
    } elseif (strlen($mensagem) < 10) {
        $erros[] = 'A mensagem deve ter pelo menos 10 caracteres.';
    } elseif (strlen($mensagem) > 500) {
        $erros[] = 'A mensagem não pode ter mais que 500 caracteres.';
    }

    if (empty($erros)) {
        header('Location: obrigado.php?nome=' . urlencode($nome_visitante) . '&assunto=' . urlencode($assunto) . '&chars=' . strlen($mensagem));
        exit;
    }
}
?>

<?php include '../includes/cabecalho.php'; ?>
    <div class="container">
        <h1 class="titulo-secao">Formulário de Contato</h1>

        <form class="form-container" action="contato.php" method="post">
            <label>Seu nome:</label>
            <input type="text" name="nome_visitante">

            <label>Assunto:</label>
            <select name="assunto">
            <option value="">Selecione</option>

            <option value="Dúvida"
            <?php if($assunto=="Dúvida") echo "selected"; ?>>Dúvida</option>

            <option value="Proposta de trabalho"
            <?php if($assunto=="Proposta de trabalho") echo "selected"; ?>>Proposta de trabalho</option>

            <option value="Colaboração"
            <?php if($assunto=="Colaboração") echo "selected"; ?>>Colaboração</option>

            <option value="Outro"
            <?php if($assunto=="Outro") echo "selected"; ?>>Outro</option>

        </select>


            <label>Sua mensagem:</label>
            <textarea name="mensagem" id="mensagem" rows="4" maxlength="500"><?php echo htmlspecialchars($mensagem); ?></textarea>
            
            <p id="contador">
                <?php echo strlen($mensagem); ?> de 500 caracteres usados
            </p>
            <button type="submit">Enviar</button>
        </form>
        <?php if (!empty($erros)) : ?>
            <div class="alerta-erro">
                <h3>⚠️ Corrija os erros:</h3>
                <?php foreach ($erros as $erro) : ?>
                    <p style="margin: 4px 0;">✖ <?php echo htmlspecialchars($erro); ?></p>
                <?php endforeach; ?>
        <?php endif; ?>   
    </div>

<script>
document.addEventListener("DOMContentLoaded", function() {

    const textarea = document.getElementById("mensagem");
    const contador = document.getElementById("contador");

    function atualizarContador() {
        const quantidade = textarea.value.length;
        contador.textContent = quantidade + " de 500 caracteres usados";
    }

    textarea.addEventListener("input", atualizarContador);

});
</script>

<?php include '../includes/rodape.php'; ?>
<?php
$nome   = "Rafaela Cardoso";
$pagina_atual = "contato";
$caminho_raiz = "../";
$titulo_pagina = "Contato";

$nome_visitante = $_POST['nome_visitante'] ?? '';
$mensagem = $_POST['mensagem'] ?? '';
$erros = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_visitante = trim($_POST['nome_visitante'] ?? '');
    $mensagem = trim($_POST['mensagem'] ?? '');

    if (empty($nome_visitante))  {
        $erros[] = 'O campo Nome é obrigatório.';
    }
    if (empty($mensagem)) {
        $erros[] = 'O campo Mensagem é obrigatório.';
    } elseif (strlen($mensagem) < 10) {
        $erros[] = 'A mensagem deve ter pelo menos 10 caracteres.';
    }
    if (empty($erros)) {
        header('Location: obrigado.php?nome=' . urlencode($nome_visitante));
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

            <label>Sua mensagem:</label>
            <textarea name="mensagem" rows="4"></textarea>

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
<?php include '../includes/rodape.php'; ?>
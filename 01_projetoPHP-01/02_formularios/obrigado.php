<?php
$nome = "Rafaela Cardoso";
$pagina_atual = "contato";
$caminho_raiz = "../";
$titulo_pagina = "Obrigado!";

$nome_visitante = htmlspecialchars($_GET['nome'] ?? 'visitante');
$assunto = $_GET['assunto'] ?? '';
$chars = $_GET['chars'] ?? 0;

?>

<?php include '../includes/cabecalho.php'; ?>
    <div class="container confirmacao">
        <p class="confirmacao-icone">✅</p>
        <h1 class="confirmacao-titulo">
            Obrigada, <?php echo $nome_visitante; ?>!
        </h1>
        <p><strong>Assunto:</strong>
        <?php echo htmlspecialchars($assunto); ?></p>

        <p><strong>Tamanho da mensagem:</strong>
        <?php echo htmlspecialchars($chars); ?> de 500 caracteres usados</p>
        
        <p class="confirmacao-texto">
            Sua mensagem foi recebida. Entrarei em contato em breve.
        </p>
        <a href="contato.php" class="btn"> Enviar outra mensagem</a>
    </div>
<?php include '../includes/rodape.php'; ?>
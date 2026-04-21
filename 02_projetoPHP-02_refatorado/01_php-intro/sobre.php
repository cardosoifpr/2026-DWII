<?php
$pagina_atual = 'sobre';
$nome = "Rafaela Cardoso";
$caminho_raiz = "../";

$formacoes = 'Estudante de Técnico em Informática no IFPR. '
           . 'Me formei no Ensino Fundamental na Escola Estadual Medalha Milagrosa. '
           . 'Atualmente bolsista do programa PIBCjr através da UEPG (Universade Estadual de Ponta Grossa). '
           . 'Tenho interesse na área de psicologia. Costumo ler e escutar música.';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include __DIR__ . '/../includes/cabecalho.php'; ?>
    <title>Sobre - <?php echo htmlspecialchars($nome); ?></title>
</head>

<body style="font-family: Arial, sans-serif; margin: 0; background: #f3f4f6;">

    <div class="container">
        <h2>
            Olá, eu sou <?php echo htmlspecialchars($nome); ?>! 👋
        </h2>
        <p><?php echo htmlspecialchars($formacoes); ?></p>
        <a href="index.php"> Voltar ao início</a>
    </div>

    <?php include __DIR__ . '/../includes/rodape.php'; ?>

</body>
</html>
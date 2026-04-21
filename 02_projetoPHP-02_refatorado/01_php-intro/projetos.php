<!-- 01_php-intro/sobre.mim.php -->
 <?php
 $nome = "Rafaela Cardoso";
 $caminho_raiz = "../";
 ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content ="width-device-width, initial-scale=1.0">
    <title> Projetos <?php echo $nome; ?></title>
</head>
<body style="font-family: Arial, sans-serif; margin: 0; background: #f3f4f6;">

    <?php include '../includes/cabecalho.php'; ?>

    <div style="max-width: 800px; margin: 40px auto; padding: 0 20px;">
        <h2> Projetos </h2>
        <p>Olá! Sou <strong><?php echo $nome; ?></strong>, estudante de Técnico de Informática no IFPR Ponta Grossa.</p>
        <p>Por enquanto não há nenhum projeto.</p>
        <a href="index.php"> Voltar ao início</a>
    </div>

    <?php include '../includes/rodape.php'; ?>

</body>
</html>
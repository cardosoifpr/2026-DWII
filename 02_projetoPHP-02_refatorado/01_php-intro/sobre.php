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
    <title>Sobre - <?php echo $nome; ?></title>
</head>
<body style="font-family: Arial, sans-serif; margin: 0; background: #f3f4f6;">

    <?php include '../includes/cabecalho.php'; ?>

    <div style="max-width: 800px; margin: 40px auto; padding: 0 20px;">
        <h2>Sobre mim</h2>
        <p>Olá! Sou <strong><?php echo $nome; ?></strong>, estudante de Técnico de Informática no IFPR Ponta Grossa.</p>
        <p>Estou aprendendo desenvolvimento web no IFPR. Atualmente bolsista do programa PIBCJR através da UEPG (Universade Estadual de Ponta Grossa). Tenho interresse na área de psicologia. Costumo ler e escutar música. </p>
        <a href="index.php"> Voltar ao início</a>
    </div>

    <?php include '../includes/rodape.php'; ?>

</body>
</html>
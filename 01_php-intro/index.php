<!-- 01_php-intro/index.php -->
<!--
    Disciplina: Desenvolvimento Web II (DWII)
    Aula: 03- Arquitetura Web e Introdução ao PHP
    Autor: Rafaela Cardoso
    Data: 02/03/2026
    Respoitório: https://github.com/cardosoifpr/2026-DWII
-->

<?php
// variáveis PHP - serão usadas no HTML abaixo
$nome = "Rafaela Cardoso";
$profissao = "Estudante de Tecnologia";
$curso = "Técnico de Informática";
$ano = "2026";
$pagina_atual = "inicio";
?>
<!- DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portifólio - <?php echo $nome; ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #f3f4f6; }
        nav { background: #3b579d; padding: 15px 30px; }
        nav a { color: white; text-decoration: none; margin-right: 20px; font-weight: bold; }
        nav a:hover { text-decoration: underline; }
        .hero { background: linear-gradient(135deg, #3b579d, #2a4080); color: white; text-align: center; padding: 60px 20px; }
        .hero h1 { font-size: 2.5em; margin-bottom: 10px; }
        .hero p { font-size: 1.2em; opacity: 0.9; }
        .container { max-width: 800px; margin: 40px auto; padding: 0 20px; }
        footer { background: #010000; color: #6b7280; text-align: center; padding: 20px; margin-top: 60px; font-size: 14px; }
    </style>
</head>
<body>
    <?php include 'includes/cabecalho.php'; ?>

    <div class="hero">
        <h1><?php echo $nome; ?></h1>
        <p><?php echo $profissao; ?> | <?php echo $curso; ?></p>
    </div>

    <div class="container">
        <h2>Bem vindo ao meu portifólio</h2>
        <p>Está página foi gerada pelo PHP em: <strong><?php echo date("02/03/2026 \à\s 16:52"); ?> </strong></p>
    </div>

    <?php include 'includes/rodape.php'; ?>
   
</body>
</html>
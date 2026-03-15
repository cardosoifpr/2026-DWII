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
$profissao = "Técnica em Informática em formação";
$curso = "Técnico de Informática - IFPR";
$ano = "2026";
$caminho_raiz = "../";
?>
<!- DOCTYPE html>
<html lang="pt-BR">
<?php include '../includes/cabecalho.php'; ?>
<body>
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
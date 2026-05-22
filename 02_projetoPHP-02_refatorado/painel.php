<?php
/**
 * Disciplina : Desenvolvimento Web II (DWII)
 * Arquivo : painel.php (raiz)
 * Descrição : Área restrita — exige login via includes/auth.php.
 */

require_once __DIR__ . '/includes/auth.php';
requer_login();

$pagina_atual = 'painel';
$titulo_pagina = 'Painel – Portfólio';
$caminho_raiz = './';

require_once __DIR__ . '/includes/cabecalho.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once __DIR__ . '/includes/cabecalho.php'; ?>
</head>
<body>
<main>
    <div class="container">
        <h1 class="titulo-secao">Painel</h1>
        <p>Ola, <strong><?php echo htmlspecialchars(usuario_atual()); ?></strong>! Você está em uma área restrita.</p>
        <p>
            <a href="admin.php" class="btn-primario">Gerenciar projetos</a>
        </p>
    </div>

</main>
    <?php require_once __DIR__ . '/includes/rodape.php'; ?>
</body>
</html>

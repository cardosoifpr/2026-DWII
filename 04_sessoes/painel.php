<?php
/**
 * Disciplina: Desenvolvimento Web II (DWII)
 * Aula: 06 - Autenticação com sessões e controle de acesso
 * Autor: Rafaela Cardoso
 * Arquivo: 04_sessoes/painel.php
 * Data: 23/03/2026
*/

require_once __DIR__ . '/includes/auth.php';
requer_login();
$mensagem = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

$titulo_pagina = 'Painel - Área Restrita';
$caminho_raiz = '../';
$pagina_atual = '';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php require_once __DIR__ . '/../includes/cabecalho.php'; ?>
</head>
<body>
<div class = "container">
    <?php if ($mensagem):  // logo após ser autenticado, aparece a mensagem de boas vindas?>
       
        <div class="alerta-sucesso">
            <p><?php echo htmlspecialchars($mensagem); ?></p>
        </div>
    <?php endif; ?>
    <div class="alerta-sucesso">
        <h3> Você está autenticado!</h3>
        <p><strong>Usuário:</strong>
            <?php echo htmlspecialchars($_SESSION['logado_em'] ?? '-'); ?>
        </p>
        <p>Nas próximas aulas este painel terá funcionalidades reais (CRUD).</p>
    </div>

    <p style="margin-top: 24px; text-align: center;">
        <a href="logout.php"
            style="background: #9c2456; color: white; padding: 10px 24px; border-radius: 6px; text-decoration: none; font-weight: bold;">Sair</a>
    </p>
</div>

<?php require_once __DIR__ . '/../includes/rodape.php'; ?>
</body>
</html>
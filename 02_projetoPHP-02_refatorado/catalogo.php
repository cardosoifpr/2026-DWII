<?php
if (session_status() === PHP_SESSION_NONE) session_start();

$pagina_atual = "catalogo";
$titulo_pagina = "Catálogo de Tecnologias";
$caminho_raiz = './';


// Incluir a conexão PDO - disponibiliza a variável $pdo
require_once __DIR__ . '/includes/conexao.php';
$pdo = conectar();

// Buscar todos os registros - query() para SELECTs sem par}ametros
$stmt = $pdo->query(
    "SELECT * FROM tecnologias
       WHERE status = 'ativo'
       ORDER BY criado_em DESC"
);
$tecnologias = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include __DIR__ . '/includes/cabecalho.php'; ?>
</head>
<body>
    <div class="container">
        <h1 class="titulo-secao"> Catálogo de Tecnologias</h1>
        <p style="color: #2e010c; margin-bottom: 20px;">
            <?php echo count($tecnologias); ?> tecnologia (s) cadastrada (s)
        </p>
        
        <?php if (empty($tecnologias)): ?>
            <div class="card" style="text-align: center; padding: 40px 20px; color: #2c9ddf00;">
                <p style="font-size: 40px; margin: 0 0 12px;"></p>
                <p style="font-size: 16px; margin: 0;">Nenhuma tecnologia ativa.</p>
            </div>

        <?php else: ?>

        <?php foreach ($tecnologias as $tec): ?>
            <div class="card">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <h3><?php echo htmlspecialchars($tec['nome']); ?></h3>
                    <span style="background: #f5e8f0; color: #50031d; padding: 3px 10px; border-radius: 20px; font-size: 13px;">
                        <?php echo htmlspecialchars($tec['categoria']); ?>
                    </span>
                </div>
                <p><?php echo htmlspecialchars($tec['descricao']); ?></p>
                <a href="detalhe.php?id=<?php echo $tec['id']; ?>"
                    style="color: #520316; font-size: 14px; font-weight: bold; display: inline-block; margin-top: 10px;">
                    Ver detalhes
                </a>
            </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
        
    <?php include __DIR__ . '/includes/rodape.php'; ?>
</body>
</html>
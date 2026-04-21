<!--
    Disciplina: Desenvolvimento Web II (DWII)
    Aula: 05 - PHP + MariaDB : persistência de dados via PDO
    Autor: Rafaela Cardoso
    Data: 16/03/2026
-->
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
$titulo_pagina = "Catálogo de Tecnologias";
$pagina_atual = "catalogo";

// Incluir a conexão PDO - disponibiliza a variável $pdo
require_once 'includes/conexao.php';

// Buscar todos os registros - query() para SELECTs sem par}ametros
$stmt = $pdo->query('SELECT * FROM tecnologias ORDER BY nome ASC');
$tecnologias = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include 'includes/cab_pdo.php'; ?>
</head>
<body>
    <div class="container">
        <h1 class="titulo-secao"> Catálogo de Tecnologias</h1>
        <p style="color: #530a1c; margin-bottom: 20px;">
            <?php echo count($tecnologias); ?> tecnologia (s) cadastrada (s)
        </p>
        
        <?php foreach ($tecnologias as $tec): ?>
            <div class="card">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <h3><?php echo htmlspecialchars($tec['nome']); ?></h3>
                    <span style="background: #f5e8f0; color: #6d0e2e; padding: 3px 10px; border-radius: 20px; font-size: 13px;">
                        <?php echo htmlspecialchars($tec['categoria']); ?>
                    </span>
                </div>
                <p><?php echo htmlspecialchars($tec['descricao']); ?></p>
                <a href="/03_pdo/detalhe.php?id=<?php echo $tec['id']; ?>"
                    style="color: #8a174c; font-size: 14px; font-weight: bold; display: inline-block; margin-top: 10px;">
                    Ver detalhes
                </a>
            </div>
        <?php endforeach; ?>
    </div>
        
    <?php include 'includes/rod_pdo.php'; ?>
</body>
</html>
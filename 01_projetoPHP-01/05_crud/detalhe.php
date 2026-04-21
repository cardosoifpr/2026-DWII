<?php
// Caminho relativo da subpasta 05_crud/ até a raiz (usado pelo CSS global)
$caminho_raiz = '../';

// Incluir a conexão PDO
require_once 'includes/conexao.php';
$pdo = conectar();

// Validar o ID recebido via GET — retorna false se não for inteiro válido
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    // ID inválido ou ausente — redirecionar para a lista
    header('Location: index.php');
    exit;
}

// prepare() + execute() — NUNCA concatenar variáveis no SQL (previne SQL Injection)
$stmt = $pdo->prepare('SELECT * FROM projetos WHERE id = :id');
$stmt->execute(['id' => $id]);
$projeto = $stmt->fetch(); // fetch() retorna UMA linha (ou false se não encontrou)

if (!$projeto) {
    // Registro não encontrado — redirecionar para a lista
    header('Location: index.php');
    exit;
}

// Variáveis para o cabeçalho global
$titulo_pagina = htmlspecialchars($projeto['nome']) . " — Projeto";
$pagina_atual = "projetos";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <!-- Cabeçalho global via proxy local -->
    <?php require_once __DIR__ . '/../includes/cabecalho.php'; ?>
</head>
<body>

    <div class="container">

        <a href="index.php" style="color: #580827; font-weight: bold;">← Voltar a Projetos</a>

        <div class="card" style="margin-top: 20px;">
            <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                <h1 style="color: #790f3b; margin: 0 0 8px; font-size: 24px;">
                    <?php echo htmlspecialchars($projeto['nome']); ?>
                </h1>
            </div>

            <p style="font-size: 16px; margin: 16px 0;">
                <?php echo htmlspecialchars($projeto['descricao']); ?>
            </p>

            <!-- Tabela de metadados do registro -->
            <table style="width: 100%; border-collapse: collapse; margin-top: 20px; font-size: 14px;">
                <tr style="background: #f3f4f6;">
                    <td style="padding: 10px; border: 1px solid #e5e7eb; font-weight: bold; width: 160px;">ID</td>
                    <td style="padding: 10px; border: 1px solid #e5e7eb;">
                        <?php echo $projeto['id']; ?>
                    </td>
                </tr>

                <tr>
                    <td style="padding: 10px; border: 1px solid #e5e7eb; font-weight: bold;">
                        Tecnologias
                    </td>
                    <td style="padding: 10px; border: 1px solid #e5e7eb;">
                        <?php echo $projeto['tecnologias']; ?>
                    </td>
                </tr>

                <tr>
                    <td style="padding: 10px; border: 1px solid #e5e7eb; font-weight: bold;">
                        Link Github
                    </td>
                    <td style="padding: 10px; border: 1px solid #e5e7eb;">
                        <?php echo $projeto['link_github']; ?>    
                    </td>
                </tr>

                <tr>
                    <td style="padding: 10px; border: 1px solid #e5e7eb; font-weight: bold;">
                        Ano de criação
                    </td>
                    <td style="padding: 10px; border: 1px solid #e5e7eb;">
                        <?php echo $projeto['ano']; ?>
                    </td>
                </tr>

                <tr style="background: #f3f4f6;">
                    <td style="padding: 10px; border: 1px solid #e5e7eb; font-weight: bold;">
                        Cadastrado em
                    </td>
                    <td style="padding: 10px; border: 1px solid #e5e7eb;">
                        <!-- Formatar timestamp para padrão BR -->
                        <?php echo date('d/m/Y \à\s H:i', strtotime($projeto['criado_em'])); ?>       
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <!-- Rodapé global via proxy local -->
    <?php require_once __DIR__ . '/../includes/rodape.php'; ?>

</body>
</html>
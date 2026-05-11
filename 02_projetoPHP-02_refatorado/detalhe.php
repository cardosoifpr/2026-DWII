<?php
/**
 * =========================================================
 * Disciplina : Desenvolvimento Web II (DWII)
 * Projeto    : Portfólio Pessoal — versão refatorada
 * Arquivo    : contato.php  (migrado de 03_pdo/detalhe.php)
 * Autor      : Rafaela Cardoso
 * Data       : 27/04/2026
 * Descrição     : Detalhe de uma tecnologia. Acessada via get ?id=N .
 * =========================================================
 *
 * ⚠️ session_start() é necessário AQUI porque $_SESSION é usado
 *   no bloco POST abaixo, antes de incluir cabecalho.php.
 *   Nenhum caractere pode aparecer antes deste bloco.
 */

if (session_status() === PHP_SESSION_NONE) session_start();
// Caminho relativo da subpasta 03_pdo/ até a raiz (usado pelo CSS global)
$pagina_atual = 'catalago';
$titulo_pagina = 'Detalhe | Portfolio DWII';
$caminho_raiz = './';

// Incluir a conexão PDO
require_once __DIR__ . '/includes/conexao.php';

// Validar o ID recebido via GET — retorna false se não for inteiro válido
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id || $id <= 0) {
    // ID inválido ou ausente — redirecionar para a lista
    header('Location: index.php');
    exit;
}

$pdo = conectar();
// prepare() + execute() — NUNCA concatenar variáveis no SQL (previne SQL Injection)
$stmt = $pdo->prepare("SELECT * FROM tecnologias WHERE id = :id AND status = 'ativo' LIMIT 1");
$stmt->execute([':id' => $id]);
$tec = $stmt->fetch(); // fetch() retorna UMA linha (ou false se não encontrou)

if (!$tec) {
    // Registro não encontrado — redirecionar para a lista
    header('Location: catalago.php');
    exit;
}

// Variáveis para o cabeçalho global
$titulo_pagina = htmlspecialchars($tec['nome']) . " | Portfolio DWII";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <!-- Cabeçalho global via proxy local -->
    <?php include __DIR__ . '/includes/cabecalho.php'; ?>
</head>
<body>

    <div class="container">

        <a href="index.php" style="color: #580827; font-weight: bold;">← Voltar ao catálogo</a>

        <div class="card" style="margin-top: 20px;">
            <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                <h1 style="color: #790f3b; margin: 0 0 8px; font-size: 24px;">
                    <?php echo htmlspecialchars($tec['nome']); ?>
                </h1>

                <span style="background: #e8edf5; color: #740549; padding: 4px 12px;
                         border-radius: 20px; font-size: 13px; font-weight: bold;
                         white-space: nowrap;">
                    <?php echo htmlspecialchars($tec['categoria']); ?>
                </span>
            </div>

            <p style="font-size: 16px; margin: 16px 0;">
                <?php echo htmlspecialchars($tec['descricao']); ?>
            </p>

            <!-- Tabela de metadados do registro -->
            <table style="width: 100%; border-collapse: collapse; margin-top: 20px; font-size: 14px;">
                <tr style="background: #f3f4f6;">
                    <td style="padding: 10px; border: 1px solid #e5e7eb; font-weight: bold; width: 160px;">ID</td>
                    <td style="padding: 10px; border: 1px solid #e5e7eb;">
                        <?php echo $tec['id']; ?>
                    </td>
                </tr>

                <tr>
                    <td style="padding: 10px; border: 1px solid #e5e7eb; font-weight: bold;">
                        Ano de criação
                    </td>
                    <td style="padding: 10px; border: 1px solid #e5e7eb;">
                        <?php echo $tec['ano_criacao']; ?>
                    </td>
                </tr>

                <tr style="background: #f3f4f6;">
                    <td style="padding: 10px; border: 1px solid #e5e7eb; font-weight: bold;">
                        Cadastrado em
                    </td>
                    <td style="padding: 10px; border: 1px solid #e5e7eb;">
                        <!-- Formatar timestamp para padrão BR -->
                        <?php echo date('20/03/2026 \à\s 20:32', strtotime($tec['criado_em'])); ?>    
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <!-- Rodapé global via proxy local -->
    <?php include __DIR__ . '/includes/rodape.php'; ?>

</body>
</html>
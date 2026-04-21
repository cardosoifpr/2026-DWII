<?php
/** 
 * Aula    : 07 – CRUD: Create e Read
 * Arquivo : 05_crud/index.php
 * Autor   : RAFAELA CARDOSO
 * Data    : 30/03/2026
 * Descrição: Lista todos os projetos cadastrados no banco (read)
 */

require_once __DIR__ . '/../04_sessoes/includes/auth.php';
requer_login();

require_once __DIR__ . '/includes/conexao.php';

// Busca todos os projetos ordenados 
$pdo = conectar();
$filtroTec = $_GET['tecnologia'] ?? '';

// busca tecnologias do banco (para o select)
$stmtTec = $pdo->query('SELECT DISTINCT tecnologias FROM projetos');
$tecnologias = $stmtTec->fetchAll();

//variavel busca = variável que vai guardar o texto digitado pelo usuário
$busca = trim($_GET['busca'] ?? ''); // vai pegar o que foi digitado no campo. se nada for digitado vai retornar vazio


$sql = "SELECT * FROM projetos WHERE 1=1";
$params = [];

// filtro por nome
if ($busca !== '') {
    $sql .= " AND nome LIKE :termo";
    $params[':termo'] = '%' . $busca . '%';
}

// filtro por tecnologia
if ($filtroTec !== '') {
    $sql .= " AND tecnologias = :tecnologia";
    $params[':tecnologia'] = $filtroTec;
}

// ordenação
$sql .= " ORDER BY criado_em DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute($params);

$projetos = $stmt->fetchAll();

// --- Mensagem de sucesso após cadastro ---
$cadastroOk = isset($_GET['cadastro']) && $_GET['cadastro'] === 'ok';
$editadoOk = isset($_GET['editado']) && $_GET['editado'] === 'ok';
$excluidoOk = isset($_GET['excluido']) && $_GET['excluido'] === 'ok';
$erroMsg = isset($_GET['erro']) ? $_GET['erro'] : '';

$titulo_pagina = 'Meus Projetos — Portfólio';
$caminho_raiz = '../';
$pagina_atual = '';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php require_once __DIR__ . '/../includes/cabecalho.php'; ?>
</head>
<body>

<div class="container">

    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px; margin-bottom: 20px;">
        <h1 class="titulo-secao" style="margin: 0;">📁 Meus Projetos</h1>
        <a href="cadastrar.php" class="btn-primario">Novo Projeto</a>    
    </div>

    <form method="get" style="margin-bottom: 15px;">

        <select name="tecnologia">
            <option value="">Selecione uma tecnologia</option>

            <?php foreach ($tecnologias as $tec): ?>
                <option value="<?php echo htmlspecialchars($tec['tecnologias']); ?>"
                    <?php echo ($filtroTec === $tec['tecnologias']) ? 'selected' : ''; ?>>
                    
                    <?php echo htmlspecialchars($tec['tecnologias']); ?>
                </option>
            <?php endforeach; ?>
        </select>

        <input type="text" name="busca"
            placeholder="Buscar por nome"
            value="<?php echo htmlspecialchars($_GET['busca'] ?? ''); ?>">
        
        <button type="submit">🔍 Buscar</button>

    </form>


    <?php if ($cadastroOk): ?>
        <div class="alerta-sucesso">
            <p style="margin: 0;">✅ Projeto cadastrado com sucesso!</p>
        </div>
    <?php endif; ?>

    <?php if ($editadoOk): ?>
        <div class="alerta-sucesso">
            <p style="margin: 0;">✅ Projeto atualizado com sucesso!</p>
        </div>
    <?php endif; ?>

    <?php if ($excluidoOk): ?>
        <div class="alerta-sucesso">
            <p style="margin: 0;">🗑️ Projeto removido com sucesso!</p>
        </div>
    <?php endif; ?>

    <?php if ($erroMsg === 'nao_encontrado'): ?>
        <div class="alerta-erro">
            <p style="margin: 0;">⚠️ Projeto não encontrado. Ele pode já ter sido removido.</p>
        </div>
    <?php elseif ($erroMsg === 'id_invalido'): ?>
        <div class="alerta-erro">
            <p style="margin: 0;">⚠️ Requisição inválida.</p>
        </div>
    <?php endif; ?>

    <?php if (empty($projetos)): ?>

        <!-- Estado vazio: nenhum projeto ainda -->
        <div class="card" style="text-align: center; padding: 40px 20px; color: #6b7280;">
            <p style="font-size: 40px; margin: 0 0 12px;">🖥️</p>
            <p style="font-size: 16px; margin: 0 0 16px;">Nenhum projeto cadastrado ainda.</p>
            <a href="cadastrar.php" class="btn-primario">Cadastrar o primeiro projeto</a>
        </div>

    <?php else: ?>

        <!-- Grade de projetos -->
        <br> <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(450px, 1fr)); gap: 20px;">    

            <?php foreach ($projetos as $projeto): ?>
                <div class="card">
                <div style="display: flex; justify-content: space-between; align-items: center;">   
                    <h3><?php echo htmlspecialchars($projeto['nome']); ?></h3>
                </div>
                <a href="/05_crud/detalhe.php?id=<?php echo $projeto['id']; ?>"
                    style="color: #8a174c; font-size: 14px; font-weight: bold; display: inline-block; margin-top: 10px;">
                    Ver detalhes
                </a>
                <div style="margin-top: 12px; display: flex; gap: 8px; flex-wrap: wrap;">
                    <a href="editar.php?id=<?php echo (int) $projeto['id']; ?>" class="btn-secundario">✏️ Editar</a>
                    <a href="excluir.php?id=<?php echo (int) $projeto['id']; ?>" class="btn-perigo">🗑️ Excluir</a>
                </div>
                </div>
            <?php endforeach; ?>

        </div>

        <p style="margin-top: 16px; font-size: 14px; color: #6b7280; text-align: right;">
            <?php echo count($projetos); ?> projeto(s) cadastrado(s)
        </p>

    <?php endif; ?>

</div>

<?php require_once __DIR__ . '/../includes/rodape.php'; ?>
</body>
</html>
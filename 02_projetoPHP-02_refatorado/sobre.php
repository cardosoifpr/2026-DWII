<?php
if (session_status() === PHP_SESSION_NONE) session_start();

$pagina_atual = 'sobre';
$nome = "Rafaela Cardoso";
$caminho_raiz = "./";

$formacoes = [
    "Ensino Fundamental - Escola Estadual Medalha Milagrosa",
    "Técnico em Informática — IFPR (em andamento)",
    "Curso de Desenvolvimento Web (2025)",
    // ← adicione suas formações aqui
];
?>

<!DOCTYPE html>

<html lang="pt-BR">
<head>
  <!-- ✅ '/../includes/' → '/includes/' -->
  <?php include __DIR__ . '/includes/cabecalho.php'; ?>
</head>
<body>
  <div class="container">
    <h1 class="titulo-secao">👤 Sobre mim</h1>

<div class="card">
  <h3>Quem sou eu</h3>
  <!-- $nome disponível via fallback do cabecalho.php -->
  <p>Olá! Sou <strong><?php echo htmlspecialchars($nome); ?></strong>,
     estudante do 3º ano do Técnico em Informática no IFPR de Ponta Grossa.</p>
</div>

<div class="card">
  <h3>Formação</h3>
  <ul style="margin: 0; padding-left: 20px; color: #374151;">
    <?php foreach ($formacoes as $item): ?>
      <li style="margin-bottom: 6px;"><?php echo htmlspecialchars($item); ?></li>
    <?php endforeach; ?>
  </ul>
</div>
  </div>

  <!-- ✅ '/../includes/' → '/includes/' -->

  <?php include __DIR__ . '/includes/rodape.php'; ?>

</body>
</html>
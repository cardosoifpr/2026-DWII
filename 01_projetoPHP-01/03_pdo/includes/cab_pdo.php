<?php
/*
 ════════════════════════════════════════════════════════════
 * ARQUIVO    : 03_pdo/includes/cab_pdo.php
 * Disciplina : Desenvolvimento Web II (2026-DWII)
 * Aula       : 05 — PHP + MariaDB: persistência de dados via PDO
 * Autor      : Rafaela Cardoso
 * ════════════════════════════════════════════════════════════
 *
 *          
 */

 // Garantir valores padrão caso a página não defina essas variáveis
if (!isset($titulo_pagina)) $titulo_pagina = "Xatálogo de Tecnologias";
if (!isset($pagina_atual)) $pagina_atual = "";

// Caminho relativo da subpasta 03_pdo/ até a raiz do repositório
$caminho_raiz = '../';

//incluir o cabeçalho global usando caminho absoluto no servidor
include __DIR__ . '/../../includes/cabecalho.php';
?>
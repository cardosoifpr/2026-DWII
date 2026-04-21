<?php
/*
 ════════════════════════════════════════════════════════════
 * ARQUIVO    : includes/cabecalho.php
 * Disciplina : Desenvolvimento Web II (2026-DWII)
 * Aula       : 04 — PHP para Web: Formulários, GET e POST
 * Autor      : Rafaela Cardoso
 * Conceitos  : Modularização, include, isset(), caminho dinâmico
 * ════════════════════════════════════════════════════════════
 *
 * Responsabilidade: gera <meta>, <title>, link para o CSS externo e inclui o nav.php
 * 
 * Variáveis esperadas na página que incluí este arquivo:
 *      $titulo_pagina - string (opcional): texto da aba do navegador
 *      $caminho_raiz - string: caminho relativo até a raiz do projeto
 *                      Ex: '../' para página em 01_php-intro/ ou 02_formularios/ (um nível acima)
 */

 //isset () verifica se a váriavel foi definida antes de usá-la
 // valor padrão ativa caso a página esqueça de declarar $titulo_pagina

if (!isset($titulo_pagina)) $titulo_pagina = "Portfólio DWII";
if (!isset($caminho_raiz)) $caminho_raiz = "../"; //padrão: um nível acima
?>

<meta charset="UTF-8">
<meta name="viewport" content="width-device-width, initial-scale=1.0">
<title><?php echo htmlspecialchars($titulo_pagina); ?></title>

<!--
    <link> aponta para o CSS usando $caminho_raiz.
    assim um único arquivo css serve a todas as pastas
-->
<link rel="stylesheet" href="<?php echo $caminho_raiz; ?>includes/style.css">
<?php
include __DIR__ . '/nav.php';
?>
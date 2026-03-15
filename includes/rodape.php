<?php
/*
 ════════════════════════════════════════════════════════════
 * ARQUIVO    : includes/cabecalho.css
 * Disciplina : Desenvolvimento Web II (2026-DWII)
 * Aula       : 04 — PHP para Web: Formulários, GET e POST
 * Autor      : Rafaela Cardoso
 * Conceitos  : Modularização, date(), isset(), fallback defensivo
 * ════════════════════════════════════════════════════════════
 */

//fallback:  se $nome nao estiver definido na pagina, exibe portfolio

$autor = isset($nome) ? htmlspecialchars($nome): "Portfólio";
?>

<footer>
    <?php echo $autor; ?>
    &copy; <?php echo date("Y"); ?>
    | Desenvolvido com PHP
    | IFPR - Ponta Grossa
</footer>

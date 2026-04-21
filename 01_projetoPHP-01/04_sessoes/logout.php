<?php
/**
 * Disciplina: Desenvolvimento Web II (DWII)
 * Aula: 06 - Autenticação com sessões e controle de acesso
 * Autor: Rafaela Cardoso
 * Arquivo: 04_sessoes/logout.php
 * Data: 23/03/2026
*/

session_start();

// limpar todos os dados da sessão
session_unset();

// destruir a sessão no servidor
session_destroy();

// redirecionar para o login
header('Location: login.php');
exit;
?>
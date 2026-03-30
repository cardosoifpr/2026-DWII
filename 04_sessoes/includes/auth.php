<?php
/**
 * Disciplina: Desenvolvimento Web II (DWII)
 * Aula: 06 - Autenticação com sessões e controle de acesso
 * Autor: Rafaela Cardoso
 * Arquivo: 04_sessoes/auth.php
 * Data: 23/03/2026
*/

/**
 * requer_login()
 * verifica se há sessão ativa
 * se não houver, redireciona para o login e encerra
 * chamar no topo de qualquer pagina protegida
 */
function requer_login(): void {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['usuario'])) {
        header('Location: login.php');
        exit;
    }
}

/**
 * usuario_logado()
 * retornar o nome do usuario da sessao ou string vazia
 */
function usuario_logado(): string {
    return $_SESSION['usuario'] ?? '';
}

/**
 * redirecionar_se_logado()
 * se o usuário já estiver autenticado, envia para o painel
 * usar no topo da página de login
 */
function redirecionar_se_logado(): void {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_SESSION['usuario'])) {
        header('Location: painel.php');
        exit;
    }
}
?>
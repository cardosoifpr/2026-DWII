<?php
/**
 * Disciplina : Desenvolvimento Web II (DWII)
 * Arquivo: includes/auth.php
 * Descrição : Helpers de autenticação - verefica login e protege páginas
 */
if (session_status() === PHP_SESSION_NONE) session_start();

function usuario_logado(): bool {
    return isset($_SESSION['usuario']) && $_SESSION['usuario'] !== '';
}

function usuario_atual(): ?string {
    return $_SESSION['usuario'] ?? null;
}

/**
 * bloqueia o acesso a uma página: se não estiver logado, redireciona.
 * chamar esta função no topo de qualquer página privada
 */

function requer_login(): void {
    if (!usuario_logado()) {
        header('Location: login.php');
        exit;
    }
}
?>
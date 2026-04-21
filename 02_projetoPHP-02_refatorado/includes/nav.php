<?php
/*
 ════════════════════════════════════════════════════════════
 * ARQUIVO    : includes/nav.css
 * Disciplina : Desenvolvimento Web II (2026-DWII)
 * Aula       : 04 — PHP para Web: Formulários, GET e POST
 * Autor      : Rafaela Cardoso
 * Conceitos  : Menu dinâmico, operador ternário, $caminho_raiz
 * ════════════════════════════════════════════════════════════
 */

if (!isset($pagina_atual)) $pagina_atual = "";
if (!isset($caminho_raiz)) $caminho_raiz = "./";

function menu_class($item, $atual) {
    return ($item === $atual) ? 'class="ativo"' : '';
}

$logado = isset($_SESSION['usuario']);
?>

<!-- nav usa a classe CSS definida em style.css — sem style inline -->
<nav>

    <!-- Links para o portfólio — Aula 03 -->
    <a href="<?php echo $caminho_raiz; ?>01_php-intro/index.php"
        <?php echo menu_class("inicio", $pagina_atual); ?>>
        🏠 Início
    </a>

    <a href="<?php echo $caminho_raiz; ?>01_php-intro/sobre.php"
        <?php echo menu_class("sobre", $pagina_atual); ?>>
        👤 Sobre
    </a>

    <a href="<?php echo $caminho_raiz; ?>01_php-intro/projetos.php"
        <?php echo menu_class("projetos", $pagina_atual); ?>>
        🚀 Projetos
    </a>

    <!-- Link para o formulário — Aula 04 -->
    <a href="<?php echo $caminho_raiz; ?>02_formularios/contato.php"
        <?php echo menu_class("contato", $pagina_atual); ?>>
        📬 Contato
    </a>
    <a href="<?php echo $caminho_raiz; ?>03_pdo/index.php"
        <?php echo menu_class("catalogo", $pagina_atual); ?>>
        🗄️ Catálogo
    </a>

    <?php if ($logado): ?>
        <a href="<?php echo $caminho_raiz; ?>05_crud/index.php"
            <?php echo menu_class("crud", $pagina_atual); ?>>
            🗂️ CRUD
        </a>
        <a href="<?php echo $caminho_raiz; ?>04_sessoes/logout.php"
            <?php echo menu_class("sair", $pagina_atual); ?>>
            🚪Sair
        </a>
    <?php else: ?>
        <a href="<?php echo $caminho_raiz; ?>04_sessoes/login.php"
        <?php echo menu_class("login", $pagina_atual); ?>>
        🔒 Login
        </a>
    <?php endif; ?>


</nav>
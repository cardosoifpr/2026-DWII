<?php
/**
 * ===============================================================
 * ARQUIVO    : index.php  (raiz do repositório 2026-DWII)
 * Disciplina : Desenvolvimento Web II (2026-DWII)
 * Aula       : 04 — PHP para Web: Formulários, GET e POST
 * Autor      : Rafaela Cardoso
 * Conceitos  : Ponto de entrada, array associativo, foreach,
 *              date(), htmlspecialchars()
 * ===============================================================
 * Hub de navegação — exibido quando o servidor sobe na raiz:
 * php -S localhost:8000
 * 
 * Por estar fora das subpastas, este arquivo NÃO usa os
 * includes compartilhados (cabecalho.php, nav.php, rodape.php).
 * Cabeçalho, nav e rodapé são definidos inline aqui.
 */

// --- VARIÁVEIS DE CONTEÚDO ----------
$nome = "Rafaela Cardoso";
$subtitulo = "Repositório 2026 - DesenvolvimentoWeb II";

// --- CATÁLOGO DE AULAS ---------
$aulas = [
    [
        "numero"    => "00",
        "nome"      => "Apresentação Pessoal",
        "descricao" => "Página estática com HTML e CSS - foto de perfil e layout responsivo",
        "link"      => "00_apresentacao/index.html",
        "icone"     => "👨‍💻",
        "cor"       => "#c53460",
        "conceitos" => "HTML semântico, CSS Flexbox, responsividade",
    ],
    [
        "numero"    => "03",
        "nome"      => "Portfólio Dinâmico com PHP",
        "descricao" => "Mini-site de portfólio com variáveis, includes e menu dinâmico.",
        "link"      => "01_php-intro/index.php",
        "icone"     => "🐘",
        "cor"       => "#c53460",
        "conceitos" => "Variáveis, echo, include, foreach, operador ternário",
    ],
    [
        "numero"    => "04",
        "nome"      => "Formulário de contato",
        "descricao" => "Formulário de validação no servidor, proteção XSS e padrão PRG.",
        "link"      => "02_formularios/contato.php",
        "icone"     => "📫",
        "cor"       => "#c53460",
        "conceitos" => '$_POST, validação, htmlspecialchars(), header() + exit',
    ],
    [
        "numero"    => "05",
        "nome"      => "Catálogo de Tecnologias",
        "descricao" => "Formulário de validação no servidor, proteção XSS e padrão PRG.",
        "link"      => "03_pdo/index.php",
        "icone"     => "🗄️",
        "cor"       => "#c53460",
        "conceitos" => '$_POST, validação, htmlspecialchars(), header() + exit',
    ],
    [
        "numero"    => "06",
        "nome"      => "Autenticação com Sessões e Controle de Acesso",
        "descricao" => "HTTP stateless, fluxo de sessão, onde os dados ficam no servidor e boas práticas de segurança",
        "link"      => "04_sessoes/index.php",
        "icone"     => "🔐",
        "cor"       => "#c53460",
        "conceitos" => 'session_start(), $_SESSION e o cookie PHPSESSID',
    ],
    [
        "numero"    => "07",
        "nome"      => "CRUD: Criação e Listagem de Registros",
        "descricao" => "Cadastro de projetos no banco e listá-los dinamicamente no portfólio",
        "link"      => "05_crud/index.php",
        "icone"     => "🗃️",
        "cor"       => "#c53460",
        "conceitos" => 'CRUD e SQL seguro',
    ],
];
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($subtitulo); ?></title>

    <!--
    index.php está na RAIZ (2026-DWII/).
    A pasta includes/ também está na raiz.
    -->
   <link rel="stylesheet" type="text/css" href="includes/style.css"/>
</head> 

<body>

<header>
    <h1><?php echo htmlspecialchars($nome); ?> 👨‍💻</h1>
    <p><?php echo htmlspecialchars($subtitulo); ?></p>
</header>

<div class="container">

    <!-- Instruções de uso -->
    <div class="box-info" style="margin-top: 0;">
        <h3>Como executar esse repositório</h3>

        <p style="font-size: 14px; color: #374151;">
            Suba o servidor PHP na <strong>raiz</strong> para acessar as aulas:
        </p>

        <div style="
            background: #010000;
            color: #a8e6a3;
            padding: 10px 16px;
            border-radius: 6px;
            margin-top: 10px;
            font-family: 'Courier New', monospace;
            font-size: 13px;
            line-height: 1.8;
        ">
            cd ~/workspaces/2026-DWII<br>
            php -S localhost:8000
        </div>

        <p style="font-size: 13px; color: #6b7280; margin-top: 8px;">
            Esta página é o hub de navegação. Use os botões abaixo para acessar cada projeto.
        </p>
    </div>

    <!-- LISTAGEM DAS AULAS -->
    <h2 class="secao">📁 Projetos por Aula</h2>

    <?php foreach ($aulas as $aula): ?>

        <div class="card-aula" style="border-left-color: <?php echo $aula['cor']; ?>;">

            <div class="icone">
                <?php echo $aula['icone']; ?>
            </div>

            <div class="conteudo">

                <span class="badge">
                    Aula <?php echo htmlspecialchars($aula['numero']); ?>
                </span>

                <h3 style="color: <?php echo $aula['cor']; ?>;">
                    <?php echo htmlspecialchars($aula['nome']); ?>
                </h3>

                <p>
                    <?php echo htmlspecialchars($aula['descricao']); ?>
                </p>

                <span class="conceitos">
                    🔑 <?php echo htmlspecialchars($aula['conceitos']); ?>
                </span>

                <br>

                <a
                    href="<?php echo htmlspecialchars($aula['link']); ?>"
                    class="btn"
                    style="background: <?php echo $aula['cor']; ?>;"
                >
                    Abrir
                </a>

            </div>

        </div>

    <?php endforeach; ?>

    <p style="text-align: right; font-size: 13px; color: #9ca3af; margin-top: 8px;">
        Gerado em: <?php echo date("d/m/Y \à\s H:i:s"); ?>
    </p>

</div>

<footer>
    <?php echo htmlspecialchars($nome); ?>
    &copy; <?php echo date("Y"); ?>
    | Desenvolvido com PHP | IFPR - Ponta Grossa
</footer>

</body>
</html>
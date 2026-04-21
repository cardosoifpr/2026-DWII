# 2026-DWII

Repositório da disciplina **Desenvolvimento Web II** — IFPR (CRPG)

---

## 👤 Autor

* **Nome:** Rafaela Cardoso
* **Curso:** Técnico em Informática Integrado ao Ensino Médio
* **Disciplina:** Desenvolvimento Web II
* **Ano:** 2026

---

## 📌 Sobre o projeto

Este projeto tem como objetivo aplicar conceitos fundamentais de **PHP**, com foco em **organização de código, reutilização de componentes e boas práticas de desenvolvimento web**.

A proposta envolve a refatoração de páginas HTML para uma estrutura mais modular utilizando includes, permitindo maior manutenção e reaproveitamento de código.

---

## 📁 Estrutura de arquivos

```bash
02_projetoPHP-02_refatorado/
├── 00_apresentacao/
├── 01_php-intro/
│   ├── index.php
│   ├── sobre.php
│   └── projetos.php
├── 02_formularios/
├── 03_pdo/
├── 04_sessoes/
├── 05_crud/
├── includes/
│   ├── cabecalho.php
│   ├── nav.php
│   └── rodape.php
├── style.css
└── README.md
```

---

## 🔧 Decisões de refatoração

Durante o desenvolvimento, foram identificados alguns problemas estruturais:

1. **Repetição de código HTML (header e footer)**
   → Solução: criação da pasta `includes/` com arquivos reutilizáveis (`cabecalho.php`, `rodape.php`, `nav.php`)

2. **Dois arquivos conexao.php com configurações diferentes**
   → Solução: Padronização em um único arquivo includes/conexao.php, centralizando a configuração do banco

3. **Problemas com caminhos de arquivos (CSS e includes)**
   → Solução: uso de `__DIR__` no PHP e ajuste de caminhos relativos (`../`)

4. **Falta de segurança na exibição de dados**
   → Solução: uso da função `htmlspecialchars()` para evitar vulnerabilidades como XSS

---

## ▶️ Como executar

1. Clone o repositório:

```bash
git clone https://github.com/cardosoifpr/2026-DWII
```

2. Acesse a pasta do projeto:

```bash
cd 02_projetoPHP-02_refatorado
```

3. Inicie um servidor PHP local:

```bash
php -S localhost:8000
```

4. Acesse no navegador:

```
http://localhost:8000/index.php
```

---

## 📚 Observações

Este projeto é parte das atividades práticas da disciplina e tem como foco o aprendizado de boas práticas em PHP, organização de código e estruturação de projetos web.

---

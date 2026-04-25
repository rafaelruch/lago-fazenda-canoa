# 📦 Releases — Pacotes prontos para instalação

Esta pasta contém os **pacotes ZIP prontos** para upload via WordPress admin. Use estes ao invés de baixar o repositório inteiro.

## Arquivos

| Arquivo | Versão | O que é | Tamanho |
|---|---|---|---|
| `fazenda-canoa-theme.zip` | **1.2.1** | Tema (block theme custom) | ~19 MB |
| `lfc-opcoes-plugin.zip`   | **1.0.2** | Plugin de opções + leads + webhook ImobMeet | ~10 KB |

### Mudanças na v1.2.0 (tema) e v1.0.1 (plugin) — 2026-04-24

- **Tema v1.2.0 (feature):**
  - Máscara de telefone BR auto-aplicada nos inputs `[type="tel"]` enquanto o usuário digita: `(62) 99999-9999`. Funciona em todos os formulários (consultor + modal + book).
  - Animação smooth de entrada do estado de sucesso (`.modal__success` e `.lead-form__success`): fade + slide-up no container, scale-pop no ícone, fade escalonado no título e parágrafo. Respeita `prefers-reduced-motion`.
- **Tema v1.1.1 (patch):** corrigido bug visual em que o `modal__success` aparecia visível mesmo com atributo `hidden` no HTML (CSS `display:flex` vencia o `[hidden]` por especificidade). Adicionada regra `[hidden] { display:none !important }`.
- **Tema v1.1.0:** removido o redirect para WhatsApp após submit do formulário. Agora o form mostra apenas a confirmação ("Recebemos seu contato! Em breve um consultor entra em contato com você.") e o lead vai pro CRM via webhook do plugin.
- **Plugin v1.0.1:** webhook ImobMeet hardcoded como default (`LFC_DEFAULT_WEBHOOK_URL`) com fallback. Leads chegam ao CRM mesmo sem configurar nada no admin.

---

## 🚀 Como instalar (passo a passo)

### 1. Plugin (instalar primeiro)

1. Baixe o arquivo **[lfc-opcoes-plugin.zip](lfc-opcoes-plugin.zip?raw=1)** clicando aqui (no GitHub: botão "Download raw file")
2. WordPress Admin → **Plugins** → **Adicionar novo** → **Carregar plugin**
3. Escolha o ZIP baixado → **Instalar agora** → **Ativar plugin**

### 2. Tema (instalar depois do plugin)

1. Baixe o arquivo **[fazenda-canoa-theme.zip](fazenda-canoa-theme.zip?raw=1)**
2. WordPress Admin → **Aparência** → **Temas** → **Adicionar novo tema** → **Carregar tema**
3. Escolha o ZIP baixado → **Instalar agora** → **Ativar**

> ⚠️ **Limite de upload:** Se sua hospedagem limita uploads acima de 8/10 MB, você verá um erro ao subir o tema. Solução: use FTP/SFTP/cPanel para extrair o ZIP diretamente em `wp-content/themes/`, OU peça ao suporte para aumentar `upload_max_filesize` no PHP.

### 3. Configuração (1 minuto)

1. Admin → **Configurações** → **Fazenda Canoa**
2. Revise os defaults (WhatsApp, e-mail, horário) e salve

### 4. Publicar a Landing Page

A LP já é a home automaticamente (via `front-page.html`). Acesse o site e ela aparece.

Se quiser controlar via Páginas:
1. **Páginas** → **Adicionar nova** → Título "Landing Page"
2. Na barra lateral, em "Modelo": escolher **"Landing Page (Lago Fazenda Canoa)"**
3. **Publicar**
4. **Configurações → Leitura** → "Página inicial exibe" → "Página estática" → escolher a Landing Page

---

## ❌ NÃO faça assim

- ❌ Baixar o repositório inteiro como ZIP do GitHub e mandar pra `wp-content/themes/`
- ❌ Fazer `git clone` do repositório dentro de `wp-content/themes/`
- ❌ Usar o `wp/themes/fazenda-canoa/` direto sem zipar primeiro

Esses caminhos vão fazer o WP detectar várias pastas como temas inválidos (incluindo `prototype/` que NÃO é um tema, é só o protótipo HTML).

---

## ✅ Faça assim

- ✅ Baixe APENAS os ZIPs desta pasta
- ✅ Instale via WP admin (upload de ZIP)
- ✅ Ou, via filesystem, copie APENAS as pastas `wp/themes/fazenda-canoa/` e `wp/plugins/lfc-opcoes/`

---

## 🔄 Atualizar versão futura

Quando houver mudança no repo, baixe o ZIP novo e:
- Para **plugin**: desative → exclua → instale ZIP novo → ative
- Para **tema**: instale como novo tema (ou substitua arquivos via FTP)

> 💡 **Para deploys profissionais**, o ideal é usar Git no servidor de produção e fazer `git pull` direto em `wp-content/themes/fazenda-canoa/` (não no wp-content todo). Mas isso requer SSH e configuração apropriada.

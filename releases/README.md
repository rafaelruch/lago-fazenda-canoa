# 📦 Releases — Pacotes prontos para instalação

Esta pasta contém os **pacotes ZIP prontos** para upload via WordPress admin. Use estes ao invés de baixar o repositório inteiro.

## Arquivos

| Arquivo | Versão | O que é | Tamanho |
|---|---|---|---|
| `fazenda-canoa-theme.zip` | **1.10.2** | Header sem botão WhatsApp + CTA único "Falar com especialista" + remove linha sob o vídeo hero | ~70 MB |
| `lfc-opcoes-plugin.zip`   | **1.0.4** | Plugin de opções + leads + webhook ImobMeet (principal + WhatsApp) + UTMs | ~11 KB |

### Mudanças na v1.10.2 (tema) — 2026-05-26

- **Tema v1.10.2 (UX):** **header reduzido a 1 CTA**. Botão "WhatsApp" do header desktop e do mobile menu removidos. O CTA "Falar com um especialista Fazenda Canoa" passa a ser **primário** (`btn--primary btn--sm`, mesmo estilo do hero), com o ícone de telefone. No mobile menu, vira o botão grande inferior (`mobile-menu__cta`), `data-capture="consultor"` → abre o modal de captação (não vai mais direto pro wa.me).

### Mudanças na v1.10.1 (tema) — 2026-05-26

- **Tema v1.10.1 (visual):** **linha divisória removida** entre o vídeo do hero e o bloco de preço/CTAs. `border-top: 1px solid var(--c-line)` deletada de `.hero__info-row`.

### Mudanças na v1.10.0 (tema) — 2026-05-26

- **Tema v1.10.0 (feature):** **rebrand da navegação principal** — labels do header (desktop + mobile) e do footer atualizados para: `O lago` (→ #oferta), `Oportunidades` (→ #tipologias), `Fazenda Canoa` (→ #vinicola), `Amenidades` (→ #lazer), `Localização` (→ #localizacao). FAQ removido da nav principal (continua acessível pela seção no fim da LP).
- **Tema v1.10.0 (UX):** seção "Atendimento especializado" (`consultor`) reposicionada para **acima** de "Localização" no front-page (storytelling fecha com o consultor visível logo antes do bloco geográfico, melhorando conversão pré-CTA).
- **Tema v1.10.0 (visual):** backgrounds de `.loc` (Localização) e `.dev` (Incorporadora) trocados (`loc`: off-white → white; `dev`: white → off-white) para preservar a **alternação white/soft** ao longo do scroll após a reordenação do consultor.

### Mudanças na v1.9.2 (tema) — 2026-05-26

- **Tema v1.9.2 (fix):** breadcrumb do hero ajustado de `Goiás › Silvânia › Condomínios › Reserva Fazenda Canoa` para `Goiás › Silvânia › Condomínio Reserva Fazenda Canoa` (remove o nível "Condomínios" e prefixa "Condomínio" no nome do empreendimento).

### Mudanças na v1.9.1 (tema) — 2026-05-26

- **Tema v1.9.1 (patch):** botão sobreposto no vídeo do hero para **ativar/desativar o som** (Ativar som ↔ Desativar som). O vídeo inicia mudo (exigência das políticas de autoplay dos browsers); um clique no botão libera o áudio AAC já embutido no `banner-lago.mp4`. Ícone troca entre alto-falante riscado (muted) e alto-falante com ondas (on), e o `aria-pressed`/`aria-label` acompanham o estado para acessibilidade.

### Mudanças na v1.9.0 (tema) — 2026-05-26

- **Tema v1.9.0 (feature):** o banner principal do hero agora é um **vídeo institucional** (`banner-lago.mp4`, autoplay/loop/muted/playsinline) com poster JPG para LCP. O slideshow de fotos e a faixa de thumbnails foram retirados desse bloco (lightbox de fotos continua disponível pelo "Ver todas as fotos"). Vídeo reotimizado de 177 MB → 3.1 MB (960p, CRF 30) e vídeo da Vinícola reduzido para 13 MB para caber no limite de 100 MB do GitHub.

### Mudanças na v1.4.0 (tema) e v1.0.4 (plugin) — 2026-04-27

- **Tema v1.4.0 (feature):** novo modal de captura mínima (nome + telefone) ativado em **todos os CTAs WhatsApp** do site (header mobile, floating widget, footer, card de canal na seção consultor). Antes de redirecionar pro `wa.me`, o usuário preenche o modal, os dados são salvos no CPT `lfc_lead` e enviados via webhook secundário ImobMeet (`flow=whatsapp`). A `wa.me` é aberta em nova aba com o nome pré-preenchido na mensagem.
- **Plugin v1.0.4 (feature):** suporte a webhook secundário (`webhook_url_whatsapp`) com roteamento por campo `flow` no POST AJAX. `flow=main` (default) usa webhook principal; `flow=whatsapp` usa webhook secundário. Constantes default `LFC_DEFAULT_WEBHOOK_URL` e `LFC_DEFAULT_WEBHOOK_WHATSAPP_URL`. Admin com 2 novos campos (URL + secret) na seção "Webhook secundário". O metabox `webhook_status` agora inclui o flow no log (`dispatched [whatsapp] (HTTP 200)`).

### Mudanças na v1.3.0 (tema) e v1.0.3 (plugin) — 2026-04-27

- **Tema v1.3.0 (feature):** captura automática de UTMs da URL na entrada e persistência em `localStorage` (key `fcanoa_utms`). Anexa os 7 parâmetros (`utm_source`, `utm_medium`, `utm_campaign`, `utm_content`, `utm_term`, `utm_device`, `utm_network`) + `landing_url` no payload do submit de todos os formulários (consultor + modal + book).
- **Plugin v1.0.3 (feature):** aceita campos UTM no endpoint AJAX, salva como meta no CPT `lfc_lead`, inclui no payload do webhook ImobMeet (sempre presentes — string vazia se ausente), exibe seção dedicada "UTMs & Atribuição" no metabox de cada lead, adiciona colunas "UTM Source" e "UTM Campaign" na lista de leads (sortable).

### Mudanças anteriores (v1.2.0 — v1.0.2)

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

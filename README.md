# 🏡 Lago Fazenda Canoa — Landing Page

Landing page de alta conversão do **Condomínio Reserva Fazenda Canoa**, em Silvânia/GO, às margens do Lago Corumbá IV. Estrutura inspirada na MySide, com modais de captação, widget flutuante, slideshow e integração pronta para WordPress (block theme nativo).

**URL de produção (alvo):** [lago.fazendacanoa.com.br](https://lago.fazendacanoa.com.br)
**Desenvolvido por:** [RUCH](https://ruch.digital)

## 📂 Repositórios relacionados

Este é o **monorepo do projeto** (protótipo + docs + cópia do tema/plugin para referência).
Para **deploy em produção** via Deployer for Git, use os repositórios dedicados com estrutura no root:

| Repositório | Propósito | Deploy destino |
|---|---|---|
| 🎨 [fazenda-canoa-theme](https://github.com/rafaelruch/fazenda-canoa-theme) | Block theme WordPress | `wp-content/themes/fazenda-canoa/` |
| 🔌 [lfc-opcoes-plugin](https://github.com/rafaelruch/lfc-opcoes-plugin) | Plugin de opções + CPT Leads + webhook | `wp-content/plugins/lfc-opcoes/` |
| 📦 [lago-fazenda-canoa](https://github.com/rafaelruch/lago-fazenda-canoa) (este) | Monorepo com protótipo, docs e histórico | — |

> ⚠️ **Não use este monorepo para deploy direto em produção.** O Deployer for Git faria clone do repositório inteiro em `wp-content/themes/`, e o WP detectaria o `prototype/` como tema inválido. Use sempre os repositórios dedicados acima.

---

## 📦 Estrutura do repositório

```
lago-fazenda-canoa/
├── prototype/                  # Protótipo estático HTML/CSS/JS (versão aprovada pelo cliente)
│   ├── index.html
│   ├── style.css
│   └── script.js
├── fotos-web/                  # 37 fotos otimizadas (max 1600px, qualidade 82)
├── logos/                      # Logos do empreendimento + favicon
├── documentos/                 # PDFs de referência do cliente
├── wp/
│   ├── themes/fazenda-canoa/   # Block theme WordPress (versão de produção)
│   └── plugins/lfc-opcoes/     # Plugin de opções + CPT Leads + endpoint AJAX + webhook
└── docs/
    ├── INSTRUCOES-ATIVACAO.md  # Como ativar no Flywheel/produção
    └── MANUAL-EDICAO.md        # Manual para o time comercial
```

---

## ✨ Features implementadas

### Design e UX
- **Hero banner full-width** com slideshow automático (7 fotos, Ken Burns, barra de progresso)
- **Oferta destacada** com pill "Lançamento II em comercialização"
- **3 tipologias** de lote (Frente-Lago, Vista-Lago, Bosque) a partir de R$ 360.000
- **Lote padrão** com 8 ícones de features + badge "Empreendimento verificado"
- **Galeria de lazer** com carrossel automático + Ken Burns + 22 amenidades em cards com ícone
- **Localização** com Google Maps embedado (coord `-16.3195247, -48.4709649`) + distâncias reais (Brasília 140 km · Goiânia 120 km · Anápolis 60 km)
- **Incorporadora FRSC** com link externo
- **Consultor** com canais (WhatsApp/Instagram/Site) + formulário curto
- **FAQ** com 8 perguntas em accordion
- **Footer** com info legal completa (CNPJ, matrícula, cartório)

### Captação de leads
- **Widget flutuante estilo MySide** no rodapé com 3 seções (Book · Consultor · WhatsApp) e animação de colapso para mini FAB
- **Modal único reutilizável** com 9 contextos (hero, oferta, 3 lotes, visita, simulação, preço, consultor, book)
- **Modo book** ultra-rápido: só nome + WhatsApp
- **CPT `lfc_lead`** no admin WP para armazenamento permanente
- **Endpoint AJAX seguro** com nonce + honeypot anti-bot
- **Webhook pronto** para integração com n8n/RD Station/Zapier
- **Backup em localStorage** (client-side)
- **Mensagem WhatsApp pré-preenchida** específica por contexto

### Arquitetura técnica
- **Block theme WordPress 100% nativo** — editabilidade total via Site Editor + Gutenberg
- **Plugin `lfc-opcoes`** com página de configurações (`Configurações → Fazenda Canoa`)
- **Template parts com placeholders** resolvidos via filter `render_block` (`{{WHATSAPP_URL}}`, `{{LOGO_HEADER}}`, etc.)
- **9 block patterns** editáveis (1 por seção)
- **theme.json** com design tokens (cores, tipografia Manrope, spacing)
- **Custom logo support** + favicon via `wp_head` hook
- **Open Graph** meta tags para compartilhamento em redes
- **Admin bar compatibility** — nav não some atrás da barra do WP quando logado

### Performance e acessibilidade
- **Imagens otimizadas:** 539 MB → 17 MB (redução de 97%)
- **Scripts deferred** + Google Fonts com `display=swap`
- **Mobile-first** testado em 375, 640, 768, 1024, 1400px
- **Respeita `prefers-reduced-motion`** (desativa Ken Burns, autoplay, etc.)
- **Semântica HTML5** + ARIA (dialog, aria-modal, aria-expanded)
- **Escapping server-side** contra XSS

### SEO (alinhado com Google) — `wp/themes/fazenda-canoa/inc/`
- **Structured Data (Schema.org JSON-LD)** com 6 entidades em grafo:
  - `WebSite` (com SearchAction ready)
  - `Organization` (FRSC com endereço, logo, contato, redes)
  - `RealEstateListing` + `Product` (empreendimento, offer R$ 360k, 14 amenityFeatures, geo)
  - `Place` (coord -16.3195247, -48.4709649 + hasMap)
  - `BreadcrumbList` (Goiás › Silvânia › Condomínios › Fazenda Canoa)
  - `FAQPage` (8 perguntas/respostas — habilita rich snippets no Google)
- **Meta tags expandidas**: description, robots (max-image-preview:large), canonical, geo tags (geo.region, geo.position, ICBM), Open Graph completo com og:image dimensions, Twitter Cards
- **Integração com Google ecosystem** — campos em `Configurações → Fazenda Canoa`:
  - Google Search Console (verificação de propriedade)
  - Google Analytics 4 (GA4 com anonymize_ip)
  - Meta Pixel (Facebook Ads)
- **Performance (Core Web Vitals)**:
  - `<link rel="preload">` da imagem LCP (hero banner)
  - `dns-prefetch` + `preconnect` para fontes/Maps/WhatsApp
  - JavaScript deferred
  - Lazy loading nativo para imagens below-the-fold
- **Cleanup WordPress bloat**:
  - Emoji scripts removidos (~10KB de JS)
  - Generator tag removido (segurança + limpeza)
  - RSS feeds, wlwmanifest, rsd, oembed, shortlinks — todos removidos
  - XML-RPC desativado (superfície de ataque)
  - X-Pingback header removido
- **Security headers**: X-Content-Type-Options, X-Frame-Options, Referrer-Policy, Permissions-Policy
- **Sitemap** via WP core (`/wp-sitemap.xml`) + `robots.txt` virtual

---

## 🚀 Quick start

### 1. Rodar o protótipo estático localmente
```bash
cd prototype
python3 -m http.server 4545
# Acesse http://localhost:4545/
```
> As fotos são referenciadas em `../fotos-web/` — mantenha a estrutura de pastas ao servir.

### 2. Instalar no WordPress (forma RECOMENDADA — via ZIPs)

Baixe os pacotes prontos da pasta [`releases/`](releases/) e instale via WP admin:

| Arquivo | Como instalar |
|---|---|
| [`releases/lfc-opcoes-plugin.zip`](releases/lfc-opcoes-plugin.zip) | Admin → Plugins → Adicionar → Carregar plugin |
| [`releases/fazenda-canoa-theme.zip`](releases/fazenda-canoa-theme.zip) | Admin → Aparência → Temas → Adicionar → Carregar tema |

Depois no admin do WordPress:
1. **Plugins** → Ativar **"Fazenda Canoa — Opções & Leads"**
2. **Aparência → Temas** → Ativar **"Fazenda Canoa"**
3. **Configurações → Fazenda Canoa** → Revisar defaults e salvar

> ⚠️ **NÃO** baixe o repositório inteiro como ZIP e mande direto pra `wp-content/themes/` — isso faz o WP detectar várias pastas como temas inválidos (ex: `prototype/`).

### 3. Instalar via filesystem (alternativa para devs)

```bash
# Copie APENAS o tema e o plugin para o WordPress
cp -R wp/themes/fazenda-canoa /path/to/wordpress/wp-content/themes/
cp -R wp/plugins/lfc-opcoes /path/to/wordpress/wp-content/plugins/
```

Detalhes completos em [docs/INSTRUCOES-ATIVACAO.md](docs/INSTRUCOES-ATIVACAO.md) e [releases/README.md](releases/README.md).

---

## 📋 Dados integrados (fontes oficiais)

- **Empreendimento:** fazendacanoa.com.br
- **Incorporadora:** frsc.com.br
- **WhatsApp comercial:** `+55 62 99959-3530`
- **Instagram:** [@fazendacanoa](https://www.instagram.com/fazendacanoa/)
- **Endereço:** Silvânia, GO — Margens do Lago Corumbá IV
- **Plantão de vendas:** Rua Manoel D'Abadia, 95 · Sala 8A · Anápolis-GO · CEP 75.020-030
- **Razão social:** Canoa Administração e Participação — CNPJ 22.806.561/0001-15
- **Registro:** R-4 Matrícula 19.388, Cartório de Silvânia/GO

---

## 🧩 Stack técnica

- **WordPress 6.5+** (block theme / FSE)
- **PHP 7.4+**
- **JavaScript vanilla** (sem dependências de framework)
- **CSS nativo** com custom properties (sem preprocessador)
- **Google Fonts** (Manrope 300–700)
- **Google Maps** (iframe embed, sem API key)

---

## 🎨 Design tokens (resumo)

| Token | Valor |
|---|---|
| `--c-paper` | `#FFFFFF` |
| `--c-paper-soft` | `#F7F6F2` |
| `--c-ink` | `#1A1A1A` |
| `--c-accent` | `#1F7A3F` (verde natureza) |
| `--c-warning` | `#B8710F` (corten) |
| `--c-whatsapp` | `#25D366` |
| Tipografia | **Manrope** 300/400/500/600/700 |
| Container | 1180px |
| Breakpoints | 560/768/1024/1400 |

---

## 📅 Histórico

- **v1.0.0 (2026-04-15)** — Protótipo aprovado pelo cliente · Block theme WordPress portado · Plugin `lfc-opcoes` implementado · Documentação completa.

---

## 🔌 Integrações futuras

- [ ] Webhook n8n para dispatch automático dos leads para WhatsApp do comercial
- [ ] Google Sheets como CRM informal (via n8n)
- [ ] Analytics 4 e Meta Pixel
- [ ] RD Station / HubSpot (opcional)

---

## 🙋 Suporte

Dúvidas ou ajustes: **contato@ruch.digital**

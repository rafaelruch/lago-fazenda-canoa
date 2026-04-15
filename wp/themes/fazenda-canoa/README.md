# Fazenda Canoa — Block Theme WordPress

Tema block-nativo da Landing Page do Condomínio Reserva Fazenda Canoa. Versão **1.0.0** — Desenvolvido por [RUCH](https://ruch.digital).

## 📁 Estrutura

```
fazenda-canoa/
├── style.css               # Declaração do tema
├── theme.json              # Design tokens (cores, typography, spacing)
├── functions.php           # Enqueues e registro de pattern category
├── index.php               # Fallback vazio (block themes não usam)
├── screenshot.png          # Preview no Aparência → Temas
├── templates/
│   ├── front-page.html     # Template da home (com todos os patterns)
│   ├── index.html          # Fallback
│   └── landing-page.html   # Template customizado para páginas
├── parts/
│   ├── header.html         # Nav superior + menu mobile
│   ├── footer.html         # Rodapé com 4 colunas + legal
│   └── floating-widget.html# Widget flutuante + mini FAB + modal
├── patterns/
│   ├── hero.php            # Hero com slideshow
│   ├── oferta.php          # Card Lançamento II
│   ├── tipologias.php      # Grid de 3 cards
│   ├── lote-padrao.php     # Features do lote
│   ├── lazer.php           # Galeria + 22 amenidades
│   ├── localizacao.php     # Mapa Google + distâncias
│   ├── incorporadora.php   # FRSC
│   ├── consultor.php       # Canais + formulário
│   └── faq.php             # 8 perguntas
└── assets/
    ├── css/main.css        # Stylesheet completo
    ├── js/main.js          # Slideshow, modal, widget, scrollspy
    ├── fotos/              # 37 fotos otimizadas (max 1600px / ~500KB)
    └── logos/              # 7 variações de logo + favicon
```

## 🔌 Dependências

- **WordPress 6.5+**
- **Plugin `lfc-opcoes`** (entregue junto) — contatos globais + CPT Leads + endpoint AJAX + webhook

## 🎨 Design Tokens (theme.json)

Cores da paleta disponíveis no editor:
- `paper` `#FFFFFF` / `paper-soft` `#F7F6F2` / `paper-mid` `#EFEDE6`
- `ink` `#1A1A1A` / `text-2` `#4A4A4A` / `text-mute` `#7A7A7A`
- `accent` `#1F7A3F` / `accent-2` `#2E8F4F`
- `warning` `#B8710F` (corten) / `warning-soft` `#FDF5E8`
- `whatsapp` `#25D366`

**Tipografia:** Manrope (300, 400, 500, 600, 700) — carregada via Google Fonts.

**Layout:** `contentSize: 1180px` · `wideSize: 1440px`

## 🚀 Ativação

1. Instale o plugin `lfc-opcoes` primeiro (em `wp-content/plugins/`)
2. Ative em **Plugins**
3. Ative o tema em **Aparência → Temas**
4. Configure contatos em **Configurações → Fazenda Canoa**
5. Crie uma página (Pages → Add New) e use o template **"Landing Page (Lago Fazenda Canoa)"** ou simplesmente defina-a como **front page** em Settings → Reading
6. Os patterns já ficam disponíveis no editor de blocos (categoria **Fazenda Canoa**)

## ✏️ Como o time edita conteúdo

Ver arquivo `MANUAL-EDICAO.md` no admin (ou [manual completo](#manual-de-edição) abaixo).

Áreas totalmente editáveis via admin:
- Textos em todos os patterns (via Gutenberg)
- Fotos (via biblioteca de mídia do WP)
- WhatsApp, e-mail, telefone, horário, book URL (em Configurações → Fazenda Canoa)
- Ordem das seções (arrastar no editor da página)
- Adicionar/remover seções

## 🔄 Fluxo de lead

1. Usuário preenche modal ou formulário
2. JavaScript envia via AJAX para `admin-ajax.php?action=lfc_submit_lead`
3. Plugin salva como CPT `lfc_lead` (visível em admin → **Leads**)
4. Se webhook estiver configurado → dispara POST JSON para URL (n8n/RD/Zapier)
5. Navegador abre WhatsApp com mensagem pré-preenchida
6. Lead também fica persistido em `localStorage.fcanoa_leads` (backup client-side)

## 🔐 Segurança

- Nonce em todos os submits (`_nonce: lfc_lead`)
- Honeypot field `website` anti-bot
- Sanitização server-side (sanitize_text_field, sanitize_email, esc_url_raw)
- Webhook secret opcional (header `X-LFC-Secret`)
- CPT `lfc_lead` com `create_posts` → `do_not_allow` (ninguém cria via admin)

## 📝 Changelog

### v1.0.0 (2026-04-15)
- Scaffold inicial do block theme
- 9 block patterns migrados do protótipo HTML aprovado
- Plugin lfc-opcoes com página de opções, CPT Leads, endpoint AJAX e webhook
- Integração com WhatsApp 5562999593530
- Google Maps embedado (coord -16.3195247, -48.4709649)
- Widget flutuante com minimização
- Modais de captação (9 contextos + modo book)

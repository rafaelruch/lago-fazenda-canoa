# Checklist de SEO — Reserva Fazenda Canoa

> Guia prático para validar o posicionamento da LP no Google após o deploy em `lago.fazendacanoa.com.br`.

## ✅ Tecnicamente já implementado

### Structured Data (JSON-LD)
- [x] `WebSite` — sinaliza o site para Google
- [x] `Organization` — FRSC com CNPJ, endereço, redes sociais
- [x] `RealEstateListing` + `Product` — empreendimento com offer (R$ 360k), 14 amenidades, geo, brand
- [x] `Place` — coordenadas GPS + hasMap
- [x] `BreadcrumbList` — hierarquia Goiás › Silvânia › Condomínios › Fazenda Canoa
- [x] `FAQPage` — 8 perguntas/respostas para rich snippets

### Meta tags
- [x] `<title>` dinâmico (via `add_theme_support('title-tag')`)
- [x] `<meta name="description">` — 160 caracteres com palavras-chave
- [x] `<meta name="robots">` — `index, follow, max-image-preview:large`
- [x] `<link rel="canonical">` — URL autoritativa da página
- [x] `<meta name="format-detection">` — controle de telefone
- [x] Geo tags — `geo.region: BR-GO`, `geo.position: -16.32;-48.47`, `ICBM`
- [x] Open Graph — `og:type`, `og:title`, `og:description`, `og:url`, `og:image` (com width/height), `og:locale`
- [x] Twitter Cards — `summary_large_image` com image alt

### Performance (Core Web Vitals)
- [x] LCP otimizado: `<link rel="preload" as="image">` na foto do hero
- [x] LCP image com `fetchpriority="high"` + `loading="eager"`
- [x] Demais imagens com `loading="lazy"`
- [x] Fontes via Google Fonts com `display=swap`
- [x] JavaScript com atributo `defer`
- [x] CSS inline crítico não necessário (arquivo único e pequeno)
- [x] Imagens otimizadas (539 MB → 17 MB, max 1600px, quality 82)

### Limpeza WordPress
- [x] Emoji scripts removidos (~10 KB de JS)
- [x] Generator tag removido
- [x] RSS, wlwmanifest, rsd, oembed, shortlinks — removidos
- [x] XML-RPC desativado
- [x] X-Pingback header removido

### Security headers
- [x] `X-Content-Type-Options: nosniff`
- [x] `X-Frame-Options: SAMEORIGIN`
- [x] `Referrer-Policy: strict-origin-when-cross-origin`
- [x] `Permissions-Policy: camera=(), microphone=(), geolocation=()`

---

## 🚀 Setup pós-deploy (o que precisa ser feito depois de publicar)

### 1. Google Search Console
- [ ] Acesse [search.google.com/search-console](https://search.google.com/search-console/)
- [ ] Adicionar propriedade → **"Prefixo do URL"** → `https://lago.fazendacanoa.com.br`
- [ ] Escolher método **"Meta tag"**
- [ ] Copiar APENAS o valor do `content=""`
- [ ] Admin WP → **Configurações → Fazenda Canoa** → colar no campo "Google Search Console"
- [ ] Salvar, voltar ao GSC e clicar em **"Verificar"**
- [ ] Submeter sitemap: `https://lago.fazendacanoa.com.br/wp-sitemap.xml`

### 2. Google Analytics 4
- [ ] Acesse [analytics.google.com](https://analytics.google.com/)
- [ ] Admin → **Criar propriedade** → "Lago Fazenda Canoa"
- [ ] Configure **Fluxo de dados Web** com URL `https://lago.fazendacanoa.com.br`
- [ ] Copie o **ID de medição** (formato `G-XXXXXXXXXX`)
- [ ] Admin WP → **Configurações → Fazenda Canoa** → colar no campo "GA4 ID"
- [ ] Em Analytics, validar em "Em tempo real" que os eventos estão chegando

### 3. Meta Pixel (opcional — para Facebook/Instagram Ads)
- [ ] Acesse [business.facebook.com/events_manager](https://business.facebook.com/events_manager)
- [ ] Criar pixel → copiar **Pixel ID** (numérico, 15 dígitos)
- [ ] Admin WP → colar em "Meta Pixel ID"
- [ ] Validar no Events Manager que PageView está chegando

### 4. Google Business Profile (recomendado para SEO local)
- [ ] [business.google.com](https://business.google.com/) — criar perfil para "Fazenda Canoa — Reserva do Incorporador"
- [ ] Categoria: "Empreendimento imobiliário" ou "Imobiliária"
- [ ] Endereço: Silvânia, GO (ou endereço do plantão em Anápolis)
- [ ] Telefone: (62) 99959-3530
- [ ] Horário: Seg a Sáb, 9h às 19h
- [ ] Adicionar fotos do empreendimento

### 5. Bing Webmaster Tools (opcional)
- [ ] [bing.com/webmasters](https://www.bing.com/webmasters/)
- [ ] Pode importar direto do Google Search Console
- [ ] ~6-10% do tráfego brasileiro vem do Bing + DuckDuckGo

---

## 📊 Validação técnica (ferramentas gratuitas)

Rodar essas ferramentas depois que o site estiver em `lago.fazendacanoa.com.br`:

### 1. Rich Results Test (Google)
🔗 [search.google.com/test/rich-results](https://search.google.com/test/rich-results)
- Cola a URL da LP
- Deve detectar: **WebSite, Organization, Product (RealEstateListing), BreadcrumbList, FAQPage**
- Todos devem passar sem erros

### 2. PageSpeed Insights
🔗 [pagespeed.web.dev](https://pagespeed.web.dev/)
- Mede Core Web Vitals
- Metas mínimas:
  - **Performance Mobile:** ≥ 85
  - **Performance Desktop:** ≥ 95
  - **LCP:** < 2.5s
  - **INP:** < 200ms
  - **CLS:** < 0.1

### 3. Mobile-Friendly Test
🔗 [search.google.com/test/mobile-friendly](https://search.google.com/test/mobile-friendly)
- Deve passar sem problemas (layout mobile-first)

### 4. Schema Validator
🔗 [validator.schema.org](https://validator.schema.org/)
- Cola a URL → valida a estrutura do JSON-LD
- 0 errors esperado

### 5. Lighthouse (Chrome DevTools)
- F12 → Lighthouse tab → Mobile/Desktop
- Pontuações esperadas:
  - **Performance** ≥ 85 (mobile) / ≥ 95 (desktop)
  - **Accessibility** ≥ 95
  - **Best Practices** ≥ 95
  - **SEO** = 100

### 6. HTTP headers scanner
🔗 [securityheaders.com](https://securityheaders.com/)
- Com os security headers configurados, nota deve ser A+ ou A

---

## 🎯 Palavras-chave foco (SEO on-page)

Primárias (alto volume):
- **"condomínio fechado goiás"**
- **"lotes à venda silvânia"**
- **"condomínio margem lago goiás"**
- **"reserva fazenda canoa"**

Secundárias (long-tail):
- **"condomínio com heliponto goiás"**
- **"lote frente lago corumbá IV"**
- **"condomínio com marina goiás"**
- **"condomínio com vinícola"**

Competidores típicos no Google:
- Atmosphere Home Spa
- Hantei Empreendimentos
- Outros condomínios de alto padrão no eixo Brasília-Goiânia

---

## 📈 Monitoramento contínuo (primeiros 90 dias)

### Semana 1
- [ ] Confirmar que GSC está recebendo dados
- [ ] GA4 com eventos de PageView chegando
- [ ] Validar Rich Results no Google
- [ ] Submeter sitemap no GSC

### Semana 2-4
- [ ] Monitorar indexação no GSC (quantas URLs indexadas)
- [ ] Verificar impressions/clicks na GSC
- [ ] Ajustar meta descriptions se CTR < 2%

### Mês 2-3
- [ ] Analisar palavras-chave que trazem tráfego (GSC → Desempenho)
- [ ] Criar conteúdo adicional focado nessas keywords (blog posts, FAQ expanded)
- [ ] Obter backlinks (imprensa local, parcerias)

---

## 🚨 Pontos de atenção

1. **Subdomínio `lago.`** precisa ter DNS propagado antes de adicionar ao GSC
2. **HTTPS obrigatório** — SSL precisa estar ativo no subdomínio
3. **WWW vs não-WWW** — escolher um e canonicalizar (nosso canonical sempre usa a URL atual)
4. **Velocidade** — servidor deve ter < 200ms de TTFB. Se lento, usar CDN (Cloudflare)
5. **Cache** — ativar page cache (WP Super Cache, W3 Total Cache ou cache do servidor)
6. **Imagens WebP** — considerar converter para WebP quando hospedado (ganho de ~30%)
7. **Submit Google Maps** — marcar o empreendimento em Google Maps para SEO local

---

**Dúvidas?** contato@ruch.digital

# Instruções de Ativação — Tema + Plugin

> Arquivos prontos no Flywheel local `lago-fazenda-canoa`. Siga o passo a passo para colocar no ar.

## 📋 Pré-requisitos

- Flywheel Local com o site `lago-fazenda-canoa` rodando
- WordPress instalado e funcionando
- Acesso admin ao WordPress

## 🚀 Passo a passo

### 1. Ativar o plugin `lfc-opcoes`

```
Admin → Plugins → Plugins instalados
→ Localize "Fazenda Canoa — Opções & Leads"
→ Clique em "Ativar"
```

Após ativação, você verá:
- Novo item no menu lateral: **Leads**
- Novo item em **Configurações**: **Fazenda Canoa**

### 2. Configurar contatos

```
Admin → Configurações → Fazenda Canoa
```

Os defaults já vêm preenchidos:
- **WhatsApp:** `5562999593530`
- **E-mail:** `contato@fazendacanoa.com.br`
- **Horário:** `Seg a Sáb, 9h às 19h`
- **Mensagem padrão:** `Olá! Vim pela landing page da Fazenda Canoa`

Revise e salve.

### 3. Ativar o tema

```
Admin → Aparência → Temas
→ Localize "Fazenda Canoa"
→ Clique em "Ativar"
```

### 4. Publicar a Landing Page

**Opção A — como home do site (recomendado):**

O tema já tem `front-page.html` que renderiza todos os patterns automaticamente. Basta acessar a home `http://lago-fazenda-canoa.local/` e a LP aparece.

**Opção B — como página dedicada:**

```
Admin → Páginas → Adicionar nova
→ Título: "Landing Page" (ou qualquer)
→ Na barra lateral direita, aba "Página" → Template: "Landing Page (Lago Fazenda Canoa)"
→ Publicar
→ Admin → Configurações → Leitura → Página inicial exibe → Página estática → Landing Page
```

### 5. Validar

Abra `http://lago-fazenda-canoa.local/` e verifique:

- [ ] Hero aparece com slideshow funcionando
- [ ] Todas as 9 seções carregam
- [ ] WhatsApp do header/footer/widget apontam para `5562999593530`
- [ ] Click em "Falar com consultor" abre o modal
- [ ] Preencher o modal + submeter → abre WhatsApp + aparece um Lead no admin
- [ ] Mapa do Google Maps aparece na seção Localização
- [ ] Widget flutuante aparece no rodapé
- [ ] Click no X minimiza o widget → aparece o mini FAB no canto
- [ ] Click no mini FAB volta a expandir

---

## 🧪 Testando o fluxo de captação

1. Abra `http://lago-fazenda-canoa.local/`
2. Clique em qualquer botão **"Falar com consultor"** ou **"Quero este lote"**
3. Preencha nome + WhatsApp + interesse
4. Clique em **"Enviar e conversar no WhatsApp"**
5. Deve acontecer:
   - Modal mostra **"Recebemos seu contato!"**
   - Uma nova aba abre o WhatsApp com a mensagem pré-preenchida
   - Em `Admin → Leads`, aparece o lead capturado com todos os dados

---

## 🔗 Integrar com n8n (quando decidir)

1. Crie um workflow n8n com um node **Webhook** (trigger)
2. Copie a URL do webhook
3. Cole em **Configurações → Fazenda Canoa → URL do webhook**
4. Defina um token secreto em **Secret do webhook**
5. No n8n, pegue o header `X-LFC-Secret` pra validar autenticidade
6. A partir daí, cada lead novo dispara POST JSON com:
   ```json
   {
     "lead_id": 123,
     "nome": "...",
     "telefone": "...",
     "email": "...",
     "interesse": "...",
     "contexto": "...",
     "source": "modal",
     "timestamp": "2026-04-15T15:34:00-03:00",
     "site": "https://lago-fazenda-canoa.local"
   }
   ```

Adicione nodes no n8n para:
- Google Sheets (salvar linha)
- Telegram/WhatsApp grupo (notificar comercial)
- Gmail/SMTP (e-mail pro time)

---

## 📂 Estrutura final dos arquivos criados

```
~/Local Sites/lago-fazenda-canoa/app/public/wp-content/
├── themes/fazenda-canoa/           # Tema (23 arquivos + 44 assets)
│   ├── style.css
│   ├── theme.json
│   ├── functions.php
│   ├── README.md
│   ├── MANUAL-EDICAO.md
│   ├── screenshot.png
│   ├── templates/*.html            # 3 templates
│   ├── parts/*.html                # 3 parts (header/footer/widget)
│   ├── patterns/*.php              # 9 block patterns
│   └── assets/                     # CSS, JS, 37 fotos, 7 logos
└── plugins/lfc-opcoes/             # Plugin de opções (4 arquivos)
    ├── lfc-opcoes.php              # Main
    ├── admin/options-page.php      # Página de configurações
    └── includes/
        ├── cpt-leads.php           # CPT de leads
        └── lead-endpoint.php       # Endpoint AJAX + webhook
```

---

## 🐛 Troubleshooting

| Sintoma | Causa provável | Solução |
|---|---|---|
| Tema não aparece na lista | `style.css` mal configurado | Verifique que tem o comentário header no topo |
| Plugin não aparece | Sintaxe PHP | Abra `lfc-opcoes.php` e cheque erros |
| Layout quebrado | Cache do WP | Admin → Aparência → Site Editor → atualize a página |
| Fotos 404 | Path das imagens | Cheque `get_theme_file_uri` nos patterns |
| Form não envia | Plugin não ativo | Confirme que `lfc-opcoes` está em "Ativos" |
| `admin-ajax.php` 403 | Nonce expirado | Recarregue a página (F5) |

---

## ✅ Checklist final antes de apresentar ao cliente

- [ ] Plugin `lfc-opcoes` ativo
- [ ] Tema `Fazenda Canoa` ativo
- [ ] Configurações → Fazenda Canoa revisadas
- [ ] LP acessível em `http://lago-fazenda-canoa.local/`
- [ ] Slideshow do hero rotacionando
- [ ] Modal de captação abrindo e submetendo
- [ ] Lead aparece em Admin → Leads
- [ ] Widget flutuante funciona (minimizar/expandir)
- [ ] Mobile (375px no DevTools) tudo responsivo
- [ ] Link "Desenvolvido pela RUCH" no footer apontando pra `ruch.digital`

Pronto para o cliente.

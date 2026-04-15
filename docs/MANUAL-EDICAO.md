# Manual de Edição — LP Fazenda Canoa

> Um guia rápido e prático para o time comercial editar a landing page sem precisar do desenvolvedor.

## 🎯 Em resumo

- **Textos** da LP: edite na própria página via editor do WordPress
- **WhatsApp, e-mail, horário, book**: em um ÚNICO lugar central (Configurações → Fazenda Canoa)
- **Fotos**: trocar pela biblioteca de mídia
- **Leads capturados**: ficam em **Leads** no menu lateral

Tempo médio para qualquer alteração: **menos de 2 minutos**.

---

## 1. Onde encontrar cada coisa

| O que você quer editar? | Onde ir no admin |
|---|---|
| Número de WhatsApp | Configurações → Fazenda Canoa |
| E-mail comercial | Configurações → Fazenda Canoa |
| Horário de atendimento | Configurações → Fazenda Canoa |
| Link do book (PDF) | Configurações → Fazenda Canoa |
| Headlines, textos, preços na LP | Pages → Landing Page → Editar |
| Trocar fotos | Pages → Landing Page → clicar na imagem |
| Ver leads capturados | Leads (menu lateral) |
| Ordem das seções | Pages → Landing Page → arrastar blocos |

---

## 2. Mudando o número do WhatsApp (ou qualquer contato)

Essa é **a edição mais impactante** — ela reflete em **TODOS** os botões da LP de uma vez só.

1. Entre no admin em `https://lago.fazendacanoa.com.br/wp-admin/`
2. No menu lateral → **Configurações** → **Fazenda Canoa**
3. Você verá a tela com 5 blocos:
   - **Contatos comerciais** (WhatsApp, e-mail, telefone, horário, mensagem padrão)
   - **Book do empreendimento** (URL do PDF)
   - **Integração** (webhook — só técnico configura isso)
4. Altere o campo que quiser, clique em **Salvar alterações** no final da página
5. **Atualize qualquer aba aberta da LP** — a mudança está no ar

> 🚨 **Atenção no formato do WhatsApp:** digite apenas números, com 55 na frente. Exemplo: `5562999593530` (código do país 55 + DDD 62 + número 999593530).

---

## 3. Editando textos e headlines

A página inteira da LP é composta por **9 seções** (Hero, Oferta, Tipologias, Lote Padrão, Lazer, Localização, Incorporadora, Consultor, FAQ). Cada uma é um bloco editável.

### Passo a passo:

1. Admin → **Pages** (ou **Páginas**)
2. Clique em **Landing Page Fazenda Canoa** (ou o nome que você deu à página)
3. O editor Gutenberg abre com a LP completa
4. Clique em qualquer texto para editar
5. Salve com o botão **Atualizar** no canto superior direito

### O que pode ser alterado ao clicar:

- **Títulos** (headlines)
- **Parágrafos** (descrições)
- **Textos dos botões** (CTAs)
- **Preços** (ex: "A partir de R$ 360.000")
- **Itens do FAQ** (perguntas e respostas)

### Cuidados:

- Evite deletar blocos inteiros se não tiver certeza — pode desconfigurar o layout
- Se quiser restaurar um pattern original: delete a seção → clique em `+` → busque por "Fazenda Canoa" → reinsira o pattern

---

## 4. Trocando fotos

1. No editor da página, clique na imagem que quer trocar
2. Na barrinha que aparece no topo, clique em **Substituir**
3. Escolha **Fazer upload** (da sua máquina) ou **Biblioteca de mídia** (já hospedadas)
4. Selecione a nova imagem
5. **Atualizar** a página

> 📐 **Tamanho recomendado:** máximo 1600px de largura, JPEG qualidade 80. Imagens maiores deixam a LP lenta.

> 🏷️ **Texto alternativo (alt):** importante para SEO e acessibilidade. Sempre preencha.

---

## 5. Adicionando/removendo uma tipologia

A seção de tipologias tem 3 cards (Frente-Lago, Vista-Lago, Bosque). Para adicionar um 4º:

1. No editor, clique em um dos cards existentes
2. Na barra superior, clique nos **3 pontinhos** (⋮) → **Duplicar**
3. Altere a imagem, título, metragem, preço e o botão
4. **Atualizar**

Para remover: clique no card → **⋮** → **Remover bloco**.

---

## 6. Reordenando seções

1. No editor, clique na **borda** da seção que quer mover
2. Use as **setinhas** (↑ ↓) na barra superior para subir ou descer
3. **Atualizar**

---

## 7. Vendo e gerenciando leads

Todo formulário preenchido cria um lead no admin:

1. Menu lateral → **Leads**
2. Você vê a lista com: **Nome · WhatsApp · E-mail · Interesse · Origem · Data**
3. Clique no lead para ver detalhes completos (IP, user-agent, contexto)
4. No link do WhatsApp (coluna), um clique já abre a conversa

> 💡 **Tip comercial:** use o filtro de data para ver leads das últimas 24h / 7 dias / mês.

---

## 8. Configurando o link do Book

1. Faça upload do PDF do book na **Mídia → Adicionar nova**
2. Depois de enviar, copie a **URL do arquivo** (clique no PDF → "Copiar URL")
3. Vá em **Configurações → Fazenda Canoa** → campo **"URL do PDF do book"**
4. Cole a URL → **Salvar alterações**

Agora, quando alguém pedir o book pelo widget flutuante, o consultor tem o link pronto pra enviar via WhatsApp.

---

## 9. Webhook (integração com n8n / RD Station / Zapier) — OPCIONAL

Se você usa alguma ferramenta externa pra receber leads em tempo real:

1. No n8n/RD/Zapier, crie um webhook e copie a URL
2. Cole em **Configurações → Fazenda Canoa → URL do webhook**
3. Defina um **Secret** qualquer (token) e cole no campo **Secret do webhook**
4. Configure sua ferramenta pra validar o header `X-LFC-Secret` com o mesmo token

A partir daí, cada lead novo dispara um POST JSON com os dados pra sua ferramenta.

---

## 10. Problemas comuns

| Problema | Solução |
|---|---|
| Mudei o texto mas não aparece no site | Clicou em **Atualizar** no canto superior direito? |
| Trocou o WhatsApp e não refletiu | Dê F5 na página, é cache do navegador |
| Lead não entrou em Leads | Verifique se o plugin **Fazenda Canoa — Opções & Leads** está ativo |
| Quero voltar à versão original | Ctrl+Z funciona no editor enquanto você não salvou. Se já salvou, use o histórico de revisões (link "Revisões" na barra lateral) |

---

## 11. Atalhos úteis no editor

- `⌘ + K` (Mac) ou `Ctrl + K` (Win/Linux) — adicionar link em texto selecionado
- `⌘ + Z` / `Ctrl + Z` — desfazer
- `⌘ + Shift + Z` / `Ctrl + Shift + Z` — refazer
- `Esc` com bloco selecionado — abrir seu menu de opções
- `/` no início de uma linha vazia — inserir novo bloco

---

**Dúvidas?** contato@ruch.digital

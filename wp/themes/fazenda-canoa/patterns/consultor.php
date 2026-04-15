<?php
/**
 * Title: Consultor — Atendimento + Formulário
 * Slug: fazenda-canoa/consultor
 * Categories: fazenda-canoa
 * Description: Seção de atendimento com canais de contato e formulário curto.
 */
?>
<!-- wp:html -->
<?php $wa_url = function_exists( 'lfc_whatsapp_url' ) ? lfc_whatsapp_url( 'Olá! Quero falar com um consultor da Fazenda Canoa' ) : 'https://wa.me/5562999593530'; ?>
<section class="consultor" id="consultor">
  <div class="consultor__grid">
    <div class="consultor__text">
      <h2>Atendimento especializado</h2>
      <p>Um consultor dedicado vai te apresentar plantas, disponibilidades, condições comerciais e agendar sua visita — presencial ou virtual.</p>

      <div class="consultor__channels">
        <a href="<?php echo esc_url( $wa_url ); ?>" class="ch-card ch-card--wa" rel="noopener">
          <svg viewBox="0 0 24 24" width="22" height="22" fill="currentColor" aria-hidden="true"><path d="M20.5 3.5A11.8 11.8 0 0012 0C5.4 0 .1 5.3.1 11.9a12 12 0 001.6 6L0 24l6.3-1.7a12 12 0 005.7 1.5c6.6 0 11.9-5.3 11.9-11.9A11.8 11.8 0 0020.5 3.5zM12 22a10 10 0 01-5.1-1.4l-.4-.2-3.7 1 1-3.7-.3-.4A10 10 0 1122 12 10 10 0 0112 22zm5.5-7.5c-.3-.2-1.8-.9-2-1-.3 0-.5-.1-.7.2s-.8.9-1 1.1c-.2.2-.4.2-.7 0a8 8 0 01-2.3-1.4 9 9 0 01-1.6-2c-.2-.2 0-.4.1-.5l.4-.5c.1-.2.2-.3.3-.5v-.4l-1-2.2c-.2-.6-.5-.5-.7-.5h-.6a1 1 0 00-.8.4c-.3.3-1 1-1 2.4s1.1 2.9 1.3 3.1a11 11 0 004.2 3.7c.6.3 1 .4 1.5.5.6.1 1.2.1 1.6 0 .5-.1 1.6-.7 1.8-1.3.2-.6.2-1.1.2-1.2 0-.2-.2-.2-.5-.4z"/></svg>
          <div>
            <span class="ch-card__label">WhatsApp</span>
            <span class="ch-card__value"><?php echo esc_html( do_shortcode('[lfc_whatsapp]') ); ?></span>
          </div>
        </a>
        <a href="https://www.instagram.com/fazendacanoa/" target="_blank" rel="noopener" class="ch-card">
          <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="18" cy="6" r="1" fill="currentColor"/></svg>
          <div>
            <span class="ch-card__label">Instagram</span>
            <span class="ch-card__value">@fazendacanoa</span>
          </div>
        </a>
        <a href="https://fazendacanoa.com.br/" target="_blank" rel="noopener" class="ch-card">
          <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15.3 15.3 0 010 20 15.3 15.3 0 010-20z"/></svg>
          <div>
            <span class="ch-card__label">Site oficial</span>
            <span class="ch-card__value">fazendacanoa.com.br</span>
          </div>
        </a>
      </div>

      <p class="consultor__address">
        <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true" style="vertical-align:-2px;margin-right:4px"><path d="M12 22s8-8 8-13a8 8 0 10-16 0c0 5 8 13 8 13z"/><circle cx="12" cy="9" r="3"/></svg>
        <strong>Plantão de vendas:</strong> Rua Manoel D'Abadia, 95 · Sala 8A · Anápolis, GO · CEP 75.020-030
      </p>
    </div>

    <form class="lead-form" id="lead-form" novalidate>
      <h3>Deixe seu contato</h3>
      <p>Um consultor retorna em instantes pelo WhatsApp.</p>

      <input type="text" name="website" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px;opacity:0;pointer-events:none" aria-hidden="true">

      <label class="field">
        <span>Nome</span>
        <input type="text" name="nome" required autocomplete="name" placeholder="Como podemos te chamar?">
      </label>
      <label class="field">
        <span>WhatsApp</span>
        <input type="tel" name="telefone" required autocomplete="tel" placeholder="(62) 9 0000-0000">
      </label>
      <label class="field">
        <span>Interesse</span>
        <select name="interesse" required>
          <option value="">Selecione...</option>
          <option>Lote frente-lago</option>
          <option>Lote vista-lago</option>
          <option>Lote bosque</option>
          <option>Ainda não decidi</option>
        </select>
      </label>

      <button type="submit" class="btn btn--primary btn--block">Solicitar contato</button>
      <p class="lead-form__disclaimer">Ao enviar, você concorda em receber contato do time comercial.</p>
      <p class="lead-form__success" hidden>✓ Recebemos seu contato. Estamos te chamando no WhatsApp.</p>
    </form>
  </div>
</section>
<!-- /wp:html -->

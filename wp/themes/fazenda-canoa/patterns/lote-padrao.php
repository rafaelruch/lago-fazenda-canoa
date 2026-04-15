<?php
/**
 * Title: Lote Padrão — Características
 * Slug: fazenda-canoa/lote-padrao
 * Categories: fazenda-canoa
 * Description: Card "lote padrão" com ícones de características e 3 CTAs MySide-style.
 */
?>
<!-- wp:html -->
<section class="features">
  <div class="features__card">
    <div class="features__media">
      <img src="<?php echo esc_url( get_theme_file_uri( 'assets/fotos/01.jpg' ) ); ?>" alt="Lote padrão da Fazenda Canoa" loading="lazy">
      <span class="features__verified">
        <svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor" aria-hidden="true"><path d="M9 12l2 2 4-4M12 2a10 10 0 100 20 10 10 0 000-20z"/></svg>
        Empreendimento verificado
      </span>
    </div>
    <div class="features__body">
      <h2 class="features__title">Lote padrão</h2>
      <p class="features__price">A partir de <strong>R$ 360.000</strong><span>parcelamento direto · condições FRSC</span></p>

      <ul class="features__grid">
        <li><svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><rect x="3" y="3" width="18" height="18"/><path d="M3 9h18M9 3v18"/></svg><span>Metragem sob consulta</span></li>
        <li><svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><path d="M3 15c3-3 6-3 9 0s6 3 9 0M3 10c3-3 6-3 9 0s6 3 9 0"/></svg><span>Acesso ao lago</span></li>
        <li><svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><path d="M4 20V10l8-6 8 6v10M4 20h16M10 20v-6h4v6"/></svg><span>Pavilhão Social</span></li>
        <li><svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 3v18M3 12h18"/></svg><span>Heliponto ANAC</span></li>
        <li><svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><path d="M3 19l9-14 9 14M8 19h8"/></svg><span>Beach Club + Marina</span></li>
        <li><svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><path d="M8 3h8l2 5v8a4 4 0 01-4 4h-4a4 4 0 01-4-4V8z"/><path d="M8 20v2M16 20v2"/></svg><span>Vinícola Costa Cave</span></li>
        <li><svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><rect x="3" y="8" width="18" height="10"/><path d="M7 8V4h10v4"/></svg><span>Portaria 24h</span></li>
        <li><svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><circle cx="6" cy="18" r="3"/><circle cx="18" cy="18" r="3"/><path d="M6 18l4-10h6l2 10"/></svg><span>Ciclovia + Pista de Cooper</span></li>
      </ul>

      <div class="features__ctas">
        <button type="button" class="btn btn--primary" data-capture="visita">Agende sua visita</button>
        <button type="button" class="btn btn--outline" data-capture="simulacao">Simular plano de pagamento</button>
        <button type="button" class="btn btn--text" data-capture="preco">Avise-me se o preço mudar →</button>
      </div>
    </div>
  </div>
</section>
<!-- /wp:html -->

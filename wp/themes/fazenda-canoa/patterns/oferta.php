<?php
/**
 * Title: Oferta — Lançamento II
 * Slug: fazenda-canoa/oferta
 * Categories: fazenda-canoa
 * Description: Card com a oferta atual e CTA para detalhes.
 */
?>
<!-- wp:html -->
<section class="offer" id="oferta">
  <div class="offer__card">
    <div class="offer__media">
      <img src="<?php echo esc_url( get_theme_file_uri( 'assets/fotos/15.jpg' ) ); ?>" alt="Entrada da Fazenda Canoa" loading="lazy">
    </div>
    <div class="offer__body">
      <span class="offer__pill">Lançamento II · em comercialização</span>
      <h2 class="offer__title">Nova fase com lotes em posições privilegiadas</h2>
      <p class="offer__desc">Lotes à beira do Lago Corumbá IV — com acesso privativo à orla, à marina e ao Beach Club. Entrada facilitada e parcelamento direto com a incorporadora FRSC.</p>
      <ul class="offer__list">
        <li><svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M20 6L9 17l-5-5"/></svg> Entrada facilitada</li>
        <li><svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M20 6L9 17l-5-5"/></svg> Parcelamento direto</li>
        <li><svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M20 6L9 17l-5-5"/></svg> Infraestrutura já entregue</li>
      </ul>
      <div class="offer__ctas">
        <button type="button" class="btn btn--primary" data-capture="oferta">Ver detalhes da oferta</button>
        <a href="#tipologias" class="btn btn--text">Ver tipologias →</a>
      </div>
      <p class="offer__note">* Oferta sujeita à confirmação de disponibilidade e aprovação de crédito.</p>
    </div>
  </div>
</section>
<!-- /wp:html -->

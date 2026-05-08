<?php
/**
 * Title: Vinícola Costa Cave — Diferencial exclusivo
 * Slug: fazenda-canoa/vinicola
 * Categories: fazenda-canoa
 * Description: Section dedicada à Vinícola Costa Cave — vídeo, copy aspiracional e diferenciais.
 */
?>
<!-- wp:html -->
<section class="features features--vinicola" id="vinicola">
  <div class="features__card features__card--video">
    <div class="features__media features__media--video">
      <video
        class="features__video"
        autoplay
        loop
        muted
        playsinline
        preload="metadata"
        poster="<?php echo esc_url( get_theme_file_uri( 'assets/video/vinicola-poster.jpg' ) ); ?>"
        aria-label="Vídeo institucional da Vinícola Costa Cave"
      >
        <source src="<?php echo esc_url( get_theme_file_uri( 'assets/video/vinicola.mp4' ) ); ?>" type="video/mp4">
      </video>
      <span class="features__verified">
        <svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor" aria-hidden="true"><path d="M9 12l2 2 4-4M12 2a10 10 0 100 20 10 10 0 000-20z"/></svg>
        Diferencial exclusivo do empreendimento
      </span>
    </div>
    <div class="features__body">
      <p class="eyebrow">Vinícola Costa Cave</p>
      <h2 class="features__title">Do quintal de casa<br><em>direto à sua taça.</em></h2>
      <p class="features__lede">A primeira vinícola privada de um condomínio-reserva no Brasil. Videiras plantadas nas encostas da Fazenda Canoa, com vista para o Lago Corumbá IV — produção artesanal, colheita anual e adega exclusiva para moradores e convidados.</p>

      <ul class="features__grid">
        <li>
          <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><path d="M12 2v6M8 8c0 4 4 6 4 6s4-2 4-6M9 14h6l-1 6h-4z"/></svg>
          <span>Videiras com vista para o lago</span>
        </li>
        <li>
          <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><path d="M3 15c3-3 6-3 9 0s6 3 9 0M3 10c3-3 6-3 9 0s6 3 9 0"/></svg>
          <span>Terroir único do Cerrado central</span>
        </li>
        <li>
          <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><path d="M8 3h8v6a4 4 0 01-4 4 4 4 0 01-4-4V3zM12 13v8M8 21h8"/></svg>
          <span>Produção artesanal limitada</span>
        </li>
        <li>
          <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><rect x="4" y="9" width="16" height="11" rx="1"/><path d="M8 9V5a4 4 0 018 0v4"/></svg>
          <span>Adega climatizada exclusiva</span>
        </li>
        <li>
          <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>
          <span>Experiências de degustação guiadas</span>
        </li>
        <li>
          <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><path d="M3 19l6-7 4 5 3-4 5 6"/><circle cx="6" cy="6" r="2"/></svg>
          <span>Eventos eno-gastronômicos privativos</span>
        </li>
      </ul>

      <p class="features__quote"><em>“Vinho, lago e natureza no seu quintal — uma experiência impossível de replicar em qualquer outro empreendimento brasileiro.”</em></p>

      <div class="features__ctas">
        <button type="button" class="btn btn--primary" data-capture="visita">Agendar visita guiada</button>
        <button type="button" class="btn btn--outline" data-capture="consultor">Falar com um especialista Fazenda Canoa</button>
      </div>
    </div>
  </div>
</section>
<!-- /wp:html -->

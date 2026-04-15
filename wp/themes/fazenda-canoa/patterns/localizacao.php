<?php
/**
 * Title: Localização — Mapa e distâncias
 * Slug: fazenda-canoa/localizacao
 * Categories: fazenda-canoa
 * Description: Seção de localização com mapa do Google e tabela de distâncias.
 */
?>
<!-- wp:html -->
<section class="loc" id="localizacao">
  <div class="loc__grid">
    <div class="loc__text">
      <header class="sec-head sec-head--left">
        <h2>Localização</h2>
        <p>Cerrado goiano, às margens do lago, com acesso rodoviário e aéreo às três capitais da região.</p>
      </header>

      <ul class="loc__list">
        <li><span class="loc__city">Brasília</span><span class="loc__line"></span><span class="loc__km">140 km</span></li>
        <li><span class="loc__city">Goiânia</span><span class="loc__line"></span><span class="loc__km">120 km</span></li>
        <li><span class="loc__city">Anápolis</span><span class="loc__line"></span><span class="loc__km">60 km</span></li>
        <li><span class="loc__city">Cidade mais próxima — Silvânia</span><span class="loc__line"></span><span class="loc__km">—</span></li>
      </ul>

      <p class="loc__note">Voos diretos ao heliponto homologado pela ANAC: Brasília · Goiânia · Anápolis.</p>
    </div>

    <div class="loc__map">
      <div class="loc__map-inner">
        <iframe src="https://maps.google.com/maps?q=-16.3195247,-48.4709649&hl=pt-BR&z=14&output=embed" width="100%" height="100%" style="border:0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Localização da Fazenda Canoa no Google Maps"></iframe>
      </div>
      <a class="loc__map-link" href="https://www.google.com/maps/place/Fazenda+Canoa/@-16.3195247,-48.4709649,17z" target="_blank" rel="noopener">
        <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M12 22s8-8 8-13a8 8 0 10-16 0c0 5 8 13 8 13z"/><circle cx="12" cy="9" r="3"/></svg>
        Ver no Google Maps
        <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M7 17l10-10M7 7h10v10"/></svg>
      </a>
    </div>
  </div>
</section>
<!-- /wp:html -->

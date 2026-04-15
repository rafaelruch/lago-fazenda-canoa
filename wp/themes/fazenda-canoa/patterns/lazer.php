<?php
/**
 * Title: Lazer — Galeria + Amenidades
 * Slug: fazenda-canoa/lazer
 * Categories: fazenda-canoa
 * Description: Carrossel automático de 8 fotos + grid de 22 cards de amenidades com ícones.
 */
?>
<!-- wp:html -->
<?php $dir = get_theme_file_uri( 'assets/fotos' ); ?>
<section class="leisure" id="lazer">
  <header class="sec-head">
    <h2>Sinta a experiência de morar na Fazenda Canoa</h2>
    <p>Infraestrutura de resort entregue, distribuída em mais de 608 mil m² de área planejada.</p>
  </header>

  <div class="leisure__gallery" id="leisure-gallery">
    <button class="gallery__nav gallery__nav--prev" aria-label="Foto anterior">‹</button>
    <div class="gallery__track">
      <figure class="gallery__slide is-active"><img src="<?php echo esc_url( "$dir/22.jpg" ); ?>" alt="Heliponto e lago"><figcaption>Heliponto + vista do lago</figcaption></figure>
      <figure class="gallery__slide"><img src="<?php echo esc_url( "$dir/12.jpg" ); ?>" alt="Vinícola Costa Cave"><figcaption>Vinícola Costa Cave</figcaption></figure>
      <figure class="gallery__slide"><img src="<?php echo esc_url( "$dir/28.jpg" ); ?>" alt="Complexo esportivo"><figcaption>Complexo esportivo</figcaption></figure>
      <figure class="gallery__slide"><img src="<?php echo esc_url( "$dir/08.jpg" ); ?>" alt="Pavilhão Social"><figcaption>Pavilhão Social</figcaption></figure>
      <figure class="gallery__slide"><img src="<?php echo esc_url( "$dir/15.jpg" ); ?>" alt="Portaria em pedra"><figcaption>Portaria principal</figcaption></figure>
      <figure class="gallery__slide"><img src="<?php echo esc_url( "$dir/33.jpg" ); ?>" alt="Quadra de basquete"><figcaption>Quadra de basquete</figcaption></figure>
      <figure class="gallery__slide"><img src="<?php echo esc_url( "$dir/03.jpg" ); ?>" alt="Estar social"><figcaption>Estar social</figcaption></figure>
      <figure class="gallery__slide"><img src="<?php echo esc_url( "$dir/02.jpg" ); ?>" alt="Detalhe Pavilhão"><figcaption>Arquitetura autoral</figcaption></figure>
    </div>
    <button class="gallery__nav gallery__nav--next" aria-label="Próxima foto">›</button>
    <div class="gallery__dots" role="tablist"></div>
  </div>

  <div class="amenities">
    <h3 class="amenities__title">Amenidades do empreendimento</h3>
    <ul class="amenities__list">
      <li class="am-item"><span class="am-item__icon"><svg viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 22c3-2 5-2 8 0s5 2 8 0 5-2 8 0"/><path d="M4 26c3-2 5-2 8 0s5 2 8 0 5-2 8 0"/><path d="M8 18V8c0-2 1-3 3-3s3 1 3 3M18 18V9"/></svg></span><span class="am-item__name">Beach Club</span><span class="am-item__sub">Piscina infinita e bar</span></li>
      <li class="am-item"><span class="am-item__icon"><svg viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 10c3-3 6-3 9 0s6 3 9 0 6-3 9 0"/><path d="M2 18c3-3 6-3 9 0s6 3 9 0 6-3 9 0"/><path d="M2 26c3-3 6-3 9 0s6 3 9 0 6-3 9 0"/></svg></span><span class="am-item__name">Orla privativa</span><span class="am-item__sub">2.000 m no Lago Corumbá IV</span></li>
      <li class="am-item"><span class="am-item__icon"><svg viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 24h24M8 24V10M14 24V14M20 24V12M26 24V16M2 28c2-1 4-1 6 0s4 1 6 0 4-1 6 0 4-1 6 0"/></svg></span><span class="am-item__name">Dois píeres</span><span class="am-item__sub">Praia + rampa de barcos</span></li>
      <li class="am-item"><span class="am-item__icon"><svg viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 20h24l-3 6H7zM6 20V8h20v12M12 14h8"/></svg></span><span class="am-item__name">Garagem de barcos</span><span class="am-item__sub">12 vagas · energia solar</span></li>
      <li class="am-item"><span class="am-item__icon"><svg viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M16 4v18M16 4l-6 14h12zM4 24c3-2 5-2 8 0s5 2 8 0 5-2 8 0"/></svg></span><span class="am-item__name">Marina Jatobá</span><span class="am-item__sub">Náutica + estaleiro</span></li>
      <li class="am-item"><span class="am-item__icon"><svg viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="5" y="12" width="22" height="10" rx="1"/><path d="M12 22V10h8v12M9 26h14M2 16h5M25 16h5"/></svg></span><span class="am-item__name">Heliponto ANAC</span><span class="am-item__sub">Voos noturnos</span></li>
      <li class="am-item"><span class="am-item__icon"><svg viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><ellipse cx="13" cy="11" rx="6" ry="8"/><path d="M9 7c0-2 1-3 3-3M17 15l8 10M23 21l2 2"/></svg></span><span class="am-item__name">Tênis oficial</span><span class="am-item__sub">3 quadras de saibro</span></li>
      <li class="am-item"><span class="am-item__icon"><svg viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 28V16l12-10 12 10v12zM4 28h24M12 28v-8h8v8"/></svg></span><span class="am-item__name">Pavilhão Social</span><span class="am-item__sub">Cozinha gourmet</span></li>
      <li class="am-item"><span class="am-item__icon"><svg viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 12c0-3-3-5-6-4-4 1-8 6-10 10 3 0 7-1 10-3M20 12l-2 8c-1 4 2 6 5 3l5-6-8-5zM23 7l-3 5M27 10h-3"/></svg></span><span class="am-item__name">Praça do Beija-Flor</span><span class="am-item__sub">Complexo esportivo</span></li>
      <li class="am-item"><span class="am-item__icon"><svg viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M8 28c2-8 6-12 12-14M20 14l4-6M24 8l-2 6 6-2zM20 14c0 3 2 5 4 5"/><circle cx="20" cy="16" r="1" fill="currentColor"/></svg></span><span class="am-item__name">Praça do Sabiá</span><span class="am-item__sub">Contato com a natureza</span></li>
      <li class="am-item"><span class="am-item__icon"><svg viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="16" cy="16" r="8"/><path d="M16 8v16M8 16h16M10 10l12 12M22 10L10 22"/></svg></span><span class="am-item__name">Quadras de areia</span><span class="am-item__sub">Vôlei + beach tennis</span></li>
      <li class="am-item"><span class="am-item__icon"><svg viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="4" y="8" width="24" height="16" rx="1"/><path d="M4 16h24M16 8v16"/><circle cx="16" cy="16" r="3"/></svg></span><span class="am-item__name">Poliesportiva</span><span class="am-item__sub">Multiuso</span></li>
      <li class="am-item"><span class="am-item__icon"><svg viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="10" width="26" height="12"/><path d="M3 16h26M16 10v12"/><circle cx="16" cy="16" r="2"/><path d="M7 10v2M25 10v2M7 20v2M25 20v2"/></svg></span><span class="am-item__name">Campo Society</span><span class="am-item__sub">Gramado oficial</span></li>
      <li class="am-item"><span class="am-item__icon"><svg viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="16" cy="16" r="10"/><path d="M6 16c6 0 10-4 10-10M26 16c-6 0-10-4-10-10M6 16c6 0 10 4 10 10M26 16c-6 0-10 4-10 10"/></svg></span><span class="am-item__name">Basquete</span><span class="am-item__sub">Quadra oficial</span></li>
      <li class="am-item"><span class="am-item__icon"><svg viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 6h20v14a6 6 0 01-10 0 6 6 0 01-10 0z"/><path d="M6 26h20M12 22v4M20 22v4M11 12h2M19 12h2M10 16c1 2 3 2 4 0M18 16c1 2 3 2 4 0"/></svg></span><span class="am-item__name">Arena Theater</span><span class="am-item__sub">Anfiteatro Pedra Miracema</span></li>
      <li class="am-item"><span class="am-item__icon"><svg viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="18" cy="6" r="2.5"/><path d="M14 14l4-4 3 4 4 2M10 20l4-6 5 5v7M8 22l-2 6M22 22l4 6"/></svg></span><span class="am-item__name">Pista de Cooper</span><span class="am-item__sub">Integrada à ciclovia</span></li>
      <li class="am-item"><span class="am-item__icon"><svg viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="8" cy="24" r="4"/><circle cx="24" cy="24" r="4"/><path d="M8 24l4-12h6l6 12M12 12l2-4h4"/><circle cx="20" cy="8" r="1.5"/></svg></span><span class="am-item__name">Ciclovia</span><span class="am-item__sub">Percurso interno</span></li>
      <li class="am-item"><span class="am-item__icon"><svg viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 24l10-14 10 14zM6 24h20M12 24v-6h8v6M16 10V6"/></svg></span><span class="am-item__name">Fazendinha</span><span class="am-item__sub">Playground lúdico</span></li>
      <li class="am-item"><span class="am-item__icon"><svg viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 12h2v8H4zM26 12h2v8h-2zM6 14h4v4H6zM22 14h4v4h-4zM10 16h12M14 6c0 2-2 3-2 5M20 6c0 2-2 3-2 5M17 6c0 2-2 3-2 5"/></svg></span><span class="am-item__name">Fitness + SPA</span><span class="am-item__sub">Sauna molhada · duchas</span></li>
      <li class="am-item am-item--highlight"><span class="am-item__icon"><svg viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 6h8l2 6c0 4-2 6-6 6s-6-2-6-6zM16 18v8M12 26h8"/></svg></span><span class="am-item__name">Vinícola Costa Cave</span><span class="am-item__sub">Produção própria</span></li>
      <li class="am-item"><span class="am-item__icon"><svg viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M16 4l10 4v8c0 6-4 10-10 12-6-2-10-6-10-12V8z"/><path d="M13 16l2 2 5-5"/></svg></span><span class="am-item__name">Portaria 24h</span><span class="am-item__sub">Monitoramento integrado</span></li>
      <li class="am-item"><span class="am-item__icon"><svg viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="16" cy="16" r="4"/><path d="M16 2v4M16 26v4M2 16h4M26 16h4M6 6l3 3M23 23l3 3M6 26l3-3M23 9l3-3"/></svg></span><span class="am-item__name">Acabamentos premium</span><span class="am-item__sub">Deca · Docol · Archtech</span></li>
    </ul>
  </div>
</section>
<!-- /wp:html -->

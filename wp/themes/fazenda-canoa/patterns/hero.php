<?php
/**
 * Title: Hero — Banner principal com slideshow
 * Slug: fazenda-canoa/hero
 * Categories: fazenda-canoa
 * Description: Banner full-width com nome do empreendimento, status, preço e slideshow automático de 7 fotos.
 */
?>
<!-- wp:html -->
<?php $dir = get_theme_file_uri( 'assets/fotos' ); ?>
<section class="hero" id="top">
  <div class="hero__head">
    <p class="crumbs">
      <a href="#">Goiás</a>
      <span aria-hidden="true">›</span>
      <a href="#">Silvânia</a>
      <span aria-hidden="true">›</span>
      <a href="#">Condomínios</a>
      <span aria-hidden="true">›</span>
      <span>Reserva Fazenda Canoa</span>
    </p>

    <h1 class="hero__title">Condomínio Reserva Fazenda Canoa</h1>

    <p class="hero__meta">
      <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M12 22s8-8 8-13a8 8 0 10-16 0c0 5 8 13 8 13z"/><circle cx="12" cy="9" r="3"/></svg>
      <span>Silvânia, GO</span>
      <span class="dot">·</span>
      <span>Margens do Lago Corumbá IV</span>
      <span class="dot">·</span>
      <span>Eixo Brasília–Goiânia–Anápolis</span>
    </p>

    <div class="hero__status">
      <span class="tag tag--ok"><span class="tag__dot"></span>Lançamento II em comercialização</span>
      <span class="tag">2.000 m de orla privativa</span>
      <span class="tag">+500 mil m² de área verde</span>
    </div>
  </div>

  <div class="hero__banner">
    <img class="hero__banner-img" src="<?php echo esc_url( "$dir/22.jpg" ); ?>" alt="Vista aérea da Reserva Fazenda Canoa com heliponto, quadras esportivas e Lago Corumbá IV ao fundo" loading="eager" fetchpriority="high">
    <button class="hero__all-photos" type="button" aria-label="Ver todas as fotos">
      <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
      Ver todas as fotos (37)
    </button>
  </div>

  <div class="hero__thumbs" aria-label="Miniaturas do empreendimento">
    <button class="hero__thumb is-active" data-src="<?php echo esc_url( "$dir/22.jpg" ); ?>" aria-label="Vista aérea"><img src="<?php echo esc_url( "$dir/22.jpg" ); ?>" alt=""></button>
    <button class="hero__thumb" data-src="<?php echo esc_url( "$dir/15.jpg" ); ?>" aria-label="Portaria principal"><img src="<?php echo esc_url( "$dir/15.jpg" ); ?>" alt=""></button>
    <button class="hero__thumb" data-src="<?php echo esc_url( "$dir/12.jpg" ); ?>" aria-label="Vinícola Costa Cave"><img src="<?php echo esc_url( "$dir/12.jpg" ); ?>" alt=""></button>
    <button class="hero__thumb" data-src="<?php echo esc_url( "$dir/08.jpg" ); ?>" aria-label="Pavilhão Social"><img src="<?php echo esc_url( "$dir/08.jpg" ); ?>" alt=""></button>
    <button class="hero__thumb" data-src="<?php echo esc_url( "$dir/28.jpg" ); ?>" aria-label="Complexo Esportivo"><img src="<?php echo esc_url( "$dir/28.jpg" ); ?>" alt=""></button>
    <button class="hero__thumb" data-src="<?php echo esc_url( "$dir/02.jpg" ); ?>" aria-label="Detalhes arquitetônicos"><img src="<?php echo esc_url( "$dir/02.jpg" ); ?>" alt=""></button>
    <button class="hero__thumb" data-src="<?php echo esc_url( "$dir/33.jpg" ); ?>" aria-label="Quadras"><img src="<?php echo esc_url( "$dir/33.jpg" ); ?>" alt=""></button>
  </div>

  <div class="hero__info-row">
    <div class="hero__price">
      <span class="hero__price-label">Lotes a partir de</span>
      <span class="hero__price-value">R$ 360.000</span>
      <span class="hero__price-note">Parcelamento direto com a incorporadora</span>
    </div>
    <div class="hero__ctas">
      <button type="button" class="btn btn--primary btn--lg" data-capture="hero">
        <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor" aria-hidden="true"><path d="M17.5 14.4l-2.4-.7c-.3-.1-.7 0-.9.2l-1 .9a7.6 7.6 0 01-3.3-3.3l.9-1c.2-.2.3-.6.2-.9l-.7-2.4a1 1 0 00-1-.7H7a1 1 0 00-1 1 10 10 0 0010 10 1 1 0 001-1v-1.4a1 1 0 00-.7-1zM12 2a10 10 0 100 20 10 10 0 000-20z"/></svg>
        Falar com consultor
      </button>
      <a href="#tipologias" class="btn btn--outline btn--lg">Ver tipologias</a>
    </div>
  </div>
</section>
<!-- /wp:html -->

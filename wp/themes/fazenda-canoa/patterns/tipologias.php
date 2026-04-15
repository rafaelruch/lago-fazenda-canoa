<?php
/**
 * Title: Tipologias — Lotes disponíveis
 * Slug: fazenda-canoa/tipologias
 * Categories: fazenda-canoa
 * Description: Grid de 3 cards com tipologias (Frente-Lago, Vista-Lago, Bosque).
 */
?>
<!-- wp:html -->
<?php $dir = get_theme_file_uri( 'assets/fotos' ); ?>
<section class="types" id="tipologias">
  <header class="sec-head">
    <h2>Tipologias disponíveis</h2>
    <p>Lotes com metragens e posicionamentos distintos, sob consulta ao time comercial.</p>
  </header>

  <div class="types__scroll" role="list">
    <article class="type-card" role="listitem">
      <div class="type-card__badge">Frente-Lago</div>
      <div class="type-card__img"><img src="<?php echo esc_url( "$dir/01.jpg" ); ?>" alt="Lote frente-lago" loading="lazy"></div>
      <div class="type-card__info">
        <h3>Frente-Lago</h3>
        <dl class="type-card__specs">
          <div><dt>Metragem</dt><dd>sob consulta</dd></div>
          <div><dt>Posição</dt><dd>Frente</dd></div>
          <div><dt>Disponibilidade</dt><dd>Limitada</dd></div>
        </dl>
        <p class="type-card__price">A partir de <strong>R$ 360.000</strong></p>
        <button type="button" class="btn btn--primary btn--block" data-capture="lote-frente-lago">Quero este lote</button>
      </div>
    </article>

    <article class="type-card" role="listitem">
      <div class="type-card__badge">Vista-Lago</div>
      <div class="type-card__img"><img src="<?php echo esc_url( "$dir/16.jpg" ); ?>" alt="Lote vista-lago" loading="lazy"></div>
      <div class="type-card__info">
        <h3>Vista-Lago</h3>
        <dl class="type-card__specs">
          <div><dt>Metragem</dt><dd>sob consulta</dd></div>
          <div><dt>Posição</dt><dd>Elevado</dd></div>
          <div><dt>Disponibilidade</dt><dd>Média</dd></div>
        </dl>
        <p class="type-card__price">A partir de <strong>R$ 360.000</strong></p>
        <button type="button" class="btn btn--primary btn--block" data-capture="lote-vista-lago">Quero este lote</button>
      </div>
    </article>

    <article class="type-card" role="listitem">
      <div class="type-card__badge">Bosque</div>
      <div class="type-card__img"><img src="<?php echo esc_url( "$dir/25.jpg" ); ?>" alt="Lote bosque" loading="lazy"></div>
      <div class="type-card__info">
        <h3>Bosque</h3>
        <dl class="type-card__specs">
          <div><dt>Metragem</dt><dd>sob consulta</dd></div>
          <div><dt>Posição</dt><dd>Mata preservada</dd></div>
          <div><dt>Disponibilidade</dt><dd>Boa</dd></div>
        </dl>
        <p class="type-card__price">A partir de <strong>R$ 360.000</strong></p>
        <button type="button" class="btn btn--primary btn--block" data-capture="lote-bosque">Quero este lote</button>
      </div>
    </article>
  </div>
</section>
<!-- /wp:html -->

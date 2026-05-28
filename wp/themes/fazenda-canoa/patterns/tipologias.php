<?php
/**
 * Title: Tipologias — diferenciais do território
 * Slug: fazenda-canoa/tipologias
 * Categories: fazenda-canoa
 * Description: Grid de 3 cards apresentando diferenciais do empreendimento (Praia Náutica, Lago Corumbá IV, Natureza preservada).
 */
?>
<!-- wp:html -->
<?php $dir = get_theme_file_uri( 'assets/fotos' ); ?>
<section class="types" id="tipologias">
  <header class="sec-head">
    <p>Mais do que um empreendimento, um território raro cercado pelas águas do Lago Corumbá IV.</p>
  </header>

  <div class="types__scroll" role="list">
    <article class="type-card" role="listitem">
      <div class="type-card__badge">Praia Náutica</div>
      <div class="type-card__img"><img src="<?php echo esc_url( "$dir/lote-frente.jpg" ); ?>" alt="Praia Náutica — vista aérea da orla privativa da Fazenda Canoa no Lago Corumbá IV" loading="lazy"></div>
      <div class="type-card__info">
        <h3>Praia Náutica</h3>
        <p class="type-card__lede">A Praia Náutica da Fazenda Canoa conta com aproximadamente <strong>2.000 metros</strong> de orla privativa às margens do Lago Corumbá IV.</p>
        <button type="button" class="btn btn--primary btn--block" data-capture="praia-nautica">Quero conhecer</button>
      </div>
    </article>

    <article class="type-card" role="listitem">
      <div class="type-card__badge">Lago Corumbá IV</div>
      <div class="type-card__img"><img src="<?php echo esc_url( "$dir/lote-vista.jpg" ); ?>" alt="Lago Corumbá IV — vista panorâmica do espelho d'água" loading="lazy"></div>
      <div class="type-card__info">
        <h3>Lago Corumbá IV</h3>
        <p class="type-card__lede">O Lago Corumbá IV possui aproximadamente <strong>173 km²</strong> de área alagada e cerca de <strong>783,7 km</strong> de perímetro, com capacidade para cerca de <strong>3,7 trilhões de litros</strong> de água.</p>
        <button type="button" class="btn btn--primary btn--block" data-capture="lago-corumba">Quero conhecer</button>
      </div>
    </article>

    <article class="type-card" role="listitem">
      <div class="type-card__badge">Natureza preservada</div>
      <div class="type-card__img"><img src="<?php echo esc_url( "$dir/lote-bosque.jpg" ); ?>" alt="Natureza preservada — paisagismo assinado por Luiz Carlos Orsini" loading="lazy"></div>
      <div class="type-card__info">
        <h3>Natureza preservada</h3>
        <p class="type-card__lede">Paisagismo assinado por <strong>Luiz Carlos Orsini</strong>, um dos nomes mais reconhecidos do paisagismo contemporâneo brasileiro.</p>
        <button type="button" class="btn btn--primary btn--block" data-capture="natureza-preservada">Quero conhecer</button>
      </div>
    </article>
  </div>
</section>
<!-- /wp:html -->

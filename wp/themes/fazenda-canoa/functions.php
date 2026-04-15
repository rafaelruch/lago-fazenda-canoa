<?php
/**
 * Fazenda Canoa — Block Theme
 * Functions: enqueues, pattern categories, theme setup
 *
 * @package FazendaCanoa
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Theme setup
 */
add_action( 'after_setup_theme', function () {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'custom-logo', [
		'height'      => 80,
		'width'       => 320,
		'flex-width'  => true,
		'flex-height' => true,
	] );
	add_theme_support( 'html5', [ 'search-form', 'gallery', 'script', 'style' ] );
	load_theme_textdomain( 'fazenda-canoa', get_template_directory() . '/languages' );
} );

/**
 * Favicon e meta tags (site icon do tema)
 * Garante que o favicon do tema funcione mesmo antes do cliente configurar via Customizer.
 */
add_action( 'wp_head', function () {
	// Só injeta se o usuário ainda não configurou um Site Icon via admin
	if ( has_site_icon() ) return;

	$favicon = get_theme_file_uri( 'assets/logos/favicon.png' );
	echo '<link rel="icon" type="image/png" href="' . esc_url( $favicon ) . '">' . "\n";
	echo '<link rel="apple-touch-icon" href="' . esc_url( $favicon ) . '">' . "\n";
	echo '<meta name="theme-color" content="#FFFFFF">' . "\n";
}, 1 );

/**
 * Open Graph tags (compartilhamento em redes sociais)
 */
add_action( 'wp_head', function () {
	$title = wp_get_document_title();
	$desc  = 'Condomínio Reserva Fazenda Canoa — Lotes a partir de R$ 360.000 em Silvânia/GO, às margens do Lago Corumbá IV. Infraestrutura de resort entregue.';
	$url   = home_url( add_query_arg( null, null ) );
	$og    = get_theme_file_uri( 'assets/fotos/22.jpg' );
	?>
	<meta property="og:type" content="website">
	<meta property="og:title" content="<?php echo esc_attr( $title ); ?>">
	<meta property="og:description" content="<?php echo esc_attr( $desc ); ?>">
	<meta property="og:url" content="<?php echo esc_url( $url ); ?>">
	<meta property="og:image" content="<?php echo esc_url( $og ); ?>">
	<meta property="og:locale" content="pt_BR">
	<meta name="twitter:card" content="summary_large_image">
	<meta name="description" content="<?php echo esc_attr( $desc ); ?>">
	<?php
}, 2 );

/**
 * Enqueue styles and scripts (front-end)
 */
add_action( 'wp_enqueue_scripts', function () {
	$ver = wp_get_theme()->get( 'Version' );

	// Google Fonts
	wp_enqueue_style(
		'fc-google-fonts',
		'https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700&display=swap',
		[],
		null
	);

	// Main stylesheet (our frontend CSS, copied from prototype)
	wp_enqueue_style(
		'fc-main',
		get_theme_file_uri( 'assets/css/main.css' ),
		[ 'fc-google-fonts' ],
		$ver
	);

	// Main script — deferred
	wp_enqueue_script(
		'fc-main',
		get_theme_file_uri( 'assets/js/main.js' ),
		[],
		$ver,
		[ 'in_footer' => true, 'strategy' => 'defer' ]
	);

	// Localize: passa opções do plugin pro JS (whatsapp, etc.)
	$opts = function_exists( 'lfc_get_options' ) ? lfc_get_options() : [];
	wp_localize_script( 'fc-main', 'FC_OPTS', [
		'whatsapp' => $opts['whatsapp'] ?? '5562999593530',
		'email'    => $opts['email']    ?? '',
		'horario'  => $opts['horario']  ?? '',
	] );
} );

/**
 * Pattern categories
 */
add_action( 'init', function () {
	if ( ! function_exists( 'register_block_pattern_category' ) ) return;

	register_block_pattern_category( 'fazenda-canoa', [
		'label'       => __( 'Fazenda Canoa', 'fazenda-canoa' ),
		'description' => __( 'Seções da Landing Page do Condomínio Reserva Fazenda Canoa', 'fazenda-canoa' ),
	] );
} );

/**
 * Expõe constantes de contato para uso nos patterns (fallback se plugin estiver off)
 */
if ( ! function_exists( 'fc_whatsapp_number' ) ) {
	function fc_whatsapp_number() {
		$opts = function_exists( 'lfc_get_options' ) ? lfc_get_options() : [];
		return $opts['whatsapp'] ?? '5562999593530';
	}
}
if ( ! function_exists( 'fc_whatsapp_url' ) ) {
	function fc_whatsapp_url( $message = '' ) {
		$num = fc_whatsapp_number();
		$base = 'https://wa.me/' . preg_replace( '/\D/', '', $num );
		return $message ? $base . '?text=' . rawurlencode( $message ) : $base;
	}
}

/**
 * Template parts (.html) NÃO executam PHP. Este filtro substitui placeholders
 * como {{THEME_URL}}, {{WHATSAPP_URL}}, {{LOGO}} por valores dinâmicos.
 *
 * Usado em parts/header.html, parts/footer.html, parts/floating-widget.html.
 */
add_filter( 'render_block', function ( $block_content, $block ) {
	if ( empty( $block_content ) ) return $block_content;
	if ( strpos( $block_content, '{{' ) === false ) return $block_content;

	$opts = function_exists( 'lfc_get_options' ) ? lfc_get_options() : [];
	$wa_number = $opts['whatsapp'] ?? '5562999593530';
	$wa_formatted = '';
	$num_clean = preg_replace( '/\D/', '', $wa_number );
	if ( strlen( $num_clean ) >= 12 ) {
		$wa_formatted = '(' . substr( $num_clean, 2, 2 ) . ') ' . substr( $num_clean, 4, 5 ) . '-' . substr( $num_clean, 9, 4 );
	} else {
		$wa_formatted = $wa_number;
	}

	$replacements = [
		'{{THEME_URL}}'           => untrailingslashit( get_theme_file_uri( '' ) ),
		'{{LOGO_HEADER}}'         => esc_url( get_theme_file_uri( 'assets/logos/Logo Fazenda Reserva incorporador 3.png' ) ),
		'{{LOGO_FOOTER}}'         => esc_url( get_theme_file_uri( 'assets/logos/Logo Fazenda Reserva incorporador 3.png' ) ),
		'{{FAVICON}}'             => esc_url( get_theme_file_uri( 'assets/logos/favicon.png' ) ),
		'{{WHATSAPP_URL}}'        => esc_url( fc_whatsapp_url() ),
		'{{WHATSAPP_URL_HERO}}'   => esc_url( fc_whatsapp_url( 'Olá! Vim pela página da Fazenda Canoa' ) ),
		'{{WHATSAPP_URL_CONSULTOR}}' => esc_url( fc_whatsapp_url( 'Olá! Quero falar com um consultor da Fazenda Canoa' ) ),
		'{{WHATSAPP_NUMBER}}'     => esc_html( $wa_formatted ),
		'{{YEAR}}'                => esc_html( date( 'Y' ) ),
	];

	return strtr( $block_content, $replacements );
}, 10, 2 );

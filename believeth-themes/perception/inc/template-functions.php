<?php
function perceptron_body_classes( $classes ) {
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	return $classes;
}
add_filter( 'body_class', 'perceptron_body_classes' );

function perceptron_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'perceptron_pingback_header' );

function perceptron_studio_fonts_url() {
	$font_url = '';
	if ( 'off' !== _x( 'on', 'Google font: on or off', 'perceptron' ) ) {
		$font_url = add_query_arg( 'family', urlencode( 'Titillium Web:300,400,600,700' ), 'https://fonts.googleapis.com/css' );
	}
	return $font_url;
}

function perceptron_studio_scripts() {
	wp_enqueue_style( 'studio-fonts', perceptron_studio_fonts_url(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'perceptron_studio_scripts' );

function perceptron_site_icon() {
	if ( function_exists( 'has_site_icon' ) && has_site_icon() ) {
		return;
	}
	global $perceptron_option;
	if ( ! empty( $perceptron_option['rs_favicon']['url'] ) ) {
		echo '<link rel="shortcut icon" type="image/x-icon" href="' . esc_url( $perceptron_option['rs_favicon']['url'] ) . '">';
	}
}
add_action( 'wp_head', 'perceptron_site_icon' );

function perceptron_add_excerpt_support_for_cpt() {
	add_post_type_support( 'services', 'excerpt' );
}
add_action( 'init', 'perceptron_add_excerpt_support_for_cpt' );

function perceptron_wpex_get_excerpt( $args = array() ) {
	$defaults = array(
		'post'            => '',
		'length'          => 68,
		'readmore'        => false,
		'readmore_text'   => esc_html__( 'read more', 'perceptron' ),
		'readmore_after'  => '',
		'custom_excerpts' => true,
		'disable_more'    => false,
	);
	$defaults = apply_filters( 'perceptron_wpex_get_excerpt_defaults', $defaults );
	$args     = wp_parse_args( $args, $defaults );
	$args     = apply_filters( 'perceptron_wpex_get_excerpt_args', $args );

	$post            = $args['post'];
	$length          = (int) $args['length'];
	$readmore        = (bool) $args['readmore'];
	$readmore_text   = $args['readmore_text'];
	$readmore_after  = $args['readmore_after'];
	$custom_excerpts = (bool) $args['custom_excerpts'];
	$disable_more    = (bool) $args['disable_more'];

	if ( ! $post ) {
		global $post;
	}

	$post_id = $post->ID;

	if ( $custom_excerpts && has_excerpt( $post_id ) ) {
		$output = $post->post_excerpt;
	} else {
		$readmore_link = '<a href="' . get_permalink( $post_id ) . '" class="readmore">' . $readmore_text . $readmore_after . '</a>';
		if ( ! $disable_more && strpos( $post->post_content, '<!--more-->' ) ) {
			$output = apply_filters( 'the_content', get_the_content( $readmore_text . $readmore_after ) );
		} else {
			$output = wp_trim_words( strip_shortcodes( $post->post_content ), $length );
			if ( $readmore ) {
				$output .= apply_filters( 'perceptron_wpex_readmore_link', $readmore_link );
			}
		}
	}

	return apply_filters( 'perceptron_wpex_get_excerpt', $output );
}

function perceptron_import_files() {
	return array(
		array(
			'import_file_name'       => 'perceptron Demo Import',
			'categories'             => array( 'Category 1' ),
			'import_file_url'        => trailingslashit( get_template_directory_uri() ) . 'ocdi/perceptron-content.xml',
			'import_widget_file_url' => trailingslashit( get_template_directory_uri() ) . 'ocdi/perceptron-content.wie',
			'import_redux'           => array(
				array(
					'file_url'    => trailingslashit( get_template_directory_uri() ) . 'ocdi/perceptron-content.json',
					'option_name' => 'perceptron_option',
				),
			),
			'import_notice' => esc_html__( 'Caution: For importing demo data please click on "Import Demo Data" button. During demo data installation please do not refresh the page.', 'perceptron' ),
		),
	);
}
add_filter( 'pt-ocdi/import_files', 'perceptron_import_files' );

function perceptron_after_import_setup() {
	$main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
	set_theme_mod( 'nav_menu_locations', array(
		'menu-1' => $main_menu ? $main_menu->term_id : 0,
	) );

	$front_pages = get_posts( array(
		'post_type'              => 'page',
		'title'                  => 'Home',
		'posts_per_page'         => 1,
		'no_found_rows'          => true,
		'update_post_meta_cache' => false,
		'update_post_term_cache' => false,
	) );

	$blog_pages = get_posts( array(
		'post_type'              => 'page',
		'title'                  => 'Blog',
		'posts_per_page'         => 1,
		'no_found_rows'          => true,
		'update_post_meta_cache' => false,
		'update_post_term_cache' => false,
	) );

	$front_page = ! empty( $front_pages ) ? $front_pages[0] : null;
	$blog_page  = ! empty( $blog_pages )  ? $blog_pages[0]  : null;

	update_option( 'show_on_front', 'page' );
	if ( $front_page ) {
		update_option( 'page_on_front', $front_page->ID );
	}
	if ( $blog_page ) {
		update_option( 'page_for_posts', $blog_page->ID );
	}

	if ( class_exists( 'RevSlider' ) ) {
		$slider_array = array(
			get_template_directory() . '/ocdi/sliders/slider-1.zip',
			get_template_directory() . '/ocdi/sliders/slider-2.zip',
			get_template_directory() . '/ocdi/sliders/slider-3.zip',
			get_template_directory() . '/ocdi/sliders/apps.zip',
			get_template_directory() . '/ocdi/sliders/about.zip',
			get_template_directory() . '/ocdi/sliders/testimonial.zip',
			get_template_directory() . '/ocdi/sliders/slider-11.zip',
		);
		$slider = new RevSlider();
		foreach ( $slider_array as $filepath ) {
			$slider->importSliderFromPost( true, true, $filepath );
		}
	}
}
add_action( 'pt-ocdi/after_import', 'perceptron_after_import_setup' );
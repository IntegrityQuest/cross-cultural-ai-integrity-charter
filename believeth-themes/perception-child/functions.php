<?php
function perceptron_child_enqueue_styles() {
	$parent_style = 'perceptron-style';
	$parent_theme = wp_get_theme( 'perception' );
	$version = $parent_theme ? $parent_theme->get( 'Version' ) : false;
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css', array(), $version );
	wp_enqueue_style( 'perceptron-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( $parent_style ),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'perceptron_child_enqueue_styles', 11 );

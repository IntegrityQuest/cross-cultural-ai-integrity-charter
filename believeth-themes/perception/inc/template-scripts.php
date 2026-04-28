<?php
function perceptron_scripts() {
	$ver = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'bootstrap',                   get_template_directory_uri() . '/assets/css/bootstrap.min.css',    array(), $ver );
	wp_enqueue_style( 'font-awesome',                get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), $ver );
	wp_enqueue_style( 'icofont',                     get_template_directory_uri() . '/assets/css/icofont.css',           array(), $ver );
	wp_enqueue_style( 'flaticon',                    get_template_directory_uri() . '/assets/css/flaticon.css',          array(), $ver );
	wp_enqueue_style( 'lineicon',                    get_template_directory_uri() . '/assets/css/lineicons.css',         array(), $ver );
	wp_enqueue_style( 'owl-carousel',                get_template_directory_uri() . '/assets/css/owl.carousel.css',     array(), $ver );
	wp_enqueue_style( 'slick',                       get_template_directory_uri() . '/assets/css/slick.css',             array(), $ver );
	wp_enqueue_style( 'magnific-popup',              get_template_directory_uri() . '/assets/css/magnific-popup.css',   array(), $ver );
	wp_enqueue_style( 'perceptron-style-default',    get_template_directory_uri() . '/assets/css/default.css',          array(), $ver );
	wp_enqueue_style( 'perceptron-style-responsive', get_template_directory_uri() . '/assets/css/responsive.css',       array(), $ver );
	wp_enqueue_style( 'perceptron-style',            get_stylesheet_uri(),                                               array(), $ver );

	wp_enqueue_script( 'modernizr',             get_template_directory_uri() . '/assets/js/modernizr-2.8.3.min.js',        array( 'jquery' ),                 $ver, true );
	wp_enqueue_script( 'bootstrap',             get_template_directory_uri() . '/assets/js/bootstrap.min.js',               array( 'jquery' ),                 $ver, true );
	wp_enqueue_script( 'owl-carousel',          get_template_directory_uri() . '/assets/js/owl.carousel.min.js',            array( 'jquery' ),                 $ver, true );
	wp_enqueue_script( 'slick',                 get_template_directory_uri() . '/assets/js/slick.min.js',                   array( 'jquery' ),                 $ver, true );
	wp_enqueue_script( 'waypoints',             get_template_directory_uri() . '/assets/js/waypoints.min.js',               array( 'jquery' ),                 $ver, true );
	wp_enqueue_script( 'waypoints-sticky',      get_template_directory_uri() . '/assets/js/waypoints-sticky.min.js',        array( 'jquery' ),                 $ver, true );
	wp_enqueue_script( 'jquery-counterup',      get_template_directory_uri() . '/assets/js/jquery.counterup.min.js',        array( 'jquery' ),                 $ver, true );
	wp_enqueue_script( 'isotope-perceptron',    get_template_directory_uri() . '/assets/js/isotope-perceptron.js',          array( 'jquery', 'imagesloaded' ), $ver, true );
	wp_enqueue_script( 'jflickrfeed',           get_template_directory_uri() . '/assets/js/flickr/jflickrfeed.min.js',      array( 'jquery' ),                 $ver, true );
	wp_enqueue_script( 'jquery-magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js',   array( 'jquery' ),                 $ver, true );

	if ( class_exists( 'ReduxFramework' ) ) {
		wp_enqueue_script( 'time-circle', get_template_directory_uri() . '/assets/js/time-circle.js', array( 'jquery' ), $ver, true );
	}

	wp_enqueue_script( 'perceptron-classie', get_template_directory_uri() . '/assets/js/classie.js', array( 'jquery' ), $ver, true );
	wp_enqueue_script( 'perceptron-main',    get_template_directory_uri() . '/assets/js/main.js',    array( 'jquery' ), $ver, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'perceptron_scripts' );

add_action( 'admin_enqueue_scripts', 'perceptron_load_admin_styles' );
function perceptron_load_admin_styles( $screen ) {
	$ver = wp_get_theme()->get( 'Version' );
	wp_enqueue_style(  'perceptron-admin-style',  get_template_directory_uri() . '/assets/css/admin-style.css', array(), $ver );
	wp_enqueue_script( 'perceptron-admin-script', get_template_directory_uri() . '/assets/js/admin-script.js',  array( 'jquery' ), $ver, true );
}

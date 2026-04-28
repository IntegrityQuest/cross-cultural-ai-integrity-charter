<?php

// Excerpt: strip trailing read-more bracket added by some plugins
function perceptron_change_excerpt( $text ) {
	$pos = strrpos( $text, '[' );
	if ( $pos === false ) {
		return $text;
	}
	return rtrim( substr( $text, 0, $pos ) ) . '...';
}

// Limit excerpt to N words
function perceptron_custom_excerpt( $limit ) {
	$excerpt = explode( ' ', get_the_excerpt(), $limit );
	if ( count( $excerpt ) >= $limit ) {
		array_pop( $excerpt );
		$excerpt = implode( ' ', $excerpt ) . '...';
	} else {
		$excerpt = implode( ' ', $excerpt );
	}
	$excerpt = preg_replace( '`[[^]]*]`', '', $excerpt );
	return $excerpt;
}

// Limit post content to N words (renamed from generic content() to avoid conflicts)
function perceptron_content( $limit ) {
	$content = explode( ' ', get_the_content(), $limit );
	if ( count( $content ) >= $limit ) {
		array_pop( $content );
		$content = implode( ' ', $content ) . '...';
	} else {
		$content = implode( ' ', $content );
	}
	$content = preg_replace( '/[.+]/', '', $content );
	$content = apply_filters( 'the_content', $content );
	$content = str_replace( ']]>', ']]&gt;', $content );
	return $content;
}

if ( ! function_exists( 'perceptron_setup' ) ) :
function perceptron_setup() {
	load_theme_textdomain( 'perceptron', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_filter( 'get_the_excerpt', 'perceptron_change_excerpt' );
	add_theme_support( 'post-thumbnails' );
	register_nav_menus( array(
		'menu-1'   => esc_html__( 'Primary Menu', 'perceptron' ),
		'footer-1' => esc_html__( 'Footer Menu', 'perceptron' ),
	) );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'script',
		'style',
	) );
	add_theme_support( 'custom-background', apply_filters( 'perceptron_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'custom-logo', array(
		'height'      => 250,
		'width'       => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );
	add_theme_support( 'post-formats', array(
		'aside', 'gallery', 'audio', 'video', 'image', 'quote', 'link',
	) );
	add_theme_support( 'align-wide' );
}
endif;
add_action( 'after_setup_theme', 'perceptron_setup' );

add_image_size( 'perceptron_portfolio-slider',  520, 640, true );
add_image_size( 'perceptron_blog-slider',        365, 243, true );
add_image_size( 'perceptron_latest_blog_small',  255, 157, true );
add_image_size( 'perceptron_image_slider_big',   860, 450, true );
add_image_size( 'perceptron_blog-footer',         80,  60, true );

function perceptron_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'perceptron_content_width', 640 );
}
add_action( 'after_setup_theme', 'perceptron_content_width', 0 );

if ( is_admin() ) {
	require_once get_template_directory() . '/framework/class-tgm-plugin-activation.php';
	require_once get_template_directory() . '/framework/tgm-config.php';
}

require_once get_template_directory() . '/inc/custom-header.php';
require_once get_template_directory() . '/inc/template-tags.php';
require_once get_template_directory() . '/inc/template-scripts.php';
require_once get_template_directory() . '/inc/template-functions.php';
require_once get_template_directory() . '/inc/template-sidebar.php';
require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/framework/custom.php';
require_once get_template_directory() . '/inc/woocommerce-functions.php';
require_once get_template_directory() . '/libs/theme-option/config.php';

if ( ! class_exists( 'reduxNewsflash' ) ) :
	class reduxNewsflash {
		public function __construct( $parent, $params ) {}
	}
endif;

function perceptron_remove_demo_mode_link() {
	if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
		remove_action( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks' ), null, 2 );
		remove_action( 'admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );
	}
}
add_action( 'init', 'perceptron_remove_demo_mode_link' );

function perceptron_theme_add_editor_styles() {
	add_editor_style( 'assets/css/custom-editor-style.css' );
}
add_action( 'admin_init', 'perceptron_theme_add_editor_styles' );

function perceptron_remove_revolution_slider_meta_boxes() {
	remove_meta_box( 'mymetabox_revslider_0', 'teams',    'normal' );
	remove_meta_box( 'mymetabox_revslider_0', 'page',     'normal' );
	remove_meta_box( 'mymetabox_revslider_0', 'post',     'normal' );
	remove_meta_box( 'mymetabox_revslider_0', 'rsclient', 'normal' );
	remove_meta_box( 'mymetabox_revslider_0', 'gallery',  'normal' );
}
add_action( 'do_meta_boxes', 'perceptron_remove_revolution_slider_meta_boxes' );

function perceptron_wpb_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}
add_filter( 'comment_form_fields', 'perceptron_wpb_move_comment_field_to_bottom' );

add_filter( 'get_the_archive_title', function( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = '<span class="vcard">' . get_the_author() . '</span>';
	}
	return $title;
} );

function perceptron_update_comment_fields( $fields ) {
	$commenter = wp_get_current_commenter();
	$req       = get_option( 'require_name_email' );
	$aria_req  = $req ? "aria-required='true'" : '';
	$fields['author'] =
		'<p class="comment-form-author">
			<input id="author" name="author" type="text" placeholder="' . esc_attr__( 'Name', 'perceptron' ) . '" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" ' . $aria_req . ' />
		</p>';
	$fields['email'] =
		'<p class="comment-form-email">
			<input id="email" name="email" type="email" placeholder="' . esc_attr__( 'Email', 'perceptron' ) . '" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" ' . $aria_req . ' />
		</p>';
	return $fields;
}
add_filter( 'comment_form_default_fields', 'perceptron_update_comment_fields' );

function perceptron_update_comment_field( $comment_field ) {
	$comment_field =
		'<p class="comment-form-comment">
			<textarea required id="comment" name="comment" placeholder="' . esc_attr__( 'Enter comment here...', 'perceptron' ) . '" cols="45" rows="8" aria-required="true"></textarea>
		</p>';
	return $comment_field;
}
add_filter( 'comment_form_field_comment', 'perceptron_update_comment_field' );
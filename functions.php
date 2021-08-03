<?php
/**
 *
 * Return theme image
 *
 * @param $image
 * @return string
 */
function xdevtheme_image($image) {
	echo get_template_directory_uri()."/assets/images/{$image}";
}

/**
 * Enqueue scripts and styles.
 *
 * @since sunny 1.0.0
 *
 * @return void
 */
function xdevtheme_scripts() {
	wp_enqueue_style( 'swiper-style', '//unpkg.com/swiper/swiper-bundle.min.css', null, '1.8.1' );
	wp_enqueue_style( 'animate-style', '//cdn.rawgit.com/daneden/animate.css/v3.1.0/animate.min.css', null, '3.1.0' );
	wp_enqueue_style( 'sunny-style', get_template_directory_uri() . '/assets/css/styles.css', array(), wp_get_theme()->get( 'Version' ) );

	wp_enqueue_script( 'swiper-js', '//unpkg.com/swiper/swiper-bundle.min.js', array(), '1.8.1', true );
	wp_enqueue_script( 'wow', '//cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js', array(), '1.1.2', true );
	wp_enqueue_script( 'sunny-common-script', get_template_directory_uri() . '/assets/js/common.js', array( 'jquery' ), wp_get_theme()->get( 'Version' ),  true);
}
add_action( 'wp_enqueue_scripts', 'xdevtheme_scripts' );

/**
 * Register Promary menu
 */
function xdevtheme_register_nav_menu(){
	register_nav_menus( [
		'primary_menu' => __( 'Primary Menu', 'xdev-theme' ),
	]);
}
add_action( 'after_setup_theme', 'xdevtheme_register_nav_menu', 0 );
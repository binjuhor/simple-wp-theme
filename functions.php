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
 * @since xDev-theme 1.0.0
 *
 * @return void
 */
function xdevtheme_scripts() {
	wp_enqueue_style( 'swiper-style', '//unpkg.com/swiper/swiper-bundle.min.css', null, '1.8.1' );
	wp_enqueue_style( 'animate-style', '//cdn.rawgit.com/daneden/animate.css/v3.1.0/animate.min.css', null, '3.1.0' );
	wp_enqueue_style( 'xDev-theme-style', get_template_directory_uri() . '/assets/css/styles.css', array(), wp_get_theme()->get( 'Version' ) );

	wp_enqueue_script( 'swiper-js', '//unpkg.com/swiper/swiper-bundle.min.js', array(), '1.8.1', true );
	wp_enqueue_script( 'wow', '//cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js', array(), '1.1.2', true );
	wp_enqueue_script( 'xDev-theme-common-script', get_template_directory_uri() . '/assets/js/common.js', array( 'jquery' ), wp_get_theme()->get( 'Version' ),  true);
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


/**
 * @param string $template_name
 * @param array $data
 * @param bool $echo
 * @return false|string
 */
function template_part($template_name = '', $data = [], $echo =  true ){
    $full_template_name = get_template_directory() . "/templates/{$template_name}.php";
    if (file_exists($full_template_name)) {
        if (!empty($data)) extract($data);
        ob_start();
        include $full_template_name;
        if ($echo) {
            echo ob_get_clean();
        } else {
            return ob_get_clean();
        }

    }
    return '';
}

/**
 * Show image from path with params is image name
 *
 * @param $file
 * @param bool $show
 * @return mixed
 */
function assets($file, $show = true) {
	$file_url = get_template_directory_uri()."/assets/{$file}";
    if (!$show) {
        return $file_url;
    }

    echo $file_url;
}

/**
 * Show active class for menu
 *
 * @param $page
 * @param $current_page
 */
function active($page)
{
    global $post;
    $parent = get_post($post->post_parent);

    if(is_page($page) || ($page === $parent->post_name)) {
        echo 'active';
    }
}

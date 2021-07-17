<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Waou
 * @since waou 1.0.0
 */

get_header();

/* Start the Loop */
while ( have_posts() ) :
	the_post();

	get_template_part( 'template-parts/content/content-single' );

	if ( is_attachment() ) {
		// Parent post navigation.
		the_post_navigation(
			array(
				/* translators: %s: parent post link. */
				'prev_text' => sprintf( __( '<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'waou' ), '%title' ),
			)
		);
	}

	// If comments are open or there is at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}

	// Previous/next post navigation.
	$waou_next = is_rtl() ? waou_get_icon_svg_( 'ui', 'arrow_left' ) : waou_get_icon_svg_( 'ui', 'arrow_right' );
	$waou_prev = is_rtl() ? waou_get_icon_svg_( 'ui', 'arrow_right' ) : waou_get_icon_svg_( 'ui', 'arrow_left' );

	$waou_next_label     = esc_html__( 'Next post', 'waou' );
	$waou_previous_label = esc_html__( 'Previous post', 'waou' );

	the_post_navigation(
		array(
			'next_text' => '<p class="meta-nav">' . $waou_next_label . $waou_next . '</p><p class="post-title">%title</p>',
			'prev_text' => '<p class="meta-nav">' . $waou_prev . $waou_previous_label . '</p><p class="post-title">%title</p>',
		)
	);
endwhile; // End of the loop.

get_footer();

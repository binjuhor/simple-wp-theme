<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage xDev-theme
 * @since xDev-theme 1.0.0
 */

get_header(); ?>

<main class="main-content">
	<div class="container">
		<?php while ( have_posts() ) : the_post(); ?>
		<div class="main-content__inner">
			<article>
				<h1><?php the_title(); ?></h1>
				<?php if (has_post_thumbnail()) { ?>
				<figure>
					<?php the_post_thumbnail(); ?>
				</figure>
				<?php } ?>
				<div class="post-content">
					<?php the_content(); ?>
				</div>
			</article>
		</div>

		<?php get_template_part( 'template-parts/navigation' );
		endwhile; // End of the loop. ?>
	</div>
</main>

<?php
get_footer();
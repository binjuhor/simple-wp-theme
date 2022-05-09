<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage xDev-theme
 * @since xDev-theme 1.0.0
 */

get_header();

$description = get_the_archive_description();
?>

<main class="main-content">
	<div class="section-heading">
		<div class="container-fluid">
			<h1><?php the_archive_title( '', '' ); ?></h1>
			<?php echo wp_kses_post( wpautop( $description ) ); ?>
		</div>
	</div>

	<?php if ( have_posts() ) : ?>
	<div class="main-content__inner">
		<div class="post__list">
			<?php while ( have_posts() ) : ?><?php the_post(); ?>
			<?php get_template_part( 'template-parts/content/content' ); ?>
			<?php endwhile; ?>
		</div>
	</div>

	<?php get_template_part( 'template-parts/pagination' ); ?>

	<?php else : ?>
	<div class="main-content__inner">
		<?php get_template_part( 'template-parts/content/content-none' ); ?>
	</div>
	<?php endif; ?>

</main>

<?php get_footer(); ?>


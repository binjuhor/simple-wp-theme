<?php
/**
 * Displays the next and previous post navigation in single posts.
 *
 * @package WordPress
 * @subpackage xDevlabs
 * @since 1.0.0
 */

$next_post = get_next_post();
$prev_post = get_previous_post();

if ( $next_post || $prev_post ) {

	$pagination_classes = '';

	if ( ! $next_post ) {
		$pagination_classes = ' only-one only-prev';
	} elseif ( ! $prev_post ) {
		$pagination_classes = ' only-one only-next';
	}

	?>

<nav class="pagination-single section-inner<?php echo esc_attr( $pagination_classes ); ?>"
	aria-label="<?php esc_attr_e( 'Post', 'xdl' ); ?>" role="navigation">

	<div class="pagination-single__inner">

		<div class="pagination-single__prev">
			<?php if ( $prev_post ) { ?>
			<a class="previous-post" href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>">
				<svg xmlns="http://www.w3.org/2000/svg" width="17.524" height="30.141" viewBox="0 0 17.524 30.141">
					<g id="Group_85" data-name="Group 85" transform="translate(-289.253 -1915.046)">
						<line id="Line_13" data-name="Line 13" x1="12.617" y2="12.617"
							transform="translate(291.707 1917.5)" fill="none" stroke="#006b31" stroke-linecap="square"
							stroke-width="3.47" />
						<line id="Line_14" data-name="Line 14" x1="12.617" y1="12.617"
							transform="translate(291.707 1930.117)" fill="none" stroke="#006b31" stroke-linecap="square"
							stroke-width="3.47" />
					</g>
				</svg>
				<?php echo $prev_post->post_title; ?>
			</a>
			<?php } ?>
		</div>

		<div class="pagination-single__next">
			<?php if ( $next_post ) { ?>
			<a class="next-post" href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>">
				<?php echo $next_post->post_title; ?>
				<svg xmlns="http://www.w3.org/2000/svg" width="17.524" height="30.141" viewBox="0 0 17.524 30.141">
					<g id="Group_88" data-name="Group 88" transform="translate(2.454 2.454)">
						<line id="Line_13" data-name="Line 13" x2="12.617" y2="12.617" transform="translate(0)"
							fill="none" stroke="#006b31" stroke-linecap="square" stroke-width="3.47" />
						<line id="Line_14" data-name="Line 14" y1="12.617" x2="12.617" transform="translate(0 12.617)"
							fill="none" stroke="#006b31" stroke-linecap="square" stroke-width="3.47" />
					</g>
				</svg>
			</a>
			<?php } ?>
		</div>

	</div><!-- .pagination-single-inner -->

</nav><!-- .pagination-single -->

<?php
}
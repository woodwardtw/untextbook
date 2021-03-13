<?php
/**
 * Partial template for content in home.php
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">

		<?php the_content(); ?>
		<!--CHAPTER LIST-->
		<h2>Choose a Chapter</h2>
		<?php echo untextbook_chapters();?>
		<!--CONTRIBUTE OPTIONS-->
		<h2>Contribute</h2>
		<div class="row">
			<div class="col-md-4"><h3>Rant</h3></div>
			<div class="col-md-4"><h3>Remix</h3></div>
			<div class="col-md-4"><h3>Recast</h3></div>
			<div class="col-md-4"><h3>Reflect</h3></div>
			<div class="col-md-4"><h3>e?</h3></div>
			<div class="col-md-4"><h3>f?</h3></div>
		</div>

		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->

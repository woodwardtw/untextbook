<?php
/**
 * Single chapter partial template
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="module-header">

		<?php the_title( '<h1 class="module-title">', '</h1>' ); ?>
		

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="module-content">
		<?php echo untextbook_authors();?>
		<?php echo untextbook_abstract();?>
		<?php echo untextbook_learning_outcomes();?>
		<?php echo untextbook_intro_media();?>
		<?php echo untextbook_glossary();?>
		<?php echo untextbook_main_content();?>
		<?php echo untextbook_recommended_readings();?>
		<?php echo untextbook_resources_repeater();?>
		<?php echo untextbook_get_lessons($post->ID, get_the_permalink());?>
		<?php //the_content(); ?>
		

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

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->

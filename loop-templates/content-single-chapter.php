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

		<?php the_title( '<div class="mod-icon"></div><h1 class="module-title">', '</h1>' ); ?>
		

	</header><!-- .entry-header -->

	<img src="<?php echo get_the_post_thumbnail_url( $post->ID, 'large' ); ?>" class="chapter-img" alt="Chapter image for <?php the_title();?>.">

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
		<div class="row voices-row">
			<div class="accordion" id="voices-accordion">
				 <?php
				 $types = [];
				 $perspective_1 = get_field('perspective_1','option');
				 $perspective_2 = get_field('perspective_2','option');
				 $perspective_3 = get_field('perspective_3','option');
				 $perspective_4 = get_field('perspective_4','option');

				 if ($perspective_1 != ''){
				 	array_push($types, $perspective_1);
				 }
				 if ($perspective_2 != ''){
				 	array_push($types, $perspective_2);
				 }
				 if ($perspective_3 != ''){
				 	array_push($types, $perspective_3);
				 }
				 if ($perspective_4 != ''){
				 	array_push($types, $perspective_4);
				 }			 
				 foreach ($types as $index => $value) {
				 	echo untextbook_show_voices($value, $index);//show voice content
				 }				
				 ?>	
			</div>
			<div class='col-md-12 form-block hide' id='voice-form'>
				<?php voices_descriptions();//show voices descriptions?>
				<?php echo voices_form_creation();//voice creation form?>
			</div>
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
		<div class="voice-buttons row">
			<?php echo voice_buttons();//Buttons to trigger voice form ?>
		</div>

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->

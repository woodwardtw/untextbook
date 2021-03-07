<?php
/**
 * The right sidebar containing the main widget area
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! is_active_sidebar( 'right-sidebar' ) ) {
	return;
}

// when both sidebars turned on reduce col size to 3 from 4.
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );
?>

<?php if ( 'both' === $sidebar_pos ) : ?>
	<div class="col-md-3 widget-area" id="right-sidebar" role="complementary">
<?php else : ?>
	

<?php endif; ?>
<div class="col-md-4 widget-area" id="right-sidebar" role="complementary">
		<?php 
		//show associated lessons for the main module page
		global $post;
		$static_id = $post->ID;
		$type = get_post_type($static_id);
		
		if ($type === 'module'){
			echo data_praxis_get_lessons($static_id, get_the_permalink());
		} 
		if ($type === 'lesson'){
			// The Query
			$args = array( 'post_type' => 'module' );
			$module_query = new WP_Query( $args );
			 
			// get all the modules for the lesson's page
			if ( $module_query->have_posts() ) {
			    while ( $module_query->have_posts() ) {
			        $module_query->the_post();
			        $lessons = get_field('associated_lessons', $post->ID);
			        if (in_array($static_id, $lessons)){
			        	echo data_praxis_get_lessons($post->ID, get_the_permalink($static_id));
			        }
			    }
			} else {
			    // no posts found
			}
			/* Restore original Post Data */
			wp_reset_postdata();
		}

		?>
<?php dynamic_sidebar( 'right-sidebar' ); ?>

</div><!-- #right-sidebar -->

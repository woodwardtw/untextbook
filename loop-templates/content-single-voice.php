<?php
/**
 * Single voice partial template
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">

			<?php understrap_posted_on(); ?>

		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">
		<?php 
			if (isset($_GET['uid'])) {
				$url_unique_id = $_GET['uid'];
				$unique_id = get_field('editing_id');
				if($url_unique_id == $unique_id){
					echo "<div class='edit-directions'>
						<p>The URL for this page will enable you to come back and make edits. Copy it and save it somewhere safe. Do NOT share it!</p>
						<p>You can edit any of the fields below and update them by making your changes and clicking the <strong>Submit Update</strong> button.
						<p>When you're done editing, leave the page or click the <strong>Done Editing</strong> button.
						
					</div>";
				}
			}
		?>
        <?php 
		$current_url = get_permalink();
        if (isset($_GET['uid'])) {
            $url_unique_id = $_GET['uid'];
            $unique_id = get_field('editing_id');
            if($url_unique_id == $unique_id){
            	$args = array(
                    'id' => 'edit-voice',
                    'fields' => array('type','your_name'),
                    'post_id'       => $post->ID,
                    'post_title'   => true,
                    'post_content'	=> true,
                    'new_post'      => array(
                        'post_type'     => 'voice',
                        // 'tags_input' => array($type),
                    ),
                    'submit_value'  => 'Submit update',
					'html_after_fields' => "<a href='{$current_url}'>Stop Editting</a>",

            );
            return acf_form($args); 
            }
        
        }
        ?>
		<?php the_content(); ?>
		<?php echo untextbook_author();?>

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

<?php
/**
 * Custom post type setup
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


//module custom post type

// Register Custom Post Type module
// Post Type Key: module

function create_chapter_cpt() {

  $labels = array(
    'name' => __( 'Chapters', 'Post Type General Name', 'textdomain' ),
    'singular_name' => __( 'Chapter', 'Post Type Singular Name', 'textdomain' ),
    'menu_name' => __( 'Chapter', 'textdomain' ),
    'name_admin_bar' => __( 'Chapter', 'textdomain' ),
    'archives' => __( 'Chapter Archives', 'textdomain' ),
    'attributes' => __( 'Chapter Attributes', 'textdomain' ),
    'parent_item_colon' => __( 'Chapter:', 'textdomain' ),
    'all_items' => __( 'All Chapters', 'textdomain' ),
    'add_new_item' => __( 'Add New Chapter', 'textdomain' ),
    'add_new' => __( 'Add New', 'textdomain' ),
    'new_item' => __( 'New Chapter', 'textdomain' ),
    'edit_item' => __( 'Edit Chapter', 'textdomain' ),
    'update_item' => __( 'Update Chapter', 'textdomain' ),
    'view_item' => __( 'View Chapter', 'textdomain' ),
    'view_items' => __( 'View Chapter', 'textdomain' ),
    'search_items' => __( 'Search Chapters', 'textdomain' ),
    'not_found' => __( 'Not found', 'textdomain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
    'featured_image' => __( 'Featured Image', 'textdomain' ),
    'set_featured_image' => __( 'Set featured image', 'textdomain' ),
    'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
    'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
    'insert_into_item' => __( 'Insert into chapter', 'textdomain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this chapter', 'textdomain' ),
    'items_list' => __( 'Chapter list', 'textdomain' ),
    'items_list_navigation' => __( 'Chapter list navigation', 'textdomain' ),
    'filter_items_list' => __( 'Filter Chapter list', 'textdomain' ),
  );
  $args = array(
    'label' => __( 'Chapter', 'textdomain' ),
    'description' => __( '', 'textdomain' ),
    'labels' => $labels,
    'menu_icon' => '',
    'supports' => array('title', 'editor', 'revisions', 'author', 'trackbacks', 'custom-fields', 'thumbnail','excerpt'),
    'taxonomies' => array('category', 'post_tag'),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'hierarchical' => false,
    'exclude_from_search' => false,
    'show_in_rest' => true,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-book-alt',
  );
  register_post_type( 'Chapter', $args );
  
  // flush rewrite rules because we changed the permalink structure
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
add_action( 'init', 'create_chapter_cpt', 0 );



//lesson custom post type

// Register Custom Post Type lesson
// Post Type Key: lesson

function create_lesson_cpt() {

  $labels = array(
    'name' => __( 'Lessons', 'Post Type General Name', 'textdomain' ),
    'singular_name' => __( 'Lesson', 'Post Type Singular Name', 'textdomain' ),
    'menu_name' => __( 'Lesson', 'textdomain' ),
    'name_admin_bar' => __( 'Lesson', 'textdomain' ),
    'archives' => __( 'Lesson Archives', 'textdomain' ),
    'attributes' => __( 'Lesson Attributes', 'textdomain' ),
    'parent_item_colon' => __( 'Lesson:', 'textdomain' ),
    'all_items' => __( 'All Lessons', 'textdomain' ),
    'add_new_item' => __( 'Add New Lesson', 'textdomain' ),
    'add_new' => __( 'Add New', 'textdomain' ),
    'new_item' => __( 'New Lesson', 'textdomain' ),
    'edit_item' => __( 'Edit Lesson', 'textdomain' ),
    'update_item' => __( 'Update Lesson', 'textdomain' ),
    'view_item' => __( 'View Lesson', 'textdomain' ),
    'view_items' => __( 'View Lessons', 'textdomain' ),
    'search_items' => __( 'Search Lessons', 'textdomain' ),
    'not_found' => __( 'Not found', 'textdomain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
    'featured_image' => __( 'Featured Image', 'textdomain' ),
    'set_featured_image' => __( 'Set featured image', 'textdomain' ),
    'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
    'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
    'insert_into_item' => __( 'Insert into lesson', 'textdomain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this lesson', 'textdomain' ),
    'items_list' => __( 'Lesson list', 'textdomain' ),
    'items_list_navigation' => __( 'Lesson list navigation', 'textdomain' ),
    'filter_items_list' => __( 'Filter Lesson list', 'textdomain' ),
  );
  $args = array(
    'label' => __( 'lesson', 'textdomain' ),
    'description' => __( '', 'textdomain' ),
    'labels' => $labels,
    'menu_icon' => '',
    'supports' => array('title', 'editor', 'revisions', 'author', 'trackbacks', 'custom-fields', 'thumbnail','excerpt'),
    'taxonomies' => array('category', 'post_tag'),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'hierarchical' => false,
    'exclude_from_search' => false,
    'show_in_rest' => true,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-welcome-learn-more',
  );
  register_post_type( 'lesson', $args );
  
  // flush rewrite rules because we changed the permalink structure
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
add_action( 'init', 'create_lesson_cpt', 0 );


//voice custom post type

// Register Custom Post Type voice
// Post Type Key: voice

function create_voice_cpt() {

  $labels = array(
    'name' => __( 'Voices', 'Post Type General Name', 'textdomain' ),
    'singular_name' => __( 'Voice', 'Post Type Singular Name', 'textdomain' ),
    'menu_name' => __( 'Voice', 'textdomain' ),
    'name_admin_bar' => __( 'Voice', 'textdomain' ),
    'archives' => __( 'Voice Archives', 'textdomain' ),
    'attributes' => __( 'Voice Attributes', 'textdomain' ),
    'parent_item_colon' => __( 'Voice:', 'textdomain' ),
    'all_items' => __( 'All Voices', 'textdomain' ),
    'add_new_item' => __( 'Add New Voice', 'textdomain' ),
    'add_new' => __( 'Add New', 'textdomain' ),
    'new_item' => __( 'New Voice', 'textdomain' ),
    'edit_item' => __( 'Edit Voice', 'textdomain' ),
    'update_item' => __( 'Update Voice', 'textdomain' ),
    'view_item' => __( 'View Voice', 'textdomain' ),
    'view_items' => __( 'View Voices', 'textdomain' ),
    'search_items' => __( 'Search Voices', 'textdomain' ),
    'not_found' => __( 'Not found', 'textdomain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
    'featured_image' => __( 'Featured Image', 'textdomain' ),
    'set_featured_image' => __( 'Set featured image', 'textdomain' ),
    'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
    'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
    'insert_into_item' => __( 'Insert into voice', 'textdomain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this voice', 'textdomain' ),
    'items_list' => __( 'Voice list', 'textdomain' ),
    'items_list_navigation' => __( 'Voice list navigation', 'textdomain' ),
    'filter_items_list' => __( 'Filter Voice list', 'textdomain' ),
  );
  $args = array(
    'label' => __( 'voice', 'textdomain' ),
    'description' => __( '', 'textdomain' ),
    'labels' => $labels,
    'menu_icon' => '',
    'supports' => array('title', 'editor', 'revisions', 'author', 'trackbacks', 'custom-fields', 'thumbnail', 'excerpt', 'comments'),
    'taxonomies' => array('category', 'post_tag'),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'hierarchical' => false,
    'exclude_from_search' => false,
    'show_in_rest' => true,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-megaphone',
  );
  register_post_type( 'voice', $args );
  
  // flush rewrite rules because we changed the permalink structure
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
add_action( 'init', 'create_voice_cpt', 0 );

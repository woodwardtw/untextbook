<?php
/**
 * ACF Related
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

//***************HOME***********************//
function untextbook_chapters(){
	$html = '';
	if( have_rows('chapters') ):

	    // Loop through rows.
	    while( have_rows('chapters') ) : the_row();

	        // Load sub field value.
	        $chapter = get_sub_field('chapter');
	        // Do something...
	        $title = $chapter->post_title;
	        $id = $chapter->ID;
	        $url = get_permalink($id);
	        $summary = get_field('summary', $id);
	        if(get_the_post_thumbnail($id)){
	        	$thumb = get_the_post_thumbnail($id);
	        } else {
	        	$thumb = "";
	        }
	        $html .= "<div class='col-md-4'><a href='{$url}'><div class='chapter-list'><h2>{$title}</h2>{$thumb}</a><div class='chapter-summary'>{$summary}</div></div></div>";
	    // End loop.
	    endwhile;
	    return "<div class='row chapter-menu'>{$html}</div>";
		// No value.
		else :
		    // Do something...
		endif;
}



//***************MODULES********************//

//MODULE AUTHORS
function untextbook_authors(){
	if(get_field('authors')){
		$authors = get_field('authors');
		$html = "<div class='authors-block'><h2> Authored by ";		
		$html .= $authors;
		 return $html . "</h2></div>";
	}
	
}


//ABSTRACT
function untextbook_abstract(){
  $html = '';
  $abstract = get_field('abstract');

    if( $abstract) {      
      //$html .= "<h2>Abstract and description of the units</h2>";
      $html .= "<div class='abstract'>{$abstract}</div>";  
     return $html;    
    }

}


//LEARNING OUTCOMES
function untextbook_learning_outcomes(){
	$html = "<div class='learning-outcomes-block'><h2>Learning Outcomes</h2><ol class='learning-outcomes-list'>";
	if( have_rows('learning_outcomes_block') ):

	    // Loop through rows.
	    while( have_rows('learning_outcomes_block') ) : the_row();

	        // Load sub field value.
	        $learning_outcome = get_sub_field('learning_outcome');
	        // Do something...
	        $html .= "<li>{$learning_outcome}</li>";
	    // End loop.
	    endwhile;
	    return $html . "</ol></div>";
		// No value.
		else :
		    // Do something...
		endif;
	}

// intro media

function untextbook_intro_media(){
	$html = '';
  	$media = get_field('intro_media');
    if( $media) {      
      //$html .= "<h2>Abstract and description of the units</h2>";
      $html .= "<div class='intro-media'>{$media}</div>";  
     return $html;    
    }
}

//main content 

function untextbook_main_content(){
	$html = '';
  	$content = get_field('main_content');
    if( $content) {      
      $html .= "<div class='main-content' id='main'>{$content}</div>";  
     return $html;    
    }
}

//glossary 
function untextbook_glossary(){
	$img_base = get_template_directory_uri();
	//$img = "/imgs/wc/a-z.png";
	$html = '<div class="accordion" id="glossary"><div class="glossary"><h2 id="vocabHeader"><a href="" class="btn-plus collapsed" type="button" data-toggle="collapse" data-target="#words">Glossary</a></h2><ul id="words" class="collapse " aria-labelledby="vocabHeader" data-parent="#glossary">';
	if( have_rows('glossary') ):

	    // Loop through rows.
	    while( have_rows('glossary') ) : the_row();

	        // Load sub field value.
	        $term = get_sub_field('term');
	        $definition = get_sub_field('definition');
	        $link = get_sub_field('link');
	        // Do something...
	        $html .= "<li><a href='{$link}'>{$term}</a> {$definition}</li>";
	    // End loop.
	    endwhile;
	    return $html . "</ul></div></div>";
		// No value.
		else :
		    // Do something...
		endif;
	}





//recommended readings
	function untextbook_recommended_readings(){
		$img_base = get_template_directory_uri();
		//$img = "/imgs/wc/book.png";
		$html = '<div class="readings"><h2>Recommended Readings</h2><ol>';
		if( have_rows('recommended_readings') ):
	
		    // Loop through rows.
		    while( have_rows('recommended_readings') ) : the_row();
	
		        // Load sub field value.
		        $citation = get_sub_field('citation');
		        $link = get_sub_field('link');
		        // Do something...
		          $html .= "<li>{$citation} <a href='{$link}'>{$link}</a></li>";
		    // End loop.
		    endwhile;
		    return $html . "</ol></div>";
			// No value.
			else :
			    // Do something...
			endif;
		}
	
//resources 

	function untextbook_resources_repeater(){
		$img_base = get_template_directory_uri();
		//$img = "/imgs/wc/kee-2.png";
		$html = '<div class="resources"><h2>Key Complementary Resources</h2><ol>';
		if( have_rows('resources') ):
		
		    // Loop through rows.
		    while( have_rows('resources') ) : the_row();
	
		        // Load sub field value.
		        $title = get_sub_field('title');
		        $link = get_sub_field('link');
		        // Do something...
		        $html .= "<li>{$title} <a href='{$link}'>{$link}</a></li>";

		    // End loop.
		    endwhile;
		    return $html . "</ol></div>";
			// No value.
			else :
			    // Do something...
			endif;
		}
	
//get lessons 
		function untextbook_get_lessons($id, $current_location){
			global $post;
			$lessons = get_field('associated_lessons', $id);
			if( $lessons ){
					$html = '<div class="lessons"><h2>Lessons</h2><ul>';
				  foreach( $lessons as $key=>$lesson ): 
				  	$number = $key+1;
				  	$link = get_the_permalink($lesson);
				  	$title = get_the_title($lesson);
				  	if ($link === $current_location){
				  		$location = 'here';
				  	} else {
				  		$location = 'not-here';
				  	}
			        // Setup this post for WP functions (variable must be named $post).
			        $html .= "<li class='{$location}'> <a href='{$link}'>{$title}</a></li>";
			    endforeach;
			    return $html . '</ul></div>';
			} 
			    // Reset the global post object so that the rest of the page works correctly.
			    wp_reset_postdata(); 
		}





//****************************LESSONS*****************************//
function untextbook_quote(){
	$link = '';
	$attribution = '';
	//($user['is_logged_in'] ? $user['first_name'] : 'Guest').'!';
	if(get_field('introductory_quote')){
		$quote = get_field('introductory_quote');

		if(get_field('quote_attribution')){
			$attribution = get_field('quote_attribution');
		}
		if(get_field('quote_attribution_link') && get_field('quote_attribution')){
			$attribution = '<a href="' . get_field('quote_attribution_link') . '">' . $attribution . '</a>';
		}

		return "<blockquote>\"{$quote}\"<div class='attribution'>{$attribution}</div></blockquote>";
	}
}

function untextbook_lesson_intro(){
	if(get_field('introduction')){
		$intro = get_field('introduction');
		return "<div class='intro'>{$intro}</div>";
	}

}

function untextbook_lesson_sections_repeater(){
	$html = '';
	if( have_rows('sections') ):

	    // Loop through rows.
	    while( have_rows('sections') ) : the_row();

	        // Load sub field value.
	        $section_title = get_sub_field('section_title');	       
	        $section_content =  get_sub_field('section_content');
	        $section_activity = get_sub_field('activity');
	        if($section_title){
	        	 $section_id = sanitize_title($section_title);
	        	$html .= "<div class='section-title' id={$section_id}><h2>{$section_title}</h2></div>";
	        }
	         if($section_content){	        
	        	$html .= "<div class='section-content'>{$section_content}</div>";
	        }
	         if($section_activity){	        
	        	$html .= "<div class='section-activity'><h2>Activity</h2>{$section_activity}</div>";
	        }
	        // Do something...
	    // End loop.
	    endwhile;
	    return $html;
		// No value.
		else :
		    // Do something...
		endif;
	}

//PEOPLE PAGE

function untextbook_researchers(){
	$html = '';
	if( have_rows('researchers') ):

	    // Loop through rows.
	    while( have_rows('researchers') ) : the_row();

	        // Load sub field value.
	        $name = get_sub_field('name');
	        $bio = get_sub_field('biography');
	        $img = get_sub_field('image');
	        $img_url = $img['sizes']['medium'];

	        $html .= "<div class='col-md-6 person'><img class='img-fluid bio-pic' src='{$img_url}'><h2>{$name}</h2>{$bio}</div>";
	        // Do something...
	    // End loop.
	    endwhile;
	    return $html;
		// No value.
		else :
		    // Do something...
		endif;
}


//SPECIAL INDEX

function activate_special_index(){
$html = '';
	if( have_rows('index_item') ):

	    // Loop through rows.
	    while( have_rows('index_item') ) : the_row();

	        // Load sub field value.
	        $obj = get_sub_field('item');
	        $indent = get_sub_field('indent_level');
	        //var_dump($obj);
	        $title = $obj->post_title;
	        $link = $obj->guid;
	        // Do something...
	        $html .= "<div class='indent-{$indent}'><a href='{$link}'>{$title}</a></div>";
	    // End loop.
	    endwhile;
	    return $html;
		// No value.
		else :
		    // Do something...
		endif;
}


//FRONT END FORMS 
function book_get_front_form_status(){
	$status = get_field('live_content', 'option');
	return $status;
}

function book_get_login_status(){
	$status = get_field('logged_in', 'option');
	return $status;
}

function voices_form_creation(){//$type removed
	$status = book_get_front_form_status();
	//var_dump($status);
	//$lower = strtolower($type);
	$args = array(
			'id' => 'new-voice',
			'fields' => array('type'),
	        'post_id'       => 'new_post',
	        'post_title'   => true,
			'post_content'	=> true,
	        'new_post'      => array(
	            'post_type'     => 'voice',
	            // 'tags_input' => array($type),
	        ),
	        'submit_value'  => 'Add a new voice.',
	);
	if($status === 'live'){
		$args['new_post']['post_status'] = 'publish';
	} else {
		$args['new_post']['post_status'] = 'draft';
	}
	return acf_form($args);
}

//FRONT END FORM RELATIONSHIP BUILDER

function untextbook_acf_form_submission_additions($post_id){
	$new_post_id = $post_id;
	$chapter_id = get_the_id();
	if(get_post_type($new_post_id) === 'voice'){
		if(get_field('associated_voices', $chapter_id)){
			$voices = get_field('associated_voices', $chapter_id);
		} else {
			$voices = array();
		}
		array_push($voices, $new_post_id);
		update_field('associated_voices', $voices, $chapter_id);
	}	
}

add_action('acf/save_post', 'untextbook_acf_form_submission_additions', 20, 1912);

function untextbook_show_voices($tag){
	$header = "<div class='col-md-12'><h2>{$tag}</h2>";
	$html = '';
	$chapter_id = get_the_id();
	$lower = strtolower($tag);
	$chapter_id = get_the_id();
	if(get_field('associated_voices', $chapter_id)){
			$voices = get_field('associated_voices', $chapter_id);
			foreach($voices as $key => $voice) {
				$tags = get_the_tags($voice);
				$tag_names = untextbook_tag_names($tags);
				//var_dump(in_array($tag, $tag_names));
				if ( in_array($tag, $tag_names)){
					$title = get_the_title($voice);
					$link = get_the_permalink($voice);
					$excerpt = wp_strip_all_tags( get_the_excerpt($voice), true );
					$html .= "<h3 class='voice-title'><a href='{$link}'>{$title}</a></h3><p>{$excerpt}</p>";
				}
			}
		} 
	if(!get_field('associated_voices', $chapter_id) || $html == '') {
		    $lower = strtolower($tag);
			$html = "<div>We want your voice. Consider submitting a {$tag}.</div>";
		}
	return $header . $html . '</div>';
}

function untextbook_tag_names($array){
	$names = array();
	foreach ($array as $key => $tag) {
		# code...
		array_push($names, $tag->name);
	}
	return $names;
}

//OPTIONS PAGE
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Untextbook Settings',
		'menu_title'	=> 'Untextbook Settings',
		'menu_slug' 	=> 'untextbook-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}




//****************************FUNCTIONAL*****************************//

//save acf json
		add_filter('acf/settings/save_json', 'untextbook_json_save_point');
		 
		function untextbook_json_save_point( $path ) {
		    
		    // update path
		    $path = get_stylesheet_directory(__FILE__) . '/acf-json'; //replace w get_stylesheet_directory() for theme
		    
		    
		    // return
		    return $path;
		    
		}


		// load acf json
		add_filter('acf/settings/load_json', 'untextbook_json_load_point');

		function untextbook_json_load_point( $paths ) {
		    
		    // remove original path (optional)
		    unset($paths[0]);
		    
		    
		    // append path
		    $paths[] = get_stylesheet_directory(__FILE__)  . '/acf-json';//replace w get_stylesheet_directory() for theme
		    
		    
		    // return
		    return $paths;
		    
		}
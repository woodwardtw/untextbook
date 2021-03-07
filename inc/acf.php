<?php
/**
 * ACF Related
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

//***************MODULES********************//

//MODULE AUTHORS
function data_praxis_authors(){
	if(get_field('authors')){
		$authors = get_field('authors');
		$html = "<div class='authors-block'> Authored by ";		
		$html .= $authors;
		 return $html . "</div>";
	}
	
}


//ABSTRACT
function data_praxis_abstract(){
  $html = '';
  $abstract = get_field('abstract');

    if( $abstract) {      
      //$html .= "<h2>Abstract and description of the units</h2>";
      $html .= "<div class='abstract'>{$abstract}</div>";  
     return $html;    
    }

}


//LEARNING OUTCOMES
function data_praxis_learning_outcomes(){
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

function data_praxis_intro_media(){
	$html = '';
  	$media = get_field('intro_media');
    if( $media) {      
      //$html .= "<h2>Abstract and description of the units</h2>";
      $html .= "<div class='intro-media'>{$media}</div>";  
     return $html;    
    }
}

//glossary 
function data_praxis_glossary(){
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
	function data_praxis_recommended_readings(){
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

	function data_praxis_resources_repeater(){
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
		function data_praxis_get_lessons($id, $current_location){
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
function data_praxis_quote(){
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

function data_praxis_lesson_intro(){
	if(get_field('introduction')){
		$intro = get_field('introduction');
		return "<div class='intro'>{$intro}</div>";
	}

}

function data_praxis_lesson_sections_repeater(){
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

function data_praxis_researchers(){
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





//****************************FUNCTIONAL*****************************//

//save acf json
		add_filter('acf/settings/save_json', 'data_praxis_json_save_point');
		 
		function data_praxis_json_save_point( $path ) {
		    
		    // update path
		    $path = get_stylesheet_directory(__FILE__) . '/acf-json'; //replace w get_stylesheet_directory() for theme
		    
		    
		    // return
		    return $path;
		    
		}


		// load acf json
		add_filter('acf/settings/load_json', 'data_praxis_json_load_point');

		function data_praxis_json_load_point( $paths ) {
		    
		    // remove original path (optional)
		    unset($paths[0]);
		    
		    
		    // append path
		    $paths[] = get_stylesheet_directory(__FILE__)  . '/acf-json';//replace w get_stylesheet_directory() for theme
		    
		    
		    // return
		    return $paths;
		    
		}
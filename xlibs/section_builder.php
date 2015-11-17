<?php
/*
*
* MEBUI_HELPER CLASS V0.13
* Author: Ismael Rivera
* website: speggo.com
* email: speggodesign@gmail.com 
*
*--------------------------------------------------------------------------
*
* Very basic class I created for generic wordpress theme that controls  
* the output for the sections on a template making them extremely customizable. 
* The class basically is composed of 2 main functions: sec_begin(), sec_finish().
* Includes pre-tags and commentary that can be customized to retrofit the output.
* 
*/

class Section_Builder{
	
	public static $name;
	public static $section;
	public static $options;
	
	public static function sec_Begins($name=NULL, $section=NULL, $options = array( 'section_grid' => true, 
	'spacer_content' => NULL, 'section_grouping' => NULL, 'spacer_classes' => array(), 'content_wrapper_classes' => array())){
	
	//for content end sectiion	
	self::$name = $name;
	self::$options = $options;
		
	if (isset($options['section_grouping'])){	
	$in  ='<!--====BEGIN/SECTION '.strtoupper($options['section_grouping']).'/HERE====-->'."\n";
	} else {
	$in  ='<!--==================================================BEGIN/SECTION/HERE=============================================-->'."\n";	
	}
	$in .='<!--Cogratulations: You have just constructed a section for this homepage-->'."\n";
	$in .='<!--SECTION '.strtoupper($name).' HAS NOW BEEN CREATED-->'."\n";
	$in .= '<span id="stopper_'.$name.'" class="easing_stopper"></span>'."\n";
	if(isset($options['spacer_content'])){
	    $in .= '<div id="spacer_content_wrapper_'.$name.'" class="wrapper">'. $options['spacer_content'] .'</div>';
	} else {
	    $in .= '<div id="spacer_wrapper_'.$name.'" class="wrapper';
		if(isset($options['spacer_classes'])){
			if (is_array($options['spacer_classes'])){
				foreach ($options['spacer_classes'] as $spacer_class){
					$in .= ' '. $spacer_class;
					} 
				} else {
					$in .= ' '. $options['spacer_classes'];
					}
		}
	    $in .= '"></div>'."\n";
	}
	$in .= '<div id="content_wrapper_'.$name.'" class="wrapper';
	
	if(isset($section)){
		if (is_int($section)){
		  if($section <= 3){
			  if($section === 1){
				  $section_class = "header_section global_section";
			  }	else if($section === 2){
				  $section_class = "content_section";
			  } else if($section === 3){
				  $section_class = "footer_section global_section";
			  }
		   $in .= ' '. $section_class;  
		   } 
		} 
	}
	
	if(isset($options['content_wrapper_classes'])){
	if ($options['content_wrapper_classes'] !== NULL){
		if (is_array($options['content_wrapper_classes'])){
			foreach ($options['content_wrapper_classes'] as $content_wrapper_class){
				$in .= ' '. $content_wrapper_class;
				} 
			} else {
				$in .= ' '. $options['content_wrapper_class'];
				}
		}
	}
	
	$in .= '">'."\n";
	if ($options['section_grid'] == true){

	$in .= '<div id="section_'.$name.'" >'."\n\n";	
		} else {
	$in .= '<div id="section_'.$name.'" class="grid">'."\n\n";
		}
	$in .= '<!--######### Section Content BEGIN #########-->'."\n\n";
	
	echo $in;
	
	} 
	
	
	//End sec_begin() function
	
	
	public static function sec_Ends($options = NULL){
	$out  = "\n\n".'<!--######### Section Content END #########-->'."\n\n";
	$out .= '</div><!--section_'.self::$name.'-->'."\n";	
	$out .= '</div><!--content_wrapper_'.self::$name.'-->'."\n";
	$out .= '<div id="spacer_wrapper_bot_'.self::$name.'" class="wrapper';
	
	if ($options != NULL){
	  if (array_key_exists('spacer_wrapper_bot_classes', $options)){
		if (is_array($options['spacer_wrapper_bot_classes'])){
			foreach ($options['spacer_wrapper_bot_classes'] as $spacer_wrapper_bot_class){
				$out .= ' '. $spacer_wrapper_bot_class;
			} 
		} else {
		  	$out .= ' '. $options['spacer_wrapper_bot_classes'];
		}
	  }
	}
	$out .= '"></div>'."\n";
	if (isset(self::$options['section_grouping'])){	
	$out .='<!--I THINK SECTION '.strtoupper(self::$options['section_grouping']).' ( '.strtoupper(self::$name).' ) ENDS HERE-->'."\n";
	} else {
	$out .='<!--I THINK '.strtoupper(self::$name).' SECTION ENDS HERE-->'."\n";	
	}
	
	$out .='<!--=====================================================================================================-->'."\n";
	echo $out;
	}
	
		
}
<?php

//===================================================================================================================
// Shortcodes, get your shortcodes
//===================================================================================================================


// Begin Shortcodes
class UTKShortcodes {

  function __construct() {
    add_action( 'init', array( $this, 'add_shortcodes' ) );
    //add_action( 'wp_enqueue_scripts', array( $this, 'bootstrap_shortcodes_scripts' ), 9999 ); // Register this fxn and allow Wordpress to call it automatcally in the header
  }



  /*--------------------------------------------------------------------------------------
    *
    * add_shortcodes
    *
    * @author Filip Stefansson
    * @since 1.0
    *
    *-------------------------------------------------------------------------------------*/
  function add_shortcodes() {

    $shortcodes = array(
      'highlight', 
      'darkhighlight',
      'rightcolumn',
      'leftcolumn',
      'half',
      'onefourth',
      'onethird',
      'twothirds',
      'clear',
      'fold',
      'accordion',
      'callout',
      'mobile',
      'icon-download',
      'icon-map',
      'icon-arrow-right',
      'icon-arrow-left',
      'icon-file',
    );

    foreach ( $shortcodes as $shortcode ) {

      $function = 'ut_' . str_replace( '-', '_', $shortcode );
      add_shortcode( $shortcode, array( $this, $function ) );
      
    }
  }


// Make a highlight box
function ut_highlight( $atts, $content = null ) {
	extract(shortcode_atts(array(
		"color" => '',
		"outline" => '',
		"text" => ''
	), $atts));
   $content = wpautop(trim($content));
   return '<div class="box-light '.$color.' tx'.$text.' brd-'.$outline.'">' . do_shortcode($content) . '</div>';
}



// Make a dark highlight box
function ut_darkhighlight( $atts, $content = null ) {
 	 remove_filter( 'the_content', 'wpautop' );
   add_filter( 'the_content', 'wpautop' , 12);
   $content = wpautop(trim($content));
  return '<div class="box">' . do_shortcode($content) . '</div>';
}

//	Right Column
function ut_rightcolumn($atts, $content = null) {
	 remove_filter( 'the_content', 'wpautop' );
   add_filter( 'the_content', 'wpautop' , 12);
   $content = wpautop(trim($content));
   return '<div class="rightcolumn">' . do_shortcode($content) . '</div>';
}

//	Left Column
function ut_leftcolumn($atts, $content = null) {
	 remove_filter( 'the_content', 'wpautop' );
   add_filter( 'the_content', 'wpautop' , 12);
   $content = wpautop(trim($content));
   return '<div class="leftcolumn">' . do_shortcode($content) . '</div>';
}

//	Half Column
function ut_half($atts, $content = null) {
  	extract(shortcode_atts(array(
  		"align" => ''
  	), $atts));
	 remove_filter( 'the_content', 'wpautop' );
   add_filter( 'the_content', 'wpautop' , 12);
   $content = wpautop(trim($content));
   return '<div class="half '.$align.'">' . do_shortcode($content) . '</div>';
}

//	One Fourth Column
function ut_onefourth($atts, $content = null) {
  	extract(shortcode_atts(array(
  		"align" => ''
  	), $atts));
	 remove_filter( 'the_content', 'wpautop' );
   add_filter( 'the_content', 'wpautop' , 12);
   $content = wpautop(trim($content));
   return '<div class="one-fourth column '.$align.'">' . do_shortcode($content) . '</div>';
}


//	One Third Column
function ut_onethird($atts, $content = null) {
	extract(shortcode_atts(array(
		"align" => ''
	), $atts));
	 remove_filter( 'the_content', 'wpautop' );
   add_filter( 'the_content', 'wpautop' , 12);
   $content = wpautop(trim($content));
   return '<div class="one-third column '.$align.'">' . do_shortcode($content) . '</div>';
}

//	Two Third Column
function ut_twothirds($atts, $content = null) {
	extract(shortcode_atts(array(
		"align" => ''
	), $atts));
	 remove_filter( 'the_content', 'wpautop' );
   add_filter( 'the_content', 'wpautop' , 12);
   $content = wpautop(trim($content));
   return '<div class="two-thirds column '.$align.'">' . do_shortcode($content) . '</div>';
}


//Clear
function ut_clear( $atts ){
 return '<br class="clearshortcode">';
}

//Accordion Actions
// Folds
// remove_filter( 'the_content', 'wpautop' );
// add_filter( 'the_content', 'wpautop' , 12);

function ut_fold($atts, $content = null) {
	extract(shortcode_atts(array(
		"title" => '#',
		"group" => '#'
	), $atts));
   remove_filter( 'the_content', 'wpautop' );
   
	return '<div class="accordion-group">
                  <div class="accordion-heading"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse'.$group.'">'. $title .'</a></div><div id="collapse'. $group .'" class="accordion-body collapse"><div class="accordion-inner">'. do_shortcode($content) . '</div></div></div>';
				}
// Wrap
function ut_accordion($atts, $content = null) {
   $content = wpautop(trim($content));
   remove_filter( 'the_content', 'wpautop' );
	return '<div class="accordion" id="accordion2">'. do_shortcode($content) .'</div>';
}

//Callout
function ut_callout($atts, $content = null) {
	extract(shortcode_atts(array(
		"align" => '#'
	), $atts));
   $content = wpautop(trim($content));
	return '<div class="callout '.$align.'">'. do_shortcode($content) .'</div>';
}

// Mobile NivoSlider Links

function ut_mobile($atts) {
	
	return '<p class="mobile-nivo"><a class="button" href="'.site_url().'/nivoslider/'.the_slug().'/">View Slideshow</a></p>';
				}

//==[ icon shortcodes ===============
// Make a download icon
function ut_icon_download( $atts, $content = null ) {
   return '<i class="fa fa-download-alt">' . do_shortcode($content) . '</i> ';
}

// Make a map icon
function ut_icon_map( $atts, $content = null ) {
   return '<i class="fa fa-map-marker">' . do_shortcode($content) . '</i> ';
}

// Make a chevron right icon
function ut_icon_arrow_right( $atts, $content = null ) {
   return '<i class="fa fa-chevron-right">' . do_shortcode($content) . '</i> ';
}

// Make a chevron left icon
function ut_icon_arrow_left( $atts, $content = null ) {
   return '<i class="fa fa-chevron-left">' . do_shortcode($content) . '</i> ';
}

// Make a file icon
function ut_icon_file( $atts, $content = null ) {
   return '<i class="fa fa-file">' . do_shortcode($content) . '</i> ';
}



 
 
     
 /*--------------------------------------------------------------------------------------
    *
    * If the user puts a return between the shortcode and its contents, sometimes we want to strip the resulting P tags out
    *
    *-------------------------------------------------------------------------------------*/
  function strip_paragraph( $content ) {
      $content = str_ireplace( '<p>','',$content );
      $content = str_ireplace( '</p>','',$content );
      $content = str_ireplace( '<br />','',$content );

      return $content;
  }

}

new UTKShortcodes();





?>
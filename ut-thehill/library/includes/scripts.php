<?php


/**
 * Enqueue scripts and styles for the front end.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */


function utthehill_scripts_styles() {

    if( !is_admin()){
	    wp_deregister_script('jquery');
	    wp_register_script('jquery', ("//code.jquery.com/jquery-1.11.2.min.js"), array(), null, false);
	    wp_enqueue_script('jquery');
    }
	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );





	// Loads UTK JavaScript with added object data fromthe WP table
	// FOR TESTING
	// wp_register_script( 'utthehill-utk', get_template_directory_uri() . '/library/js/build/utk-build.js', array( 'jquery' ), '2015-05-13', true );
	// FOR PROD
	wp_register_script( 'utthehill-utk', get_template_directory_uri() . '/library/js/min/utk-min.js', array( 'jquery' ), '2015-09-02', true );


	// Setup some vars to pass to js
	$tempDirectory = get_template_directory_uri();
	global $blog_id;
	$siteId = $blog_id;
	$settings = get_option( 'ut_options');
	if (!isset($settings['nivo_anim_speed']) || $settings['nivo_anim_speed'] == '' ) { 
		$nivoAnimSpeed = '500';
	} else {
		$nivoAnimSpeed = $settings['nivo_anim_speed'];
	}
	if (!isset($settings['nivo_pause_time']) || $settings['nivo_pause_time'] == '' ) { 
		$nivoPauseTime = '3000';
	} else {
		$nivoPauseTime = $settings['nivo_pause_time'];
	}
	$contentArray = generateJson();
	$translation_array = array( 'templateDirectory' => $tempDirectory, 'siteId' => $siteId, 'contentArray' => $contentArray, 'nivo_anim_speed' => $nivoAnimSpeed, 'nivo_pause_time' => $nivoPauseTime);
	wp_localize_script( 'utthehill-utk', 'url_object', $translation_array );

	// run it Lola
	wp_enqueue_script( 'utthehill-utk' );


	
	// Loads our main stylesheet.
	wp_enqueue_style( 'utthehill-style', get_stylesheet_uri(), array(), '2015-09-02' );

	// Loads the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'utthehill-ie', get_template_directory_uri() . '/library/css/ie.css', array( 'utthehill-style' ), '2015-05-20' );
	wp_style_add_data( 'utthehill-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'utthehill_scripts_styles' );

?>
<?php
/* child styles*/
function child_theme_name_enqueue_styles() {
  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
  wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'parent-style' ) );
}
add_action( 'wp_enqueue_scripts', 'child_theme_name_enqueue_styles' );

/*custom sb scripts */
add_action( 'wp_enqueue_scripts', 'sb_scripts' );
function sb_scripts(){
	wp_enqueue_script( 'socialbetajax', get_stylesheet_directory_uri() . '/js/socialbet.js', array('jquery'), '0003');
}

/* js cookies script */
add_action( 'wp_enqueue_scripts', 'sb_cookies' );
function sb_cookies(){
	wp_enqueue_script( 'socialbetcookies', get_stylesheet_directory_uri() . '/js/cookies.js', array('jquery'));
}

/* theme domain */
load_theme_textdomain( 'bets_lang', TEMPLATEPATH.'/languages' );

?>

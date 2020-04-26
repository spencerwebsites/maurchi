<?php

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function maurchi_theme_support() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Custom background color.
	add_theme_support(
		'custom-background',
		array(
			'default-color' => 'ffffff',
		)
	);

	add_theme_support( 'disable-custom-colors' );

	add_theme_support( 'editor-color-palette', array(
		array(
			'name'  => __( 'Purple', 'maurchi' ),
			'slug'  => 'maurchi-purple',
			'color'	=> '#5C2D91',
		),
		array(
			'name'  => __( 'Red', 'maurchi' ),
			'slug'  => 'maurchi-red',
			'color'	=> '#ED1C24',
		),
		array(
			'name'  => __( 'Orange', 'maurchi' ),
			'slug'  => 'maurchi-orange',
			'color'	=> '#F7941D',
		),
		array(
			'name'  => __( 'Yellow', 'maurchi' ),
			'slug'  => 'maurchi-yellow',
			'color'	=> '#FFDE17',
		),
		array(
			'name'  => __( 'Green', 'maurchi' ),
			'slug'  => 'maurchi-green',
			'color'	=> '#00A651',
		),
		array(
			'name'  => __( 'Blue', 'maurchi' ),
			'slug'  => 'maurchi-blue',
			'color'	=> '#1B75BC',
		),
		array(
			'name'  => __( 'Lavender', 'maurchi' ),
			'slug'  => 'maurchi-lavender',
			'color'	=> '#B35FA5',
		),
		array(
			'name'  => __( 'White', 'maurchi' ),
			'slug'  => 'white',
			'color'	=> '#FFFFFF',
		),
		array(
			'name'  => __( 'Black', 'maurchi' ),
			'slug'  => 'black',
			'color'	=> '#000000',
		),
	) );

	// Set content-width.
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 580;
	}

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );

	// Set post thumbnail size.
	set_post_thumbnail_size( 1200, 9999 );

	// Add custom image size used in Cover Template.
	add_image_size( 'maurchi-fullscreen', 1980, 9999 );

	// Custom logo.
	$logo_width  = 120;
	$logo_height = 90;

	// If the retina setting is active, double the recommended width and height.
	if ( get_theme_mod( 'retina_logo', false ) ) {
		$logo_width  = floor( $logo_width * 2 );
		$logo_height = floor( $logo_height * 2 );
	}

	add_theme_support(
		'custom-logo',
		array(
			'height'      => $logo_height,
			'width'       => $logo_width,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		)
	);

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Twenty Twenty, use a find and replace
	 * to change 'maurchi' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'maurchi' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

}

add_action( 'after_setup_theme', 'maurchi_theme_support' );

/**
 * Register and Enqueue Styles.
 */
function maurchi_register_styles() {

	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'maurchi-style', get_stylesheet_uri(), array(), $theme_version );
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Kaushan+Script|Raleway&display=swap', array(), $theme_version );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/fonts/fontawesome/css/all.min.css', array(), $theme_version );
	//wp_style_add_data( 'maurchi-style', 'rtl', 'replace' );

	wp_enqueue_style( 'maurchi-ie', get_stylesheet_directory_uri() . "/ie.css", array( 'maurchi-style' ) );
	wp_style_add_data( 'maurchi-ie', 'conditional', 'IE' );

	$js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/scripts.js' );
	wp_enqueue_script( 'citadel-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), $js_version, true );

}

add_action( 'wp_enqueue_scripts', 'maurchi_register_styles' );

/**
 * Add Menus.
 */

register_nav_menus( array(
	'mainmenu' 		=> 'Main Menu',
	'secondarymenu' => 'Secondary Menu',
	'footermenu' 	=> 'Footer Menu',
	'home_cta'		=> 'Home CTA Button',
) );
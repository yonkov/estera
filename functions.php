<?php

/**
 * Estera functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Estera
 */

if ( ! defined( 'ESTERA_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'ESTERA_VERSION', '1.1.8' );
}

if ( ! function_exists( 'estera_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function estera_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Estera, use a find and replace
		 * to change 'estera' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'estera', get_template_directory() . '/languages' );
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'estera' ),
			)
		);
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
				'style',
				'script',
			)
		);
		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'estera_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 100,
				'width'       => 100,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
		/*
		 * Add support for wide alignment.
		 *
		 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/
		 */
		add_theme_support( 'align-wide' );
	}
}
add_action( 'after_setup_theme', 'estera_setup' );
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function estera_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'estera_content_width', 960 );
}

add_action( 'after_setup_theme', 'estera_content_width', 0 );
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function estera_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Main Sidebar', 'estera' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in your sidebar. Different sidebars for specific pages - go pro version.', 'estera' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Footer 1', 'estera' ),
			'id'            => 'sidebar-2-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'estera' ),
			'before_widget' => '<section id="%1$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 2', 'estera' ),
			'id'            => 'sidebar-3-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'estera' ),
			'before_widget' => '<section id="%1$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}

add_action( 'widgets_init', 'estera_widgets_init' );
/**
 * Enqueue scripts and styles.
 */
function estera_styles_and_scripts() {
	/* Swiper slider*/
	estera_enqueue_slider_scripts_and_styles();
	/* Theme css file */
	wp_enqueue_style(
		'estera-global',
		get_template_directory_uri() . '/assets/css/main.css',
		array(),
		ESTERA_VERSION
	);
	/* RTL css */
	wp_style_add_data( 'estera-global', 'rtl', 'replace' );
	// Theme js
	wp_enqueue_script(
		'estera-navigation',
		get_template_directory_uri() . '/assets/js/navigation.js',
		array(),
		ESTERA_VERSION,
		true
	);
	wp_enqueue_script(
		'estera-dark-mode',
		get_template_directory_uri() . '/assets/js/toggleDarkMode.js',
		array(),
		ESTERA_VERSION,
		true
	);
	wp_enqueue_script(
		'estera-skip-link-focus-fix',
		get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js',
		array(),
		ESTERA_VERSION,
		true
	);
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'estera_styles_and_scripts' );
/**
 * Enqueue fonts to the footer for better peformance
 */
function estera_fonts() {
	// Add custom fonts from the theme customizer
	wp_enqueue_style(
		'estera-custom-fonts',
		estera_fonts_url(),
		array(),
		null
	);
	// Add Elegant Icons font
	wp_enqueue_style( 'elegant-icons', get_template_directory_uri() . '/assets/css/elegantIcons.css' );
}

add_action( 'wp_footer', 'estera_fonts' );
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';
/*
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
/*
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
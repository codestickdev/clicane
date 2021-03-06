<?php
/**
 * Clicane functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Clicane
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function clicane_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Clicane, use a find and replace
		* to change 'clicane' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'clicane', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'clicane' ),
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
			'clicane_custom_background_args',
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
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'clicane_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function clicane_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'clicane_content_width', 640 );
}
add_action( 'after_setup_theme', 'clicane_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function clicane_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'clicane' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'clicane' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'clicane_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function clicane_scripts() {
	wp_enqueue_style( 'clicane-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'clicane-style', 'rtl', 'replace' );

	// Main style
	wp_enqueue_style( 'clicane-custom-style', get_template_directory_uri() . '/css/style.css', array(), _S_VERSION );

	// jQuery
	wp_register_script( 'jQuery', get_template_directory_uri() . '/plugins/jQuery/jquery-2.2.4.min.js', null, null, true );
	wp_enqueue_script('jQuery');

	// Slick
	wp_enqueue_style( 'slick-style', get_template_directory_uri() . '/plugins/slick/slick.css', false);
	wp_register_script( 'slick-script', get_template_directory_uri() . '/plugins/slick/slick.min.js', null, null, true );
	wp_enqueue_script('slick-script');

	// Sliders
	wp_register_script( 'clicane-sliders', get_template_directory_uri() . '/js/_sliders.js', null, null, true );
	wp_enqueue_script('clicane-sliders');

	// Forms
	wp_register_script( 'clicane-forms', get_template_directory_uri() . '/js/_forms.js', null, null, true );
	wp_enqueue_script('clicane-forms');
	wp_localize_script( 'clicane-forms', 'clic', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

	// Main script
	wp_register_script( 'clicane-script', get_template_directory_uri() . '/js/custom.js', null, null, true );
	wp_enqueue_script('clicane-script');
	wp_localize_script( 'clicane-script', 'clic', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'clicane_scripts' );

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
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


add_action('wp_ajax_contactForm', 'contactForm');
add_action('wp_ajax_nopriv_contactForm', 'contactForm');
function contactForm(){
	$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
	$mail = isset($_POST['mail']) ? $_POST['mail'] : '';
	$message = isset($_POST['message']) ? $_POST['message'] : '';

	$to = 'info@clicane.com';
	$subject = '[clicane.pl] Formularz kontaktowy';
	$content = "Telefon: " . $phone . "\r\nMail: " . $mail . "\r\nWiadomo????: " . $message;

	$headers = array('"Content-Type", "multipart/form-data"; charset=UTF-8');
	
	$sent = false;
	$sent = wp_mail( $to, $subject, $content, $headers);

	$response = $sent;

	echo $response;
	
	die();
}

/**
 * Translations
 */
add_action('init', function() {
	pll_register_string('clicane', 'Cze????!');
	pll_register_string('clicane', 'zobacz film');
	pll_register_string('clicane', 'Nie musisz ju?? wi??cej klika??,<br/> zrobimy to za Ciebie.');
	pll_register_string('clicane', 'Prezentacje multimedialne');
	pll_register_string('clicane', 'Dokumenty multimedialne');
	pll_register_string('clicane', 'W naszej pracy korzystamy z wielu narz??dzi:');
	pll_register_string('clicane', 'Nasze prezentacje s?? wy??wietlane na wielkich <br/>konferencjach, targach i spotkaniach wewn??trznych.');
	pll_register_string('clicane', 'Klienci');
	pll_register_string('clicane', 'Wsp????pracujemy z klientami z wielu bran??.<br/>Oto niekt??rzy z nich:');
	pll_register_string('clicane', 'Oboje mamy g??owy pe??ne <br/>pomys????w i ch??tnie Ci pomo??emy!');
	pll_register_string('clicane', 'Kontakt');
	pll_register_string('clicane', 'Skontaktuj si?? z nami. Stw??rzmy co?? niesamowitego!');
	pll_register_string('clicane', 'Wy??lij nam wiadomo????:');
	pll_register_string('clicane', 'Telefon');
	pll_register_string('clicane', 'Wiadomo????');
	pll_register_string('clicane', 'wy??lij');
	pll_register_string('clicane', 'odwied?? nas');
	pll_register_string('clicane', 'Konstruktorska 12a <br/>02-673 Warszawa <br/>Polska');
});
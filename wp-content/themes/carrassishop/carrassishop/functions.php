<?php
/**
 * CarrassiShop functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package CarrassiShop
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'carrassishop_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function carrassishop_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on CarrassiShop, use a find and replace
		 * to change 'carrassishop' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'carrassishop', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'carrassishop' ),
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
				'carrassishop_custom_background_args',
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
endif;
add_action( 'after_setup_theme', 'carrassishop_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function carrassishop_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'carrassishop_content_width', 640 );
}
add_action( 'after_setup_theme', 'carrassishop_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function carrassishop_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'carrassishop' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'carrassishop' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'carrassishop_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function carrassishop_scripts() {
	wp_enqueue_style( 'carrassishop-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'carrassishop-style', 'rtl', 'replace' );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'carrassishop_scripts' );

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

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}










add_action( 'admin_enqueue_scripts', 'enqueue_admin_scripts' );
function enqueue_admin_scripts() {
    wp_enqueue_style( 'carrassi_admin-style', get_template_directory_uri() . '/admin-style.css' );

}


/**
 * Enqueue scripts and styles.
 */
function enqueue_general_scripts() {

    wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css' );
    wp_enqueue_script( 'bootstrap-js' , get_template_directory_uri() . '/bootstrap/js/bootstrap.bundle.min.js', array('jquery') );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css2?family=Hind+Vadodara:wght@300;600&family=Martel:wght@200;700&family=Mulish:wght@200;400&display=swap', false );

    wp_enqueue_Script('carrassi-js', get_template_directory_uri() . '/js/carrassi.js', array('jquery'));
    wp_localize_script('carrassi-js', 'carrassi_config', array('ajax_url' => admin_url( 'admin-ajax.php' )));


}
add_action( 'wp_enqueue_scripts', 'enqueue_general_scripts' );



add_action('wp_ajax_contact_form', 'contact_form_mail');
add_action('wp_ajax_nopriv_contact_form', 'contact_form_mail');
function contact_form_mail() {
    try {

        $headers = array('From: '.$_POST['full_name'].' <'.$_POST['email_address'].'>');


        if(wp_mail(
            'aazoutewelle@gmail.com',
            'Carrassi - message from: ' . $_REQUEST['form']['name'],
            $_REQUEST['form']['message'], $headers)) {

            wp_send_json_success(
                array(
                    'message' => 'Thank you for contacting Carrassi! We\'ll get back to you ASAP.'
                )
            );
        }
        else {
            throw new Exception("Failed sending mail");
        }
    }
    catch(Exception $e) {
        wp_send_json_error(
            array(
                'message' => 'Something went wrong. Please try again.'
            )
        );
    }
}






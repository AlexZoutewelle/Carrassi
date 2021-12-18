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

    $test = 1;
    wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css' );
    wp_enqueue_script( 'bootstrap-js' , get_template_directory_uri() . '/bootstrap/js/bootstrap.bundle.min.js', array('jquery') );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css2?family=Hind+Vadodara:wght@300;600&family=Martel:wght@200;700&family=Mulish:wght@200;400&display=swap', false );

    wp_enqueue_script('carrassi-js', get_template_directory_uri() . '/js/carrassi.js', array('jquery'));
    wp_localize_script('carrassi-js', 'carrassi_config', array('ajax_url' => admin_url( 'admin-ajax.php' )));

    wp_enqueue_style( 'load-fa', 'https://use.fontawesome.com/releases/v5.5.0/css/all.css' );


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

add_action('wp_ajax_carrassi_post_comment', 'carrassi_post_comment');
add_action('wp_ajax_nopriv_carrassi_post_comment', 'carrassi_post_comment');
function carrassi_post_comment() {
    $comment = wp_handle_comment_submission( $_REQUEST['form'] );
    if ( is_wp_error( $comment ) ) {
        $error_data = intval( $comment->get_error_data() );
        if ( ! empty( $error_data ) ) {
            wp_send_json_error(array('message' => $comment->get_error_message()));
        } else {
            wp_send_json_error(array('message' => __('Something went wrong. Want to try again?', 'carrassishop')));
        }
    }

    /*
     * Set Cookies
     */
    $user = wp_get_current_user();
    do_action('set_comment_cookies', $comment, $user);

    ob_start();

    carrassishop_comment_callback($comment, array(), $_REQUEST['even'] === 'true' ? 2 : 1);
//    wp_list_comments(
//        array(
//            'style'      => 'li',
//            'short_ping' => true,
//            'callback' => 'carrassishop_comment_callback'
//        ), get_comments(
//            array('post_id' => $_REQUEST['form']['comment_post_ID'] )
//        )
//    );


    $comments_html = ob_get_clean();


    wp_send_json_success(array('message' => '', 'comments_html' => $comments_html));
    die();
}


add_shortcode ('woo_cart_button', 'woo_cart_button' );
/**
 * Create Shortcode for WooCommerce Cart Menu Item
 */
function woo_cart_button() {
    ob_start();

    $cart_count = WC()->cart->cart_contents_count; // Set variable for cart item count
    $cart_url = wc_get_cart_url();  // Set Cart URL

    ?>
    <li class="nav-item dropdown mt-1 cart_nav_item">
        <a class="carrassi_cart dropdown-toggle" data-bs-toggle="dropdown" href="<?php echo $cart_url; ?>" title="<?php _e('Your cart', 'carrassishop'); ?>">
            <i class="fas fa-shopping-cart"></i>
            <?php
            if ( $cart_count > 0 ) {
                ?>
                <span class="cart-contents-count"><?php echo $cart_count; ?></span>
                <?php
            }
                ?>
        </a>
        <ul class="cart dropdown-menu">
            <?php echo do_shortcode('[woocommerce_cart]');
            if(WC()->cart->get_cart_contents_count() > 0 ) : ?>
                <li>
                    <div class="dropdown-item toCheckout" >
                        <a href="<?php echo wc_get_checkout_url(); ?>">
                            <i class="fas fa-long-arrow-alt-right"></i> Go to checkout
                        </a>
                    </div>
                </li>
            <?php endif;
//            $cart_items  = WC()->cart->cart_contents;
//            foreach($cart_items as $cart_id => $cart_item): ?>
<!--                --><?php //$product = wc_get_product($cart_item['product_id']); ?>
<!--                <li id="--><?php //echo "product_" . $cart_item['product_id'] . "_" . $cart_item['variation_id']; ?><!--">-->
<!--                    <div class="dropdown-item" >-->
<!--                        <div class="cart_remove_button" data-source="header" data-product_id="--><?php //echo $cart_item['product_id']; ?><!--" data-variation_id="--><?php //echo $cart_item['variation_id']; ?><!--">-->
<!--                            <i class="fas fa-times"></i>-->
<!--                            <div class="spinner-border-->
<!--                            text-light spinner" role="status" style="display:none;"> </div>-->
<!--                        </div>-->
<!--                        <div class="cart_product_icon">-->
<!--                            <img width="50" height="50" src="--><?php //echo get_field('plugin_icon', $product->get_id())['url']; ?><!--"/>-->
<!--                        </div>-->
<!--                        <div class="cart_product_name">-->
<!--                            <a href="--><?php //echo $product->get_permalink(); ?><!--">-->
<!--                                --><?php //echo $product->get_title(); ?>
<!--                                --><?php //foreach($cart_item['variation'] as $variation):
//                                    echo " - " . __($variation, 'carrassishop');
//                                endforeach; ?>
<!--                            </a>-->
<!--                        </div>-->
<!--                        <div class="product_price">-->
<!--                            --><?php //echo " -  " . wc_price($cart_item['line_total']);  ?>
<!--                        </div>-->
<!--                    </div>-->
<!--                </li>-->
<!--            --><?php //endforeach; ?>
<!--                <li>-->
<!--                    <div class="dropdown-item toCheckout" >-->
<!--                        <a href="--><?php //echo wc_get_checkout_url(); ?><!--">-->
<!--                            <i class="fas fa-long-arrow-alt-right"></i> Go to checkout-->
<!--                        </a>-->
<!--                    </div>-->
<!--                </li>-->
        </ul>
    </li>

    <?php

    return ob_get_clean();

}

add_action('wp_ajax_add_to_cart', 'add_to_cart');
add_action('wp_ajax_nopriv_add_to_cart', 'add_to_cart');
function add_to_cart() {
    $cart = WC()->cart;
    $product_id = (int)$_REQUEST['form']['id'];
    $product_var_id = (int)$_REQUEST['form']['pricePlan'];
    $product_cart_id = $cart->generate_cart_id($product_var_id, $product_var_id);

    if(!$cart->find_product_in_cart($product_cart_id)) {
        $cart->add_to_cart($product_id, 1, $product_var_id);

    }

    ob_start();
    echo do_shortcode('[woo_cart_button]');
    $cart_html = ob_get_clean();

    wp_send_json_success(array('message' => 'success', 'cart_html' => $cart_html));
}

add_action('wp_ajax_remove_from_cart', 'remove_from_cart');
add_action('wp_ajax_nopriv_remove_from_cart', 'remove_from_cart');
function remove_from_cart() {
    $cart = WC()->cart;

    foreach ( $cart->get_cart() as $item_key => $item ) {
        if ( $item['variation_id'] == (int)$_REQUEST['variation_id'] ) {
            $cart->remove_cart_item( $item_key );
            break;
        }
    }

    ob_start();
    echo do_shortcode('[woocommerce_cart]');
    $cart_html = ob_get_clean();

    wp_send_json_success(
        array(
            'cart_count' => $cart->get_cart_contents_count(),
            'product_id' => $_REQUEST['product_id'],
            'variation_id' => $_REQUEST['variation_id'],
            'cart_html' => $cart_html
        )
    );
}

add_filter( 'woocommerce_checkout_coupon_message', 'coupon_message');
function coupon_message() {
    return '<i class="fas fa-ticket-alt"></i> Have a coupon? <a href="#" class="showcoupon">Click here to enter your discount code</a>';
}

add_action('woocommerce_after_checkout_form','checkout_cart');
function checkout_cart(){
    echo do_shortcode('[woocommerce_cart]');
}

add_filter( 'woocommerce_checkout_fields' , 'alter_woocommerce_checkout_fields' );
function alter_woocommerce_checkout_fields( $fields ) {
    unset($fields['shipping']);
    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_state']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_phone']);

    return $fields;
}

add_filter( 'woocommerce_enable_order_notes_field', '__return_false', 9999 );

function checkout_page_cart() {
    ob_start();

    $cart_count = WC()->cart->cart_contents_count; // Set variable for cart item count
    $cart_url = wc_get_cart_url();  // Set Cart URL

    ?>
    <li class="nav-item dropdown mt-1 cart_nav_item">
        <a class="carrassi_cart dropdown-toggle" data-bs-toggle="dropdown" href="<?php echo $cart_url; ?>" title="<?php _e('Your cart', 'carrassishop'); ?>">
            <i class="fas fa-shopping-cart"></i>
            <?php
            if ( $cart_count > 0 ) {
                ?>
                <span class="cart-contents-count"><?php echo $cart_count; ?></span>
                <?php
            }
            ?>
        </a>
        <ul class="cart dropdown-menu">
            <?php
            $cart_items  = WC()->cart->cart_contents;
            foreach($cart_items as $cart_id => $cart_item): ?>
                <?php $product = wc_get_product($cart_item['product_id']); ?>
                <li>
                    <div class="dropdown-item" >
                        <div class="cart_remove_button" data-source="checkout" data-product_id="<?php echo $cart_item['product_id']; ?>" data-variation_id="<?php echo $cart_item['variation_id']; ?>">
                            <i class="fas fa-times"></i>
                            <div class="spinner-border
                            text-light spinner" role="status" style="display:none;"> </div>
                        </div>
                        <div class="cart_product_icon">
                            <img width="50" height="50" src="<?php echo get_field('plugin_icon', $product->get_id())['url']; ?>"/>
                        </div>
                        <div class="cart_product_name">
                            <a href="<?php echo $product->get_permalink(); ?>">
                                <?php echo $product->get_title(); ?>
                                <?php foreach($cart_item['variation'] as $variation):
                                    echo " - " . __($variation, 'carrassishop');
                                endforeach; ?>
                            </a>
                        </div>
                        <div class="product_price">
                            <?php echo " -  " . wc_price($cart_item['line_total']);  ?>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
            <li>
                <div class="dropdown-item toCheckout" >
                    <a href="<?php echo wc_get_checkout_url(); ?>">
                        <i class="fas fa-long-arrow-alt-right"></i> Go to checkout
                    </a>
                </div>
            </li>
        </ul>
    </li>

    <?php

    return ob_get_clean();
}



/** Enqueue blog post scripts **/
add_action("wp_enqueue_scripts", "enqueue_blog_post_scripts");
function enqueue_blog_post_scripts() {

    if(get_post_type() == "post") {
        $post = get_post();
        $js = get_field("blog_js_enq", get_post()->ID);
        $css = get_field("blog_css_enq", get_post()->ID);

        if(!empty($js)) {
            wp_enqueue_script( $js, get_template_directory_uri() . '/blog_post_assets/js/' . $js . ".js" );
        }
        if(!empty($css)) {
            wp_enqueue_style( $css , get_template_directory_uri() . '/blog_post_assets/css/' . $css . ".css" );

        }
    }
    $test =1;
}
<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CarrassiShop
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="site">

    <header class="page_header">
        <div class="container pt-2 pb-2">
            <div class="wrapper-fluid wrapper-navbar" id="wrapper-navbar" itemscope="" itemtype="http://schema.org/WebSite">
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <a class="navbar-brand" href="/">
                        <img src="http://carrassi/wp-content/uploads/2021/10/logo_white.svg" />
                    </a>
                    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#csi_navbar" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="csi_navbar">
                        <ul class="navbar-nav w-100">
                            <li class="nav-item mt-1">
                                <a class="nav-link active" aria-current="page" href="#plugins">Plugins</a>
                            </li>
                            <li class="nav-item mt-1">
                                <a class="nav-link" href="#journal">Journal</a>
                            </li>
                            <li class="nav-item mt-1">
                                <a class="nav-link" href="#about">About</a>
                            </li>
                            <li class="nav-item mt-1">
                                <a class="nav-link" href="#contact">Contact</a>
                            </li>
                            <?php echo do_shortcode('[woo_cart_button]'); ?>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>

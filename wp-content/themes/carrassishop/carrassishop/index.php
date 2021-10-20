<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CarrassiShop
 */

get_header();
?>

	<main id="primary" class="site-main">

        <section class="attract">
            <div class="container" style="position:relative;">
                <div class="row">
                    <div class="col-12 attract-l">
                        <div class="attract-text">
                            <h1>
                                Making your <br> WordPress website <span class="text_emphasis">sing</span>
                            </h1>
                        </div>
                    </div>
                    <img src="http://carrassi/wp-content/uploads/2021/10/polygirl_rescuedvec.svg">

                    <div class="attract-button">
                        <a href="#plugins" >
                            <button type="button" class="btn btn-lg btn-dark btn-yellow" >
                                View plugins
                            </button>
                        </a>

                    </div>

                </div>
            </div>
        </section>

        <section class="product_highlight" id="plugins">
            <div class="container">
                <div class="row text-center section_title py-5">
                    <h1>
                        Our latest plugins
                    </h1>
                </div>
                <div class="row">

                    <?php
                        $plugins = wc_get_products(
                            array(
                                'category' => array('plugin'),
                                'limit' => '3'
                            )
                        );

                        foreach($plugins as $plugin): ?>
                            <div class="col-sm-12 col-md-6 col-lg-4 plugin_wrap p-3">
                                <div class="plugin">
                                    <div class="container d-flex flex-column plugin_content">
                                        <div class="plugin_logo">
                                            <img src="<?php echo get_field('plugin_icon', $plugin->get_id())['url']; ?>"/>
                                        </div>

                                        <div class="plugin_title">
                                            <h5><strong><?php echo $plugin->get_title(); ?></strong></h5>
                                        </div>

                                        <div class="plugin_screenshot">
                                            <img src="<?php echo get_field('plugin_illustration', $plugin->get_id())['url']; ?>"/>
                                        </div>

                                        <div class="plugin_description">
                                            <?php echo $plugin->get_short_description(); ?>
                                        </div>

                                        <div class="plugin_button">
                                            <button type="button" class="btn btn-yellow" onclick="location.href='<?php echo $plugin->get_permalink(); ?>'" >
                                                View details
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-4 plugin_wrap p-3">
                                <div class="plugin">
                                    <div class="container d-flex flex-column plugin_content">
                                        <div class="plugin_logo">
                                            <img src="<?php echo get_field('plugin_icon', $plugin->get_id())['url']; ?>"/>
                                        </div>

                                        <div class="plugin_title">
                                            <h5><strong><?php echo $plugin->get_title(); ?></strong></h5>
                                        </div>

                                        <div class="plugin_screenshot">
                                            <img src="<?php echo get_field('plugin_illustration', $plugin->get_id())['url']; ?>"/>
                                        </div>

                                        <div class="plugin_description">
                                            <?php echo $plugin->get_short_description(); ?>
                                        </div>

                                        <div class="plugin_button">
                                            <button type="button" class="btn btn-yellow" onclick="location.href='<?php echo $plugin->get_permalink(); ?>'" >
                                                View details
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    <?php endforeach; ?>

                </div>
            </div>
        </section>

        <section class="about" id="about">
            <div class="container">
                <h1>
                    Our dedication
                </h1>

                <div class="about_text">
                    Carassi is an independent plugin developer for Wordpress and WooCommerce,
                    with a focus on helping the small become big. The most important thing? creating
                    value for your business. You develop your business, we develop your tools. Tools
                    that make your job quicker and easier.
                </div>

            </div>
        </section>

        <section class="journal_highlight" id="journal">
            <div class="container">
                <div class="row text-center section_title">
                    <h1>
                        Latest journal entries
                    </h1>
                </div>
                <div class="row">

                    <?php $journal_entries = get_posts(array('category' => 'journal')); ?>


                    <?php foreach($journal_entries as $entry): ?>

                    <?php $test = 1; ?>

                        <div class="col-sm-12 col-md-6 journal_wrap">
                                <div class="col-12 h-50 article_top" style="background: url(<?php echo get_the_post_thumbnail_url(); ?>); background-size: cover;">
                                    <div class="article_title">
                                        <span>
                                            <h4>
                                                <?php echo get_the_title(); ?>
                                            </h4>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12 h-50 article_bot">
                                    <div class="article_excerpt">
                                        <?php echo get_the_excerpt() ?>
                                    </div>
                                    <div class="article_readon">
                                        <a href="<?php echo get_the_permalink(); ?>">
                                            Read on
                                        </a>
                                    </div>
                                </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="contact_form" id="contact">
            <div class="container">
                <div class="col-12 mb-5">
                    <h1>
                        Contact
                    </h1>
                </div>

                <form>
                    <div>
                        <input class="form-control mb-3" name="name" placeholder="Your name" required/>
                    </div>

                    <div>
                        <input class="form-control mb-3" name="email" type="email" placeholder="Your email" required/>
                    </div>

                    <div>
                        <textarea class="form-control mb-3" name="message" rows="10" placeholder="What's up?"></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit"  class="btn btn-lg btn-yellow">

                            <div class="spinner-grow text-light spinner" role="status" style="display:none;">
                            </div>

                            <span class="button_text">
                                Submit
                            </span>
                        </button>
                    </div>

                </form>
            </div>
        </section>
	</main><!-- #main -->

<?php
get_footer();

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
    <aside>
        <button class="btn-toTop"><i class="fas fa-arrow-up"></i></button>
    </aside>

	<main id="primary" class="site-main">
        <div class="sp_msg">
            <div class="container">
                <div class="row py-2">
                    <span>
                        <?php _e("Only", "carrassi"); ?> <strong>1 </strong><?php _e("Freelance spot left for a Wordpress plugin.", "mailcat"); ?>
                         <a href="<?php echo get_home_url(); ?>/#contact">Contact us</a>

                    </span>
                </div>
            </div>
        </div>
        <section class="attract">
            <div class="container" style="position:relative;">
                <div class="row">
                    <div class="col-12 attract-l">
                        <div class="attract-text">
                            <h1>
                                Making your <br> <span class="text_alternating">WordPress website</span> <span class="text_emphasis">sing</span>
                            </h1>
                        </div>
                    </div>
                    <img src="http://carrassi/wp-content/uploads/2021/11/polygirl_shadow.svg">

                    <div class="attract-button">
                        <a href="#plugins" >
                            <button type="button" class="btn btn-lg btn-dark btn-yellow" >
                                View plugins
                            </button>
                        </a>

                        <?php get_posts() ?>

                    </div>

                </div>
            </div>
        </section>

        <section class="about product_highlight" id="plugins">
            <div class="container">
                <div class="row g-0 text-center section_title">
                    <h1>
                        Our latest plugins
                    </h1>
                </div>
                <div class="row g-0 justify-content-center">

                    <?php
                    $plugins = wc_get_products(
                        array(
                            'category' => array('plugin', 'android'),
                            'limit' => '3'
                        )
                    );

                    foreach($plugins as $plugin): ?>
                        <?php $coming_soon = !empty(wp_get_post_terms($plugin->get_id(), 'product_tag', array("slug" => "coming_soon")));?>

                        <?php

                            $color_primary = get_field('product_palette_main', $plugin->get_id());
                            $color_secondary = get_field('product_palette_sec', $plugin->get_id());
                            $color_accent = get_field('product_palette_accent', $plugin->get_id());

                            $test = 1;
                        ?>
                        <div class="col-sm-12 col-md-6 col-lg-4 plugin_wrap ">
                            <?php if($coming_soon): ?>
                                <div class="coming_soon_status">
                                    Coming soon!
                                </div>
                            <?php endif; ?>

                            <div class="plugin">
                                <div class="container d-flex flex-column plugin_content"
                                     style=" background: <?php echo $color_secondary; ?>;
                                             background: -moz-linear-gradient( 180deg, <?php echo $color_secondary; ?> 0%, <?php echo $color_secondary; ?> 65%, <?php echo $color_primary; ?> 100%);
                                             background: -webkit-linear-gradient( 180deg, <?php echo $color_secondary; ?> 0%, <?php echo $color_secondary; ?> 65%, <?php echo $color_primary; ?> 100%);
                                             background: linear-gradient( 0deg, <?php echo $color_primary; ?> 0%, <?php echo $color_secondary; ?> 65%, #1d191f 100%);">

                                    <div class="plugin_logo">
                                        <img src="<?php echo get_field('plugin_icon', $plugin->get_id())['url']; ?>"/>
                                    </div>

                                    <div class="plugin_title">
                                        <h2 ><strong><?php echo $plugin->get_title(); ?></strong></h2>
                                    </div>

                                    <div class="plugin_subtitle">
                                        <h6 class="mb-2"><strong><?php echo get_field('plugin_subtitle', $plugin->get_id()); ?></strong></h6>
                                    </div>

                                    <div class="plugin_description">
                                        <p class="plugin_short_description">  <?php echo $plugin->get_short_description(); ?> </p>
                                    </div>

                                    <div class="plugin_button">
                                        <button type="button" class="btn btn-yellow" onclick="location.href='<?php echo $plugin->get_permalink(); ?>'"
                                                style="	background-color: <?php echo $color_accent; ?> !important;">

                                            View details
                                        </button>
                                    </div>

                                    <div class="plugin_illustration" style="background:url(<?php echo get_field('plugin_illustration', $plugin->get_id())['url']; ?>)">
                                    </div>


                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                    <div class="col-sm-12 col-md-6 col-lg-4 plugin_wrap ">
                        <?php if($coming_soon): ?>
                            <div class="coming_soon_status">
                                Coming soon!
                            </div>
                        <?php endif; ?>

                        <div class="plugin">
                            <div class="container d-flex flex-column plugin_content"
                                 style=" background: <?php echo $color_secondary; ?>;">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section>


        <section class="about" id="twitterbanner" style="width: 1500px; height: 500px; padding: 0; border: 1px solid white;
    box-shadow: 10px -5px 44px 10px black; margin: 50px 0px 212px 0px;  ">
            <div style="position: relative;padding: 0; height: 100%;">
                <div style="display:flex; flex-direction:row">
                    <div style="flex:2; display:flex; flex-direction: column">
                        <div style="flex:1">
                            <img style="margin-top: 74px; height: 190px; filter: drop-shadow(2px 4px 6px black);" src="http://carrassi/wp-content/uploads/2021/10/logo_white.svg">
                        </div>
                        <div class="subtext">
                            Building web apps in public
                        </div>

                        <div class="twitterbanner_follow">
                            <img class="girl" src="http://carrassi/wp-content/uploads/2021/10/supporticon.svg"/>
                            <p>Let's build together! </p>
                            <img class="downarrow" src="http://carrassi/wp-content/uploads/2021/12/downarrow.svg"/>
                        </div>

                    </div>
                </div>

                <div class="pfp">
                    <div class="pfp_inner">
                        <img class="profile_pic_img" style="filter: grayscale(1) brightness(1.3) drop-shadow(-26px 13px 10px black); " src="http://carrassi/wp-content/uploads/2021/12/wOezUV1n_400x400-removebg-preview.png">
                    </div>
                </div>
            </div>
<!--            <div class="pfp" style="     width: 430px; height: 172px; background-color: #ff00005c; position: absolute; bottom: 0px; left: 0px;">-->

            </div>

        </section>




        <section class="about" id="about">
            <div class="container">
                <div class="row">
                    <h1>
                        Our dedication
                    </h1>

                    <div class="about_text col-12">
                        Carassi is an independent plugin developer for Wordpress and WooCommerce,
                        with a focus on helping the small become big. The most important thing? creating
                        value for your business. You develop your business, we develop your tools. Tools
                        that make your job quicker and easier.
                    </div>





                    <div class="col-sm-12 col-md-4 usp">
                        <div class="container pt-5">
                            <img src="http://carrassi/wp-content/uploads/2021/10/CheckBoard-1.svg"/>
                            <h4>Value policy</h4>
                            <p>Creating value is our number one priority. If our plugins fail to deliver what they promise, you get your money back.</p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 usp">
                        <div class="container pt-5">
                            <img src="http://carrassi/wp-content/uploads/2021/10/supporticon.svg"/>
                            <h4>Support</h4>
                            <p>We offer 24/7 personal support. Have a question or an issue with one of our plugins? We are always available to help you.</p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 usp">
                        <div class="container pt-5">
                            <img src="http://carrassi/wp-content/uploads/2021/10/gearsicon.svg"/>
                            <h4>Regular updates</h4>
                            <p>The web is constantly developing, so we make it our mission to adapt. Our plugins will always be up-to-date.</p>
                        </div>
                    </div>
                </div>




            </div>
        </section>

        <section class="about journal_highlight" id="journal">
            <div class="container">
                <div class="text-center section_title p-3">
                    <h1>
                        Latest journal entries
                    </h1>
                </div>
                <div class="row justify-content-center">

                    <?php $journal_entries = get_posts(array('category' => 'journal')); ?>


                    <?php foreach($journal_entries as $entry): ?>
                        <?php carrassishop_render_journal_highlight($entry);?>
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
                    <div class="contact_text">
                        Interested in developing a Wordpress plugin or Android app? Or do you have a different enquiry?
                    </div>

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

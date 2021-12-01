<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

$coming_soon = !empty(wp_get_post_terms($product->get_id(), 'product_tag', array("slug" => "coming_soon")));

$product_cat = get_the_terms($product->get_id(), 'product_cat')[0]->slug;


$color_primary = get_field('product_palette_main', $product->get_id());
$color_secondary = get_field('product_palette_sec', $product->get_id());
$color_accent = get_field('product_palette_accent', $product->get_id());


do_action( 'woocommerce_before_single_product' );
?>

<aside>
    <button class="btn-toTop"><i class="fas fa-arrow-up"></i></button>
</aside>

<script type='application/ld+json'>
    {
        "@context": "https://schema.org/",
		"@type": "Product",
		"name": "<?php echo $product->get_id(); ?>",
 		"image": [
        "<?php echo get_field('plugin_icon', $product->get_id())['url']; ?>",
        "<?php  echo get_field('plugin_illustration', $product->get_id())['url'];?>"
       ],
      "description": "<?php echo $product->get_short_description(); ?>",
      "sku": "<?php echo $product->get_id(); ?>",
      "mpn": "925872",
      "brand": {
        "@type": "Brand",
        "name": "Carrassi Software"
      },


		"offers": {
			"@type": "Offer",
			"url": "<?php echo get_permalink(); ?>",
			"priceCurrency": "USD",
			"price": "<?php echo $product->get_regular_price(); ?>.00",
        	"priceValidUntil": "<?php $futureDate = date('Y-m-d', strtotime('+1 year')); echo $futureDate;?>",
			"itemCondition": "https://schema.org/NewCondition",
			"availability": "https://schema.org/InStock",
			"seller": {
				"@type": "Organization",
				"name": "Carrassi Software"
			}
		}
    }



</script>
<!--"aggregateRating": {-->
<!--"@type": "AggregateRating",-->
<!--"ratingValue": "--><?php //echo $decimalResult; ?><!--",-->
<!--"reviewCount": "--><?php //echo $count; ?><!--"-->
<!--},-->
<!--"review": {-->
<!--"@type": "Review",-->
<!--"reviewRating": {-->
<!--"@type": "Rating",-->
<!--"ratingValue": "1",-->
<!--"bestRating": "5"-->
<!--},-->
<!--"author": {-->
<!--"@type": "Person",-->
<!--"name": "Fred Benson"-->
<!--}-->
<!--},-->

<main class="plugin_main">
    <article>
        <section id="product_summary">
            <div class="container">
                <div class="row prod_sum_row"
                style=" background: <?php echo $color_secondary; ?>;
                        background: -moz-linear-gradient( 180deg, <?php echo $color_secondary; ?> 0%, <?php echo $color_secondary; ?> 65%, <?php echo $color_primary; ?> 100%);
                        background: -webkit-linear-gradient( 180deg, <?php echo $color_secondary; ?> 0%, <?php echo $color_secondary; ?> 65%, <?php echo $color_primary; ?> 100%);
                        background: linear-gradient( 0deg, <?php echo $color_primary; ?> 0%, <?php echo $color_secondary; ?> 65%, #1d191f 100%);">
                    <div class="col-12 p-2 col-md-7 col-lg-8 p-5 prod_sum_desc">
                        <header>

                            <?php $coming_soon = !empty(wp_get_post_terms($product->get_id(), 'product_tag', array("slug" => "coming_soon")));?>
                            <?php if($coming_soon): ?>
                                <div class="coming_soon_status">
                                    Coming soon!
                                </div>
                            <?php endif; ?>

                            <img class="product_logo" src="<?php echo get_field('plugin_icon', $product->get_id())['url']; ?>"/>
                            <h1><strong><?php echo $product->get_title(); ?></strong></h1>
                            <h4 style="color: white;"><strong><?php echo get_field('plugin_subtitle', $product->get_id()); ?></strong></h4>
                            <br>
                            <p><?php echo $product->get_description(); ?></p>
                            <br>

                            <?php $sup_plugs = get_field('supported_plugins', $product->get_id()); ?>

                            <?php if (!empty($sup_plugs)) : ?>
                                <h6><?php echo $product->get_title(); ?> supports the following plugins: </h6>
                                <ul>
                                    <?php foreach($sup_plugs as $plug) :?>
                                        <li><?php echo $plug['supported_plugin_name']?></li>

                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </header>

                        <?php if($product_cat == "plugin"): ?>
                            <div>
                                <button type="button" class="btn-blue">Live Demo</button>
                                <button type="button" class="btn-purple mx-2">Documentation</button>
                            </div>


                        <?php elseif($product_cat == "android"): ?>
                            <div>
                                <button type="button" class="btn-purple mx-2">Documentation</button>

                            </div>

                        <?php endif; ?>

                        <figure>
                            <img src="<?php echo get_field('plugin_illustration_noshadow', $product->get_id())['url']; ?>"/>
                        </figure>

                    </div>

                    <div class="col-12 p-2 col-md-5 col-lg-4 py-5 d-flex flex-column justify-content-between" style="z-index:10;">
                        <div class="prod_sum_pricetab">
                            <figure id="pricetab_illustration">
                                <img src="<?php echo get_field('pricetab_illustration', $product->get_id())['url']; ?>"/>
                            </figure>

                            <aside id="pricetab_pricing">
                                <?php if($product->get_type() == "variable") : ?>
                                    <?php $variations = $product->get_available_variations(); ?>

                                    <div class="price">
                                            <span class="price">
                                                <del aria-hidden="true" style="color: <?php echo $color_accent;?>">
                                                    <span class="woocommerce-Price-amount amount">
                                                        <bdi>
                                                            <span class="woocommerce-Price-currencySymbol">€</span><span class="value"><?php echo number_format($variations[0]['display_regular_price'], "2", ".", ''); ?></span>
                                                        </bdi>
                                                    </span>
                                                </del>
                                                <ins>
                                                    <span class="woocommerce-Price-amount amount">
                                                        <bdi>
                                                            <span class="woocommerce-Price-currencySymbol">€</span><span class="value"><?php echo number_format($variations[0]['display_price'], "2", ".", ''); ?></span>
                                                        </bdi>
                                                    </span>
                                                </ins>
                                            </span> / Year
                                    </div>


                                <?php elseif( $product_cat == "android") : ?>
                                    <span class="price">
                                        <del aria-hidden="true" style="color: <?php echo $color_accent;?>">
                                            <span class="woocommerce-Price-amount amount">
                                                <bdi>
                                                    <span class="woocommerce-Price-currencySymbol">€</span><span class="value"><?php echo number_format($product->get_regular_price(), "2", ".", ''); ?></span>
                                                </bdi>
                                            </span>
                                        </del>
                                        <ins>
                                            <span class="woocommerce-Price-amount amount">
                                                <bdi>
                                                    <span class="woocommerce-Price-currencySymbol">€</span><span class="value"><?php echo number_format($product->get_sale_price(), "2", ".", ''); ?></span>
                                                </bdi>
                                            </span>
                                        </ins>
                                    </span>




                                <?php endif; ?>
                            </aside>




                        </div>
                        <?php if( $product_cat == "android") : ?>

                            <div >
                                <a href='http://play.google.com/store/?pcampaignid=pcampaignidMKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1'><img class="google_play_button" alt='Get it on Google Play' src='http://carrassi/wp-content/uploads/2021/11/google-play-badge-1.png'/></a>
                            </div>
                        <?php else: ?>
                            <form id="form_add_to_cart" class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
                                <?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

                                <input type="hidden" name="id" value="<?php echo $product->get_id(); ?>"/>

                                <?php foreach($variations as $index => $variation): ?>
                                    <div class="form-check">
                                        <input class="form-check-input pricePlan" type="radio" name="pricePlan" id="pricePlan"
                                               value="<?php echo $variation['variation_id']?>"
                                            <?php echo $index === 0 ? 'checked' : ''; ?>
                                               data-regular="<?php echo number_format($variation['display_regular_price'], "2", ".", ''); ?>"
                                               data-sale="<?php echo number_format($variation['display_price'], "2", ".", '');?>"
                                        >
                                        <label class="form-check-label" for="pricePlan">
                                            <?php echo __($variation['attributes']['attribute_sites'], 'carrassishop'); ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>


                                <?php if(!$coming_soon): ?>
                                    <button type="submit" name="add-to-cart" class="btn-yellow single_add_to_cart_button button alt">
                                        <div class="spinner-border text-light spinner" role="status" style="display:none;"> </div>

                                        <i class="fas fa-shopping-cart"></i> <?php _e('Add to cart', 'carrassishop'); ?>
                                    </button>
                                <?php else: ?>
                                    <button type="button" name="subscribe_to_mailinglist" class="btn-yellow btn button alt" data-bs-toggle="modal" data-bs-target="#mail_sub_modal">
                                        <i class="fas fa-envelope"></i> <?php _e('Subscribe to mailing list', 'carrassishop'); ?>
                                    </button>
                                <?php endif; ?>


                                <?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
                            </form>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>



        <section id="how_it_works">
            <div class="container ">
                <div class="row">
                    <div class="col-12 p-5 text-center">
                        <h1><?php _e("How it works", "carrassi")?></h1>
                        <br>
                        <header>
                            <div class="iframe_resizable" >
                                <iframe width="560" src="<?php echo get_field('video_showcase', $product->get_id()); ?>" frameborder="0" allowfullscreen></iframe>
                            </div>

                        </header>
                    </div>
                </div>
            </div>
        </section>

        <section id="key_features"
            style=" background: <?php echo $color_secondary; ?>;
                    background: -moz-linear-gradient( 180deg, <?php echo $color_secondary; ?> 0%, <?php echo $color_secondary; ?> 65%, <?php echo $color_primary; ?> 100%);
                    background: -webkit-linear-gradient( 180deg, <?php echo $color_secondary; ?> 0%, <?php echo $color_secondary; ?> 65%, <?php echo $color_primary; ?> 100%);
                    background: linear-gradient( 0deg, <?php echo $color_primary; ?> 0%, <?php echo $color_secondary; ?> 65%, #1d191f 100%);">
            <div class="container text-center">
                <div class="row">
                    <h1 class="py-5">Key Features </h1>
                    <br>
                    <?php $usp_points = get_field('usp_points', $product->get_id()); ?>

                    <?php foreach($usp_points as $index => $usp): ?>

                        <div class="col-sm-12 col-md-4 ">
                            <div class="container usp">
                                <img src="<?php echo $usp['icon']['url']?>"/>
                                <h5 style="color: <?php echo $color_accent; ?>"><?php echo $usp['title']?></h5>
                                <p><?php echo $usp['description']; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section>Examples</section>

        <section id="reviews" class="pb-5"
        style="background-color: <?php echo $color_secondary; ?>">
            <div class="container">
                <div class="row">
                    <h1 class="py-5">Reviews </h1>
                    <?php
                        $comments =  get_comments(array('post_id' => $product->get_id()));
                        if(count($comments) > 0) :
                            foreach($comments as $comment) :

                                //comment author
                                //rating
                                //comment

                                $author = get_userdata($comment->user_id);
        //                            $avatar = get_avatar($author->ID);
                                $rating = get_comment_meta($comment->comment_ID)['rating'][0]; ?>
                                <article class="col-12 col-sm-6 mb-3">
                                    <div class="row g-0 review p-3">
                                        <div class="col-12">
                                            <div class="col-1 g-0">
                                                <img width="48px" height="48px" src="<?php echo get_avatar_url($comment->comment_ID, array('size' => 450));?>" />
                                            </div>
                                            <div><strong><?php echo $author->display_name; ?></strong> <?php carrassishop_render_starrating( $rating );  ?></div>
                                            <div><?php echo $comment->comment_date; ?></div>
                                        </div>

                                        <div class="col-12 review_comment-content">
                                            <?php echo $comment->comment_content;?>
                                        </div>
                                    </div>

                                </article>

                           <?php endforeach; ?>
                        <?php else: ?>
                            <div class="no_reviews">
                                <div class="no_reviews_title"><?php echo __("There are no reviews yet for ") . $product->get_title() . "."; ?></div>
                                <div><a href="#"><?php _e("Be the first one to try it out and let world know what you think!"); ?> </a></div>
                            </div>
                        <?php endif; ?>


                </div>
            </div>

        </section>

        <?php carrassishop_render_similar_posts("Related blog posts", $color_primary, $color_secondary, $color_accent); ?>

        <br><br>

    </article>
</main>


<?php if($coming_soon): ?>
    <!-- Modal -->
    <div class="modal fade" id="mail_sub_modal" tabindex="-1" aria-labelledby="mail_sub_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo __("Want regular updates on the state of ", "carrassishop") . " " . get_field("plugin_name", $product->get_id()) . "?";  ?></h5>
<!--                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                </div>
                <div class="modal-body">
                    <?php echo do_shortcode('[mc4wp_form id="103"]'); ?>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

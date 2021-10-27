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
        "<?php  echo get_field('plugin_illustration', $product->get_id())['url'];?>",
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
                <div class="row prod_sum_row">
                    <div class="col-12 col-sm-8 p-5 prod_sum_desc">
                        <header>
                            <img class="product_logo" src="<?php echo get_field('plugin_icon', $product->get_id())['url']; ?>"/>
                            <h1><strong><?php echo $product->get_title(); ?></strong></h1>
                            <br>
                            <p><strong><?php echo $product->get_description(); ?></strong></p>
                            <br>


                            <p><?php echo $product->get_description(); ?></p>
                            <br>

                            <h6>Mailcat supports the following plugins: </h6>
                            <ul>
                                <?php $sup_plugs = get_field('supported_plugins', $product->get_id());
                                foreach($sup_plugs as $plug) :?>
                                    <li><?php echo $plug['supported_plugin_name']?></li>

                                <?php endforeach; ?>
                            </ul>

                            <br>
                            <button type="button" class="btn-blue">Live Demo</button>
                            <button type="button" class="btn-purple mx-2">Documentation</button>

                        </header>

                        <figure>
                            <img src="<?php echo get_field('plugin_illustration', $product->get_id())['url']; ?>"/>
                        </figure>

                    </div>

                    <div class="col-12 col-sm-4 py-5 " style="z-index:10;">
                        <div class="prod_sum_pricetab p-3">
                            <figure id="pricetab_illustration">
                                <img src="<?php echo get_field('pricetab_illustration', $product->get_id())['url']; ?>"/>
                            </figure>

                            <aside id="pricetab_pricing">
                                <div class="price">
                                    <?php echo $product->get_price_html(); ?> / year
                                </div>


                                <form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
                                    <?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pricePlan" id="pricePlan" value="1" checked>
                                        <label class="form-check-label" for="pricePlan">
                                            1 Site
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pricePlan" id="pricePlan" value="5">
                                        <label class="form-check-label" for="pricePlan">
                                            5 Sites
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pricePlan" id="pricePlan" value="25">
                                        <label class="form-check-label" for="pricePlan">
                                            25 Sites
                                        </label>
                                    </div>

                                    <button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="btn-yellow single_add_to_cart_button button alt">
                                        <?php echo $product->add_to_cart_text(); ?>
                                    </button>

                                    <?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
                                </form>

                                <form>


                                </form>
                            </aside>
                        </div>

                    </div>

                </div>

            </div>
        </section>



        <section id="how_it_works">
            <div class="container ">
                <div class="row">
                    <div class="col-12 p-5 text-center">
                        <h1>How the plugin works</h1>
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

        <section id="key_features">
            <div class="container text-center">
                <div class="row">
                    <h1 class="py-5">Key Features </h1>
                    <br>
                    <?php $usp_points = get_field('usp_points', $product->get_id()); ?>

                    <?php foreach($usp_points as $index => $usp): ?>

                        <div class="col-sm-12 col-md-4 ">
                            <div class="container usp">
                                <img src="<?php echo $usp['icon']['url']?>"/>
                                <h5><?php echo $usp['title']?></h5>
                                <p><?php echo $usp['description']; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section>Examples</section>

        <section>Reviews</section>
        <?php carrassishop_render_similar_posts("Related blog posts"); ?>

        <aside> Features not pertaining to the plugin, but to carrassi business</aside>
    </article>
</main>


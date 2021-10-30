<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="col-12 px-5 carrassi_cart_contents">
    <?php do_action( 'woocommerce_before_cart' ); ?>

    <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
        <?php do_action( 'woocommerce_before_cart_table' ); ?>
        <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
            <thead>
            <tr>
                <th class="product-remove">&nbsp;</th>
                <th class="product-thumbnail">&nbsp;</th>
                <th class="product-name"><?php esc_html_e( 'Product', 'woocommerce' ); ?></th>
                <th class="product-price"><?php esc_html_e( 'Price', 'woocommerce' ); ?></th>
                <th class="product-subtotal"><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php do_action( 'woocommerce_before_cart_contents' ); ?>

            <?php
            foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                    $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                    ?>
                    <tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

                        <td class="product-remove">
                            <div class="cart_remove_button" data-source="checkout" data-product_id="<?php echo $cart_item['product_id']; ?>" data-variation_id="<?php echo $cart_item['variation_id']; ?>">
                                <i class="fas fa-times"></i>
                                <div class="spinner-border
                            text-light spinner" role="status" style="display:none;"> </div>
                            </div>

                            <!--							--><?php
                            //								echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                            //									'woocommerce_cart_item_remove_link',
                            //									sprintf(
                            //										'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
                            //										esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                            //										esc_html__( 'Remove this item', 'woocommerce' ),
                            //										esc_attr( $product_id ),
                            //										esc_attr( $_product->get_sku() )
                            //									),
                            //									$cart_item_key
                            //								);
                            //							?>
                        </td>

                        <td class="product-thumbnail">

                            <a href="<?php wc_get_product($cart_item['product_id'])->get_permalink(); ?>">
                                <img width="50" height="50" src="<?php echo get_field('plugin_icon', $product_id)['url']; ?>"/>
                            </a>
                            <!--						--><?php
                            //						$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                            //
                            //						if ( ! $product_permalink ) {
                            //							echo $thumbnail; // PHPCS: XSS ok.
                            //						} else {
                            //							printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
                            //						}
                            //						?>
                        </td>

                        <td class="product-name" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
                            <?php
                            if ( ! $product_permalink ) {
                                echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
                            } else {
                                echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
                            }

                            do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

                            // Meta data.
                            echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

                            // Backorder notification.
                            if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
                                echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
                            }
                            ?>
                        </td>

                        <td class="product-price" data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>">
                            <?php
                            echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
                            ?>
                        </td>

                        <td class="product-subtotal" data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>">
                            <?php
                            echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
                            ?>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
            <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>

            <?php do_action( 'woocommerce_cart_contents' ); ?>


                <tr class="cart-subtotal">
                    <td></td> <td></td> <td></td>
                    <td><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></td>
                    <td data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>"><?php wc_cart_totals_subtotal_html(); ?></td>
                </tr>

                <?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
                    <tr class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
                        <td></td> <td></td> <td></td>
                        <td><?php wc_cart_totals_coupon_label( $coupon ); ?></td>
                        <td data-title="<?php echo esc_attr( wc_cart_totals_coupon_label( $coupon, false ) ); ?>"><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
                    </tr>
                <?php endforeach; ?>


                <?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
                    <tr class="fee">
                        <td></td> <td></td> <td></td>
                        <td><?php echo esc_html( $fee->name ); ?></td>
                        <td data-title="<?php echo esc_attr( $fee->name ); ?>"><?php wc_cart_totals_fee_html( $fee ); ?></td>
                    </tr>
                <?php endforeach; ?>

                <?php
                if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) {
                    $taxable_address = WC()->customer->get_taxable_address();
                    $estimated_text  = '';

                    if ( WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping() ) {
                        /* translators: %s location. */
                        $estimated_text = sprintf( ' <small>' . esc_html__( '(estimated for %s)', 'woocommerce' ) . '</small>', WC()->countries->estimated_for_prefix( $taxable_address[0] ) . WC()->countries->countries[ $taxable_address[0] ] );
                    }

                    if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) {
                        foreach ( WC()->cart->get_tax_totals() as $code => $tax ) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
                            ?>
                            <tr class="tax-rate tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
                                <th><?php echo esc_html( $tax->label ) . $estimated_text; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></th>
                                <td data-title="<?php echo esc_attr( $tax->label ); ?>"><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr class="tax-total">
                            <th><?php echo esc_html( WC()->countries->tax_or_vat() ) . $estimated_text; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></th>
                            <td data-title="<?php echo esc_attr( WC()->countries->tax_or_vat() ); ?>"><?php wc_cart_totals_taxes_total_html(); ?></td>
                        </tr>
                        <?php
                    }
                }
                ?>


                <tr class="order-total">
                    <td></td> <td></td> <td></td>
                    <td><?php esc_html_e( 'Total', 'woocommerce' ); ?></td>
                    <td data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>"><?php wc_cart_totals_order_total_html(); ?></td>
                </tr>

            </tbody>
        </table>
        <?php do_action( 'woocommerce_after_cart_table' ); ?>
    </form>

    <?php do_action( 'woocommerce_before_cart_collaterals' ); ?>


</div>
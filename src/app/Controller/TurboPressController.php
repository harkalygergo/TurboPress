<?php

declare( strict_types=1 );

namespace TurboPress\Controller;

use TurboPress\Model\TurboPress;

class TurboPressController
{
    protected object $settings;

    protected string $pluginName = 'TurboPress';
    protected string $pluginSlug = 'turbopress';
    protected string $pluginPrefix = 'turbopress_';

    public function __construct()
    {
        $this->settings = new TurboPress();
    }

    public function init()
    {
        if ( is_admin() ) {
            $adminMenu = new TurboPressAdminMenuController();
            $adminMenu->init();
        } else {
            add_action( 'wp', [$this, 'enable_woocommerce_product_gallery_lightbox'], 99 );
            // add script to wp_footer
            add_action( 'wp_footer', function () {
                echo '<script>let boltiAr = document.getElementsByClassName("woocommerce-product-attributes-item--attribute_pa_bolti-ar")["0"];
if (typeof boltiAr !== "undefined" && typeof boltiAr.getElementsByTagName("td")["0"] !== "undefined") {
    document.getElementsByClassName("woocommerce-product-details__short-description")["0"].innerHTML = "<p><strong>Bolti ár: " + boltiAr.getElementsByTagName("td")["0"].innerText + "</strong></p>" + document.getElementsByClassName("woocommerce-product-details__short-description")["0"].innerHTML;
}</script>';
            } );


            // Add COD fee to WooCommerce checkout
            add_action('woocommerce_cart_calculate_fees', [$this, 'my_cod_extra_fee']);
            add_action('wp_footer', function() {
                if (is_checkout() && !is_wc_endpoint_url()) {
                    ?>
                    <script>
                        jQuery(function($){
                            $('form.checkout').on('change', 'input[name="payment_method"]', function(){
                                alert("update");
                                $('body').trigger('update_checkout');
                            });
                        });
                    </script>
                    <?php
                }
            });
        }

        // Adds customer first and last name to admin new order email subject
        add_filter('woocommerce_email_subject_new_order', [$this, 'woocommerce_email_subject_new_order_callback'], 10, 2 );

    }

    public function woocommerce_email_subject_new_order_callback($subject, $order)
    {
        $CustomerBillingName = $order->get_billing_first_name().' '.$order->get_billing_last_name();
        if (empty($CustomerBillingName)) {
            $CustomerBillingName = $order->get_billing_email();
        }

        return str_replace("{customer_name}", $CustomerBillingName, $subject);
    }

    public function enable_woocommerce_product_gallery_lightbox()
    {
        add_theme_support( 'wc-product-gallery-lightbox' );
    }

    public function my_cod_extra_fee($cart) {
        if (is_admin() && !defined('DOING_AJAX')) {
            return; // Don't run in admin except AJAX
        }

        // Check if payment method is COD
        if (isset(WC()->session) && WC()->session->get('chosen_payment_method') === 'cod') {
            $fee_amount = (500/1.27); // Fee in HUF
            $cart->add_fee(__('Utánvét díja', 'my-textdomain'), $fee_amount, true);
        }
    }
}
